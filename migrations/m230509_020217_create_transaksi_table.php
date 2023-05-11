<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaksi}}`.
 */
class m230509_020217_create_transaksi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi}}', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer()->notNull(),
            'total_harga' => $this->integer()->notNull(),
            'tanggal_transaksi' => $this->date()->notNull()->defaultValue(date('Y-m-d')),
        ]);

        // creates index for column `pasien_id`
        $this->createIndex(
            '{{%idx-transaksi-pasien_id}}',
            '{{%transaksi}}',
            'pasien_id'
        );

        // add foreign key for table `pasien`
        $this->addForeignKey(
            '{{%fk-transaksi-pasien_id}}',
            '{{%transaksi}}',
            'pasien_id',
            '{{%pasien}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        // drop foreign key for table `pasien`
        $this->dropForeignKey(
            '{{%fk-transaksi-pasien_id}}',
            '{{%transaksi}}'
        );

        // drop index for column `pasien_id`
        $this->dropIndex(
            '{{%idx-transaksi-pasien_id}}',
            '{{%transaksi}}'
        );

        $this->dropTable('{{%transaksi}}');
    }
}
