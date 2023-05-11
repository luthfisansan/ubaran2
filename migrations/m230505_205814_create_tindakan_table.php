<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tindakan}}`.
 */
class m230505_205814_create_tindakan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tindakan}}', [
            'id' => $this->primaryKey(),
            'nama_tindakan' => $this->string()->notNull(),
            'harga' => $this->decimal(10, 2)->notNull(),
        ]);
        $this->batchInsert('{{%tindakan}}', ['nama_tindakan', 'harga'], [
            ['Pemeriksaan Umum', 50000],
            ['Pemeriksaan Darah', 150000],
            ['Rontgen', 250000],
            ['USG', 350000],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tindakan}}');
    }
}
