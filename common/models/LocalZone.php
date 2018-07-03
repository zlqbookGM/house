<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "local_zone".
 *
 * @property string $landmark 地标
 * @property string $district 所属区
 */
class LocalZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'local_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['landmark'], 'required'],
            [['landmark'], 'string', 'max' => 20],
            [['district'], 'string', 'max' => 30],
            [['landmark'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'landmark' => 'Landmark',
            'district' => 'District',
        ];
    }
    public static function getAllLandMark()
    {
        $landmark = ['0'=>'暂无选项'];
        $res = self::find()->asArray()->all();

        if($res){
            foreach($res as $k=>$list){
                $landmark[$list['landmark']] = $list['district'];
            }
        }
        return $landmark;
    }
}
