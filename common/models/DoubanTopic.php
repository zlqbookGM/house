<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "douban_topic".
 *
 * @property string $topicId
 * @property string $title
 * @property string $lastResponse 最近更新
 * @property string $mTime 更新时间
 */
class DoubanTopic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'douban_topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topicId'], 'required'],
            [['topicId'], 'integer'],
            [['lastResponse', 'mTime'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['topicId'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'topicId' => 'Topic ID',
            'title' => 'Title',
            'lastResponse' => 'Last Response',
            'mTime' => 'M Time',
        ];
    }
}
