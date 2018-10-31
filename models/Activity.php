<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $start_day
 * @property string $end_day
 * @property int $user_id
 * @property string $body
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['start_day', 'end_day'], 'safe'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 256],
            [['body'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'start_day' => Yii::t('app', 'Start Day'),
            'end_day' => Yii::t('app', 'End Day'),
            'user_id' => Yii::t('app', 'User ID'),
            'body' => Yii::t('app', 'Body'),
        ];
    }
}
