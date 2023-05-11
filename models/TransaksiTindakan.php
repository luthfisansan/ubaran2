<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_tindakan".
 *
 * @property int $id
 * @property int $transaksi_id
 * @property int $tindakan_id
 *
 * @property Tindakan $tindakan
 * @property Transaksi $transaksi
 */
class TransaksiTindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'tindakan_id'], 'required'],
            [['transaksi_id', 'tindakan_id'], 'integer'],
            [['tindakan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakan_id' => 'id']],
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
            'tindakan_id' => 'Tindakan ID',
        ];
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakan_id']);
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
