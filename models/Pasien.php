<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property int $warga_id
 * @property int $wilayah_id
 * @property string $nik
 *
 * @property Warga $warga
 * @property Wilayah $wilayah
 */
class Pasien extends \yii\db\ActiveRecord
{
    public $nik;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wilayah_id', 'nik'], 'required'],
            [['warga_id', 'wilayah_id'], 'integer'],
            [['nik'], 'string', 'max' => 16],
            [['nik'], 'validateNik']
        ];
    }

    public function validateNik($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $warga = Warga::findOne(['nik' => $this->nik]);
            if (!$warga) {
                $this->addError('nik', 'NIK tidak terdaftar pada database.');
            } else {
                $this->warga_id = $warga->id;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warga_id' => 'Warga ID',
            'wilayah_id' => 'Alamat',
            'nik' => 'NIK',
        ];
    }
    public static function getList()
    {
        return self::find()->select(['id', 'nama'])->indexBy('id')->column();
    }

    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['pasien_id' => 'id']);
    }

    /**
     * Gets query for [[Warga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarga()
    {
        return $this->hasOne(Warga::class, ['id' => 'warga_id'])
            ->select(['id', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'nik']);
    }

    public function getWargaNik()
    {
        return $this->warga ? $this->warga->nik : null;
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }

    public static function tableName()
    {
        return 'pasien';
    }

    public function getTanggalLahir()
    {
        return $this->warga->tanggal_lahir;
    }

    public function getNama()
    {
        return $this->warga->nama;
    }

    public function getJenisKelamin()
    {
        return $this->warga->jenis_kelamin;
    }

    public function getNamaWilayah()
    {
        return $this->wilayah->nama;
    }
    public function getNik()
    {
        return $this->warga ? $this->warga->nik : null;
    }
}
