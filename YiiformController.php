<?php

namespace app\modules\yiiform\controllers;
use app\modules\yiiform\models\State;
use app\modules\yiiform\models\Yiiform;
use app\modules\yiiform\models\UploadFile;
use app\modules\yiiform\models\YiiformSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
/**
 * YiiformController implements the CRUD actions for Yiiform model.
 */
class YiiformController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Yiiform models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new YiiformSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Yiiform model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Yiiform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
	$model->website =  $data['Yiiform']['movies'];
     */
    public function actionCreate()
    {
        $model = new Yiiform();
		
		
        if ($this->request->isPost) {
			$data =$this->request->post();
            if ($model->load($data)) {
				//print_r ($data);
				//exit;
				
				$model->name = $data['Yiiform']['name'];
				$model->email =$data['Yiiform']['email'];
				$model->employee_number = $data['Yiiform']['employee_number'];
				$model->gender = $data['Yiiform']['gender'];
				$model->movies = implode(',',$data['Yiiform']['movies']);
				$model->textarea =  $data['Yiiform']['textarea'];
				$model->dates =  $data['Yiiform']['dates'];
				$model->image = UploadedFile::getInstance($model, 'image');
				$model->country =  $data['Yiiform']['country'];
				$model->state =  $data['Yiiform']['state'];
				
				if ($model->upload()) {
					// file is uploaded successfully
					echo "File successfully uploaded";
				
				//		return $this->render(['view', 'id' => $model->id]);
						}else{echo 'failed';}
				$model->save();
			
				
		
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Yiiform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Yiiform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Yiiform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Yiiform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Yiiform::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	public function actionState($id)
	{
	
        $count = State::find()
            ->where(['country_id' => $id])
            ->count();
			
		$lists = State::find()
            ->where(['country_id' => $id])
            ->all();

        if ($count > 0) {
            //$operations = \app\models\secondmodel::find()
             //   ->where(['firstmodelid' => $id])
             //   ->all();
            foreach ($lists as $list)
                echo "<option value='" . $list->state_id. "'>" . $list->state_name . "</option>";
        } else
            echo "<option>-</option>";

	}
	
	public function actionCity($id)
	{
	
        $count = City::find()
            ->where(['state_id' => $id])
            ->count();
			
		$lists = City::find()
            ->where(['state_id' => $id])
            ->all();

        if ($count > 0) {
            //$operations = \app\models\secondmodel::find()
             //   ->where(['firstmodelid' => $id])
             //   ->all();
            foreach ($lists as $list)
                echo "<option value='" . $list->city_id. "'>" . $list->city_name . "</option>";
        } else
            echo "<option>-</option>";

	}
}
