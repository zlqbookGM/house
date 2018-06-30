<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\search\DoubanTopicSearch;

/**
 * Site controller
 */
class DoubanController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex(){
        $data = [];
        $key = [];
        if(!empty($_REQUEST['keywords'])){
            $key = trim($_REQUEST['keywords']);
            $key = str_replace('，', ',', $key);
            $key = preg_replace('/\s+/', ',', $key);
            $key = preg_replace('/,+/', ',', $key);
            $key = explode(',', trim($key,','));

            if($key){
                $topics = Yii::$app->db->createCommand('select topicId,title from douban_topic')->queryAll();
                foreach($topics as $item){
                    foreach ($key as $k){
                        if(
                            strpos($item['title'], $k)===false ||
                            strpos($item['title'],'已租')!==false ||
                            strpos($item['title'],'关闭')!==false
                        ) continue;
                        $data[] = $item;
                    }
                }
            }
        }

        return $this->render('index',[
            'data' => $data,
            'key' => $key,
        ]);
    }

    public function actionAll()
    {
        $searchModel = new DoubanTopicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('all', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
