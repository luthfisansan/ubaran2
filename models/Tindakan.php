<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id
 * @property string $nama_tindakan
 * @property float $harga
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tindakan', 'harga'], 'required'],
            [['harga'], 'number'],
            [['nama_tindakan'], 'string', 'max' => 255],
        ];
    }
    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'nama_tindakan');
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tindakan' => 'Nama Tindakan',
            'harga' => 'Harga',
        ];
    }
}
