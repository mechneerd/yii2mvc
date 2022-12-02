<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\yiiform\models\YiiformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yiiforms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yiiform-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Yiiform', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'gender',
            'employee_number',
			'textarea',
			'website',
			'movies',
			'country',
			'state',
			
			[
			'attribute' => 'movies',
			 'value'=>function($model)
			  {
				 $web = explode(',',$model->movies);
				 if (in_array('1',$web)){
					return 'BB';}
				 if (in_array('2',$web)){
					return 'RRR';}
				 if (in_array('3',$web)){
					return '007';}
				 else{ return '';}
				 
			  },
			  
			],
			
			
			'dates',
			//'image',
			[
			'attribute' => 'image',
			 'value'=>function($model)
			  {
				  return $model->image?'<img src="../uploads/'.$model->image.'" width="50px" height="50px">':'';
			  },
			  'format'=>'raw'
		   ],
			
			/**
			['label' => 'ShowImage',

			'format' => ['image',['width'=>'50']], 

			<?php echo '<img src="<?= Yii::$app->request->baseUrl '.' "/uploads/" '. $model->image ?>"' ;?>,

							

			],
			**/
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
