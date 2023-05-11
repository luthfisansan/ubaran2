<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaksi}}`.
 */
class m230508_014256_create_transaksi_table extends Migration
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
            'tanggal_transaksi' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `pasien_id`
        $this->createIndex(
            '{{%idx-transaksi-pasien_id}}',
            '{{%transaksi}}',
            'pasien_id'
        );

        // add foreign key for table `{{%pasien}}`
        $this->addForeignKey(
            '{{%fk-transaksi-pasien_id}}',
            '{{%transaksi}}',
            'pasien_id',
            '{{%pasien}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%pasien}}`
        $this->dropForeignKey(
            '{{%fk-transaksi-pasien_id}}',
            '{{%transaksi}}'
        );

        // drops index for column `pasien_id`
        $this->dropIndex(
            '{{%idx-transaksi-pasien_id}}',
            '{{%transaksi}}'
        );

        $this->dropTable('{{%transaksi}}');
    }
}
