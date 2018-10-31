<?php

use yii\db\Migration;

/**
 * Class m181031_181006_alterTables
 */
class m181031_181006_alterTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'name' => 'Пользователь Тестовый',
            'email' => 'mail@mail.ru',
            'password' => '123'
        ]);

        $this->batchInsert('activity', ['user_id', 'title', 'start_day', 'end_day', 'body'], [
            ['user_id'=>1, 'title' => 'Событие 1', 'start_day' => date('Y-m-d H:i:s'), 'end_day' => '2018-11-01 20:00:00', 'body' => Yii::$app->security->generateRandomString(50)],
            ['user_id'=>1, 'title' => 'Событие 2', 'start_day' => date('Y-m-d H:i:s'), 'end_day' => '2018-11-01 20:01:00', 'body' => Yii::$app->security->generateRandomString(50)],
            ['user_id'=>1, 'title' => 'Событие 3', 'start_day' => date('Y-m-d H:i:s'), 'end_day' => '2018-11-01 21:01:00', 'body' => Yii::$app->security->generateRandomString(50)],
            ['user_id'=>1, 'title' => 'Событие 4', 'start_day' => date('Y-m-d H:i:s'), 'end_day' => '2018-11-01 21:22:00', 'body' => Yii::$app->security->generateRandomString(50)]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('activity');
        $this->truncateTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181031_181006_alterTables cannot be reverted.\n";

        return false;
    }
    */
}
