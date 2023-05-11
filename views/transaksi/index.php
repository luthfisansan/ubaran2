<?php

use app\models\Transaksi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'label' => 'Nama Pasien',
                'value' => function ($model) {
                    return $model->pasien->nama;
                },
            ],
            [
                'label' => 'Tindakan',
                'value' => function ($model) {
                    $tindakans = [];
                    foreach ($model->tindakans as $tindakan) {
                        $tindakans[] = $tindakan->nama_tindakan;
                    }
                    return implode(', ', $tindakans);
                },
            ],
            [
                'label' => 'Obat',
                'value' => function ($model) {
                    return implode(', ', array_map(function ($transaksiObat) {
                        return $transaksiObat->obat->nama_obat;
                    }, $model->transaksiObats));
                },
            ],
            [
                'label' => 'Total Harga',
                'value' => function ($model) {
                    return $model->getTotalHarga();
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Transaksi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>