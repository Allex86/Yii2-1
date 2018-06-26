<?php

use yii\db\Migration;

/**
 * Class m180619_114640_migrate_test_create_access
 */
class m180619_114640_migrate_test_create_access extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('access', [
            'id' => $this->PrimaryKey(),
            'event_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('access');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180619_114640_migrate_test_create_access cannot be reverted.\n";

        return false;
    }
    */
}
