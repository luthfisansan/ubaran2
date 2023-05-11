<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Nama',
                'attribute' => 'pasien_id',
                'value' => $model->pasien->nama, // ambil nama pasien dari relasi pasien
            ],
            [
                'label' => 'Tindakan',
                'attribute' => 'tindakanIds',
                'value' => function ($model) {
                    return implode(', ', array_map(function ($tindakan) {
                        return $tindakan->nama_tindakan;
                    }, $model->tindakans));
                }, // ambil daftar nama tindakan dari relasi tindakans
            ],
            [
                'label' => 'Obat',
                'value' => function ($model) {
                    return implode(', ', array_map(function ($transaksiObat) {
                        return $transaksiObat->obat->nama_obat;
                    }, $model->transaksiObats));
                }, // ambil daftar nama obat dari relasi transaksiObats
            ],
            [
                'label' => 'Total Harga',
                'value' => function ($model) {
                    $tindakanTotal = 0;
                    foreach ($model->tindakans as $tindakan) {
                        $tindakanTotal += $tindakan->harga;
                    }

                    $obat1Total = $model->obat1 ? ($model->obat1->harga * $model->jumlah_obat1) : 0;
                    $obat2Total = $model->obat2 ? ($model->obat2->harga * $model->jumlah_obat2) : 0;
                    $obat3Total = $model->obat3 ? ($model->obat3->harga * $model->jumlah_obat3) : 0;
                    $obatTotal = $obat1Total + $obat2Total + $obat3Total;

                    $totalHarga = $tindakanTotal + $obatTotal;
                    return Yii::$app->formatter->asDecimal($totalHarga);
                },
            ],


            'tanggal_transaksi:date', // tampilkan tanggal transaksi dalam format date
        ],
    ]) ?>

</div>