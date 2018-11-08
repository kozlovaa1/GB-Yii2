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
 * @property int $is_repeat
 * @property int $is_block
 * @property string $created_at
 *
 * @property User $user
 * @property DayActivity[] $dayActivities
 * @property Day[] $days
 */
class ActivityBase extends \yii\db\ActiveRecord
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
            [['title', 'user_id'], 'required'],
            [['start_day', 'end_day', 'created_at'], 'safe'],
            [['body'], 'string'],
            [['is_repeat', 'is_block', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'start_day' => Yii::t('app', 'Начало активности'),
            'end_day' => Yii::t('app', 'Конец активности'),
            'body' => Yii::t('app', 'Описание'),
            'is_repeat' => Yii::t('app', 'Повторяющееся'),
            'is_block' => Yii::t('app', 'Блокирующее'),
            'user_id' => Yii::t('app', 'ID пользователя'),
            'created_at' => Yii::t('app', 'Дата создания'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDayActivities()
    {
        return $this->hasMany(DayActivity::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDays()
    {
        return $this->hasMany(Day::className(), ['id' => 'day_id'])->viaTable('day_activity', ['activity_id' => 'id']);
    }
}
