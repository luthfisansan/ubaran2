<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warga".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 *
 * @property Pasien[] $pasiens
 */
class Warga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'tanggal_lahir', 'jenis_kelamin'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nik'], 'string', 'max' => 16],
            [['nama'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['nik'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * Gets query for [[Pasiens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasiens()
    {
        return $this->hasMany(Pasien::class, ['warga_id' => 'id']);
    }
}
