<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\yiiform\models\Country;
use app\modules\yiiform\models\State;
use app\modules\yiiform\models\City;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\modules\yiiform\models\Yiiform */
/* @var $form yii\widgets\ActiveForm 
<?= $form->field($model,'dates')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2022-11-30']]) ?>*/

//$temp = ArrayHelper::map(Country::find()->all(), 'country_id', 'country_name'));

?>

<div class="yiiform-form">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


	<?= $form->field($model, 'employee_number')->textInput() ?>
    
	<?= $form->field($model, 'dates')->textInput(['type'=>'date']) ?>
    
	<?php $gender = ['male'=>'male','female'=>'female'];
          echo  $form->field($model, 'gender')->radioList($gender) ;
	?>

    <?php
		$a= ['twitter'=>'Twitter','facebook' => 'Facebook', 'google' => 'Google'];
		echo $form->field($model, 'website')->dropDownList($a,['prompt'=>'Select a website']);
	?>
		
		
	<?= $form->field($model, 'movies')->checkboxList([
                        '1' => 'BB',
                        '2' => 'RRR',
                        '3' => '007',], 
                        ['separator' => '<br>']); ?>
						
	<?= $form->field($model, 'image')->fileInput() ?>

	<?= $form->field($model, 'textarea')->textArea() ?>
	
	<label>Country</label>
	
	<?= Html::activeDropDownList($model, 'country',
      ArrayHelper::map(Country::find()->all(), 'country_id', 'country_name'),
	  [
        'prompt'=>'select a country',
        'onchange'=>'
             $.get( "'.Url::toRoute('yiiform/state').'", { id: $(this).val() } )
                            .done(function( data )
                   {
                              $( ".state" ).html( data );
                            });
                        ']); ?> 
	
	<label>State</label>
	<?php if(Yii::$app->controller->action->id == 'create')
	{?>
	<select class="state"></select>
	
	<?php }else{?>
	<?= Html::activeDropDownList($model, 'state',
      ArrayHelper::map(State::find()->all(), 'state_id', 'state_name'),
	  [
        'prompt'=>'select a state',
       'onchange'=>'
             $.get( "'.Url::toRoute('yiiform/city').'", { id: $(this).val() } )
                            .done(function(data )
                   {
                              $( ".city" ).html(data );
                            });
                        ']); ?> 
	<?php }?>
	
	<label>City</label>
	<?php if(Yii::$app->controller->action->id == 'create')
	{?>
	<select class="city"></select>
	<?php }else{?>
	<?= Html::activeDropDownList($model, 'city',
      ArrayHelper::map(City::find()->all(), 'city_id', 'city_name'),
	  [
        'prompt'=>'select a city',
       ]); ?> 
	   
	 <?php }?>  
	   
    <div id="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



