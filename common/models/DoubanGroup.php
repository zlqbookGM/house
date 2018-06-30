<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "douban_group".
 *
 * @property string $groupId
 * @property string $title
 * @property string $cTime
 */
class DoubanGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'douban_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupId'], 'required'],
            [['cTime'], 'safe'],
            [['groupId'], 'string', 'max' => 60],
            [['title'], 'string', 'max' => 100],
            [['groupId'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'groupId' => 'Group ID',
            'title' => 'Title',
            'cTime' => 'C Time',
        ];
    }
}
