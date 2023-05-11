<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Pasien::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Pasien']
    ) ?>

    <?= $form->field($model, 'tindakan_ids[]')->checkboxList(
        ArrayHelper::map(\app\models\Tindakan::find()->all(), 'id', 'nama_tindakan'),
        ['separator' => '<br>']
    ) ?>




    <?= $form->field($model, 'obat1_id')->dropDownList(
        ArrayHelper::map(\app\models\Obat::find()->all(), 'id', 'nama_obat'),
        ['prompt' => 'Pilih Obat 1']
    ) ?>

    <?= $form->field($model, 'jumlah_obat1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obat_id2')->dropDownList(
        ArrayHelper::map(\app\models\Obat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Obat 2']
    ) ?>

    <?= $form->field($model, 'jumlah_obat2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obat_id3')->dropDownList(
        ArrayHelper::map(\app\models\Obat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Obat 3']
    ) ?>

    <?= $form->field($model, 'jumlah_obat3')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>