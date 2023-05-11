<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pasien}}`.
 */
class m230503_232304_create_pasien_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%pasien}}', [
            'id' => $this->primaryKey(),
            'warga_id' => $this->integer()->notNull(),
            'wilayah_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-pasien-warga_id',
            '{{%pasien}}',
            'warga_id',
            '{{%warga}}',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-pasien-warga_id',
            '{{%pasien}}',
            'warga_id',
            true
        );

        $this->addForeignKey(
            'fk-pasien-wilayah_id',
            '{{%pasien}}',
            'wilayah_id',
            '{{%wilayah}}',
            'id',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pasien}}');
    }
}
