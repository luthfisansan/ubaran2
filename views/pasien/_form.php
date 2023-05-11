<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Warga;


/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>




    <?= $form->field($model, 'wilayah_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Wilayah::find()->all(), 'id', 'nama')) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>