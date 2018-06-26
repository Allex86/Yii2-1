<?php

use yii\db\Migration;

/**
 * Class m180621_111601_add_new_key_to_user
 */
class m180621_111601_add_new_key_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_event', 'access', ['event_id'], 'event', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_event_user', 'event', ['creator_id'], 'user', ['id'])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180621_111601_add_new_key_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180621_111601_add_new_key_to_user cannot be reverted.\n";

        return false;
    }
    */
}
