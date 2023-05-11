<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wilayah}}`.
 */
class m230503_232141_create_wilayah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%wilayah}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
        ]);
        $this->batchInsert('{{%wilayah}}', ['nama'], [
            ['Kirisik'],
            ['Banjarsari'],
            ['Sarimekar'],
            ['MedarJaya'],
            ['Pawenang'],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wilayah}}');
    }
}
