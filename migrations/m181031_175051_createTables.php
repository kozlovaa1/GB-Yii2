<?php

use yii\db\Migration;

/**
 * Class m181031_175051_createTables
 */
class m181031_175051_createTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id'=>$this->primaryKey(),
            'title'=>$this->string('250')->notNull(),
            'start_day'=>$this->dateTime(),
            'end_day'=>$this->dateTime(),
            'body'=>$this->text(),
            'is_repeat'=>$this->tinyInteger()->notNull()->defaultValue(0),
            'is_block'=>$this->tinyInteger()->notNull()->defaultValue(0),
            'user_id'=>$this->integer()->notNull(),
            'created_at'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('user', [
            'id'=>$this->primaryKey(),
            'username'=>$this->string('250'),
            'auth_key'=>$this->string('250'),
            'password'=>$this->string('250'),
            'reset_token'=>$this->string('250'),
            'email'=>$this->string('250'),
            'status'=>$this->tinyInteger()->notNull()->defaultValue(0),
            'created_at'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('day', [
            'id'=>$this->primaryKey(),
            'date'=>$this->dateTime(),
            'working'=>$this->tinyInteger()->notNull()->defaultValue(0)
        ]);

        $this->createTable('day_activity', [
            'id'=>$this->integer()->notNull(),
            'day_id'=>$this->integer()->notNull(),
            'activity_id'=>$this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('day_activityPK','day_activity', ['day_id', 'activity_id']);

        $this->addForeignKey('userActivityFK', 'activity', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('dayActivityFK', 'day_activity', 'day_id', 'day', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('activityDayFK', 'day_activity', 'activity_id', 'activity', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
        $this->dropTable('activity');
        $this->dropTable('day_activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181031_175051_createTables cannot be reverted.\n";

        return false;
    }
    */
}
