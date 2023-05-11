<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaksi_tindakan}}`.
 */
class m230508_014855_create_transaksi_tindakan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi_tindakan}}', [
            'id' => $this->primaryKey(),
            'transaksi_id' => $this->integer()->notNull(),
            'tindakan_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-transaksi_tindakan-transaksi_id',
            '{{%transaksi_tindakan}}',
            'transaksi_id',
            '{{%transaksi}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaksi_tindakan-tindakan_id',
            '{{%transaksi_tindakan}}',
            'tindakan_id',
            '{{%tindakan}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transaksi_tindakan-transaksi_id', '{{%transaksi_tindakan}}');
        $this->dropForeignKey('fk-transaksi_tindakan-tindakan_id', '{{%transaksi_tindakan}}');
        $this->dropTable('{{%transaksi_tindakan}}');
    }
}
