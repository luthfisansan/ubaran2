<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%obat}}`.
 */
class m230505_200311_create_obat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%obat}}', [
            'id' => $this->primaryKey(),
            'nama_obat' => $this->string()->notNull(),
            'harga_obat' => $this->integer()->notNull(),
            'stok_obat' => $this->integer()->notNull(),
        ]);

        $this->batchInsert('obat', ['nama_obat', 'harga_obat', 'stok_obat'], [
            ['Paracetamol', 5000, 50],
            ['Amoxicillin', 10000, 30],
            ['Lansoprazole', 15000, 20],
            ['Metformin', 8000, 40],
            ['Atorvastatin', 12000, 25],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%obat}}');
    }
}
