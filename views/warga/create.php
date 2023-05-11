<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Warga $model */

$this->title = 'Create Warga';
$this->params['breadcrumbs'][] = ['label' => 'Wargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
