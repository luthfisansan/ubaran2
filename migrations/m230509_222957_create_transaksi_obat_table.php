<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaksi_obat}}`.
 */
class m230509_222957_create_transaksi_obat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi_obat}}', [
            'id' => $this->primaryKey(),
            'transaksi_id' => $this->integer()->notNull(),
            'obat_id' => $this->integer()->notNull(),
            'jumlah' => $this->integer()->notNull()->defaultValue(0),
        ]);
        $this->addForeignKey(
            'fk-transaksi_obat-transaksi_id',
            '{{%transaksi_obat}}',
            'transaksi_id',
            '{{%transaksi}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaksi_obat-obat_id',
            '{{%transaksi_obat}}',
            'obat_id',
            '{{%obat}}',
            'id',
            'CASCADE'
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transaksi_obat-obat_id', '{{%transaksi_obat}}');
        $this->dropForeignKey('fk-transaksi_obat-transaksi_id', '{{%transaksi_obat}}');
        $this->dropTable('{{%transaksi_obat}}');
    }
}
