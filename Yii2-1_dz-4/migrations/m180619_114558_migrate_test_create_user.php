<?php

use yii\db\Migration;

/**
 * Class m180619_114558_migrate_test_create_user
 */
class m180619_114558_migrate_test_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->PrimaryKey(),
            'username' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'access_token' => $this->string(),
            'auth_key' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180619_114558_migrate_test_create_user cannot be reverted.\n";

        return false;
    }
    */
}
