<?php

use yii\db\Migration;

/**
 * Class m230408_231401_User_migration
 */
class m230408_231401_User_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),

        ]);
        // Data username dan password hash
        $username = 'user1';
        $passwordHash = Yii::$app->security->generatePasswordHash('password123');
        $this->insert('user', [
            'username' => $username,
            'password_hash' => $passwordHash,
            'email' => 'user1@example.com',

        ]);
        $username = 'user2';
        $passwordHash = Yii::$app->security->generatePasswordHash('password123');
        $this->insert('user', [
            'username' => $username,
            'password_hash' => $passwordHash,
            'email' => 'user2@example.com',

        ]);
        $username = 'user3';
        $passwordHash = Yii::$app->security->generatePasswordHash('password123');
        $this->insert('user', [
            'username' => $username,
            'password_hash' => $passwordHash,
            'email' => 'user3@example.com',

        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_231401_User_migration cannot be reverted.\n";

        return false;
    }
    */