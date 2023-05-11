<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_obat".
 *
 * @property int $id
 * @property int $transaksi_id
 * @property int $obat_id
 * @property int $jumlah
 * @property int $harga
 *
 * @property Obat $obat
 * @property Transaksi $transaksi
 */
class TransaksiObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'obat_id', 'jumlah', 'harga'], 'required'],
            [['transaksi_id', 'obat_id', 'jumlah', 'harga'], 'integer'],
            [['obat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['obat_id' => 'id']],
            [['transaksi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transaksi::class, 'targetAttribute' => ['transaksi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaksi_id' => 'Transaksi ID',
            'obat_id' => 'Obat ID',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }

    /**
     * Gets query for [[Transaksi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::class, ['id' => 'transaksi_id']);
    }
}
