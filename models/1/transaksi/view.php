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
                'value' => $model->pasien->Nama,
            ],
            [
                'label' => 'Tanggal Lahir',
                'value' => $model->pasien->TanggalLahir,
            ],
            [
                'label' => 'Jenis Kelamin',
                'value' => $model->pasien->JenisKelamin,
            ],
            [
                'label' => 'NIK',
                'value' => $model->pasien->nik,
            ],
            [
                'label' => 'Alamat',
                'value' => $model->pasien->namaWilayah,
            ],
            'nama_tindakan',
            'harga',
        ],
    ]) ?>

</div>