<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasien-view">

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
                'label' => 'Nama Warga',
                'value' => function ($model) {
                    return $model->warga->nama;
                }
            ], [
                'attribute' => 'nik',
                'value' => $model->warga->nik,
            ],
            [
                'label' => 'Tanggal Lahir',
                'value' => function ($model) {
                    return $model->warga->tanggal_lahir;
                }
            ],
            [
                'label' => 'Jenis Kelamin',
                'value' => function ($model) {
                    return $model->warga->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
                }
            ],
            [
                'label' => 'Alamat',
                'value' => function ($model) {
                    return $model->wilayah->nama;
                }
            ],
        ],
    ]) ?>

</div>