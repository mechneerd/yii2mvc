<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\yiiform\models\Yiiform */

$this->title = 'Create Yiiform';
$this->params['breadcrumbs'][] = ['label' => 'Yiiforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yiiform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
