<?php

use yii\db\Migration;

class m170614_133553_notify_subscribtion extends Migration
{
    public function safeUp()
    {
        $this->safeDown();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%notify_subscriptions}}', [
            'id' => $this->primaryKey(),
            'notify_id' => $this->integer()->notNull(),
            'notify_type' => $this->string(15)->notNull(),//rule/test/event/warn
            'subscription_id' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createIndex('idx-notify_subscriptions-subscription_id', '{{%notify_subscriptions}}', 'subscription_id');
        $this->createIndex('idx-notify_subscriptions-notify_id', '{{%notify_subscriptions}}', 'notify_id');
        //$this->addForeignKey('fk-notify_subscriptions-subscriptions', '{{%notify_subscriptions}}', 'subscription_id', '{{%subscriptions}}', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%notify_subscriptions}}');
    }

}
