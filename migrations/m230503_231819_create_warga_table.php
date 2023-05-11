<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%warga}}`.
 */
class m230503_231819_create_warga_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%warga}}', [
            'id' => $this->primaryKey(),
            'nik' => $this->string(16)->notNull()->unique(),
            'nama' => $this->string()->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'jenis_kelamin' => $this->string(1)->notNull()->check("jenis_kelamin IN ('L', 'P')"),
        ]);
        $this->batchInsert('{{%warga}}', ['nik', 'nama', 'tanggal_lahir', 'jenis_kelamin'], [
            ['1234567890123456', 'Luthfi', '1990-01-01', 'L'],
            ['2345678901234567', 'Sarah', '1991-02-02', 'P'],
            ['3456789012345678', 'SanSan', '1992-03-03', 'L'],
            ['4567890123456789', 'Syifa', '1993-04-04', 'P'],
            ['5678901234567890', 'Asep', '1994-05-05', 'L'],
        ]);
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%warga}}');
    }
}
