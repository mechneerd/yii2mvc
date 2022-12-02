<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\yiiform\models\YiiformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yiiform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'employee_number') ?>

    <?= $form->field($model, 'textarea') ?>

	<?= $form->field($model, 'movies') ?>
	
	<?= $form->field($model, 'image') ?>
	
	<?= $form->field($model, 'dates') ?>
	
	<?= $form->field($model, 'country') ?>
	<?= $form->field($model, 'state') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
