<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Obat;
use app\models\Tindakan;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'pasien_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Pasien::find()->all(), 'id', 'warga.nama'),
        ['prompt' => 'Pilih Nama Pasien']
    )
    ?>


    <?= $form->field($model, 'tindakan')->checkboxList(ArrayHelper::map(Tindakan::find()->all(), 'id', 'nama_tindakan'), ['separator' => '<br>']) ?>

    <?= $form->field($model, 'obat_1')->dropDownList(
        ArrayHelper::map(Obat::find()->all(), 'id', 'nama_obat'),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <?= $form->field($model, 'jumlah_obat_1')->dropDownList(
        array_combine(range(1, 10), range(1, 10)),
        ['prompt' => 'Pilih Jumlah Obat']
    ) ?>

    <?= $form->field($model, 'obat_2')->dropDownList(
        ArrayHelper::map(Obat::find()->all(), 'id', 'nama_obat'),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <?= $form->field($model, 'jumlah_obat_2')->dropDownList(
        array_combine(range(1, 10), range(1, 10)),
        ['prompt' => 'Pilih Jumlah Obat']
    ) ?>



    <?= $form->field($model, 'obat_3')->dropDownList(
        ArrayHelper::map(Obat::find()->all(), 'id', 'nama_obat'),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <?= $form->field($model, 'jumlah_obat_3')->dropDownList(
        array_combine(range(1, 10), range(1, 10)),
        ['prompt' => 'Pilih Jumlah Obat']
    ) ?>


    <?= $form->field($model, 'total_harga')->textInput(['type' => 'number', 'step' => 'any', 'readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
    function calculateTotal() {
        var hargaTransaksi = parseFloat($('#transaksi-harga_transaksi').val()) || 0;
        var hargaObat1 = parseFloat($('#transaksi-harga_obat_1').val()) || 0;
        var jumlahObat1 = parseFloat($('#transaksi-jumlah_obat_1').val()) || 0;
        var hargaObat2 = parseFloat($('#transaksi-harga_obat_2').val()) || 0;
        var jumlahObat2 = parseFloat($('#transaksi-jumlah_obat_2').val()) || 0;
        var hargaObat3 = parseFloat($('#transaksi-harga_obat_3').val()) || 0;
        var jumlahObat3 = parseFloat($('#transaksi-jumlah_obat_3').val()) || 0;
        var totalHarga = hargaTransaksi + (hargaObat1 * jumlahObat1) + (hargaObat2 * jumlahObat2) + (hargaObat3 * jumlahObat3);
        $('#transaksi-total_harga').val(totalHarga);
    }
    
    $(document).ready(function() {
        calculateTotal();
        
        $('#transaksi-harga_transaksi, #transaksi-harga_obat_1, #transaksi-jumlah_obat_1, #transaksi-harga_obat_2, #transaksi-jumlah_obat_2, #transaksi-harga_obat_3, #transaksi-jumlah_obat_3').on('input', function() {
            calculateTotal();
        });
    });
JS;
$this->registerJs($script);
?>