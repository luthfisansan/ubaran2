<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id
 * @property string $nama_obat
 * @property int $harga_obat
 * @property int $stok_obat
 */
class Obat extends \yii\db\ActiveRecord
{
    public $harga;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_obat', 'harga_obat', 'stok_obat'], 'required'],
            [['harga_obat', 'stok_obat'], 'integer'],
            [['nama_obat'], 'string', 'max' => 255],
        ];
    }
    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'nama_obat');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_obat' => 'Nama Obat',
            'harga_obat' => 'Harga Obat',
            'stok_obat' => 'Stok Obat',
        ];
    }
}
