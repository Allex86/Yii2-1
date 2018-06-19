<?php

use yii\db\Migration;

/**
 * Class m180619_114610_migrate_test_create_event
 */
class m180619_114610_migrate_test_create_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event', [
            'id' => $this->PrimaryKey(),
            'text' => $this->text()->notNull(),
            'dt' => $this->datetime()->notNull(),
            'creator_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('event');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180619_114610_migrate_test_create_event cannot be reverted.\n";

        return false;
    }
    */
}
