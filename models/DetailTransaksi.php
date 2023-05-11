<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class DetailTransaksi extends ActiveRecord
{
    public static function tableName()
    {
        return 'detail_transaksi';
    }

    public function rules()
    {
        return [
            [['transaksi_id', 'obat_id', 'jumlah_obat'], 'required'],
            [['transaksi_id', 'obat_id', 'jumlah_obat', 'tindakan_id'], 'integer'],
            [['jumlah_obat'], 'integer', 'min' => 1],
        ];
    }

    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }

    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakan_id']);
    }
}
