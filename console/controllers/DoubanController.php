<?php

namespace console\controllers;

use yii;
use yii\console\Controller;
use common\utils\Curl;
use backend\models\HouseUrl;
use backend\models\UrlSave;

class DoubanController extends Controller
{
    /**缺省查半小时以内
     * 最多查10天内
     * @param int $endTime 抓取的截止时间
     * @throws yii\db\Exception
     */
    public function actionSpider($endTime=0)
    {
        if($endTime){
            //为了验证传入参数的正确性endTime
            $realEndTime = strtotime($endTime);
            if(date('Y-m-d H:i:s',$realEndTime) != $endTime){
                $endTime = 0;
            }
        }
        if(!$endTime){
            $endTime = time() - 1800;
        }else{
            $tenDaysAgo = time()-864000;
            $endTime = strtotime($endTime);
            if($tenDaysAgo > $endTime) $endTime = $tenDaysAgo; //不能超过10天
        }

    	//查询数据库里豆瓣讨论组
        $groupIds = Yii::$app->db->createCommand('select groupId from douban_group')->queryColumn();

        foreach($groupIds as $groupId){
            $page = 1;
            while(1){
                $start = ($page-1) * 50;
                $data = Curl::Get("https://www.douban.com/group/{$groupId}/discussion?start=".$start,[],[
                    'ssl_verifypeer' => false,
                    ]);
                $page++;

                $items = $this->parse($data);
                if(!$items) break; //没有更多数据了就结束
                if($items[0]['time'] < $endTime) break; //如果抓到的数据太靠前了也结束

                $this->saveTopic($items);
                sleep(1);
            }
        }
    }

    private function saveTopic($items){
        $db = Yii::$app->db;
        foreach ($items as $item){
            $item['lastResponse'] = date('Y-m-d H:i:s',$item['time']);unset($item['time']);

            $isExist = $db->createCommand('select count(1) from douban_topic where topicId=:i',[
                ':i'=>$item['topicId']
            ])->queryScalar();

            if($isExist){
                $db->createCommand()->update('douban_topic', $item, 'topicId=:i',[
                    ':i'=>$item['topicId']
                ])->execute();
            }else{
                $db->createCommand()->insert('douban_topic', $item)->execute();
            }
        }
    }

//解析html中的title time url 保存到数据库
    private function parse($data)
    {
        if(!preg_match('#<table class="olt">(.*?)</table>#s', $data, $match)){
            var_dump($data);
            return;
        }
        preg_match_all('#<tr class="">(.*?)</tr>#s', $match[1], $resources);
        if(empty($resources[1])){
            var_dump($match[1]);
            return;
        }

        $year = date('Y-');
        $res = [];
        foreach($resources[1] as $item){
            if(!preg_match('#<a href="(.*?)" title="(.*?)" class="">#s', $item, $tmp)){
                var_dump($item);continue;
            }

            $title = preg_replace('#\s+#',' ',trim($tmp[2]));

            preg_match('#/(\d+)/$#', $tmp[1],$topicId);
            $topicId = $topicId[1];

            preg_match('#"time">(.*?)</td>#', $item, $tmp);
            $time = $tmp[1];
            if(strpos($time, '20')!==0) $time = $year.$time; //需要补全年份

            $res[] = [
                'title' => $title,
                'topicId' => $topicId,
                'time' => strtotime($time),
            ];
        }
        return $res;
    }
}
