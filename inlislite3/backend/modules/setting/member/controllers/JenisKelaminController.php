<?php

namespace backend\modules\setting\member\controllers;

use Yii;
use common\models\JenisKelamin;
use common\models\JenisKelaminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenisKelaminController implements the CRUD actions for JenisKelamin model.
 */
class JenisKelaminController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all JenisKelamin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisKelaminSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single JenisKelamin model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			 
        return $this->redirect(['view', 'id' => $model->ID]);
        } else {
        return $this->render('view', ['model' => $model]);
}
    }

    /**
     * Creates a new JenisKelamin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   //  public function actionCreate()
   //  {
   //      $model = new JenisKelamin;

   //      if ($model->load(Yii::$app->request->post()) && $model->save()) {
			// Yii::$app->getSession()->setFlash('success', [
   //                  'type' => 'info',
   //                  'duration' => 500,
   //                  'icon' => 'fa fa-info-circle',
   //                  'message' => Yii::t('app','Success Save'),
   //                  'title' => 'Info',
   //                  'positonY' => Yii::$app->params['flashMessagePositionY'],
   //                  'positonX' => Yii::$app->params['flashMessagePositionX']
   //              ]);
   //      return $this->redirect(['index']);
   //      } else {
   //          return $this->render('create', [
   //              'model' => $model,
   //          ]);
   //      }
   //  }

    /**
     * Updates an existing JenisKelamin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			 Yii::$app->getSession()->setFlash('success', [
                    'type' => 'info',
                    'duration' => 500,
                    'icon' => 'fa fa-info-circle',
                    'message' => Yii::t('app','Success Edit'),
                    'title' => 'Info',
                    'positonY' => Yii::$app->params['flashMessagePositionY'],
                    'positonX' => Yii::$app->params['flashMessagePositionX']
                ]);
        return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JenisKelamin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  //   public function actionDelete($id)
  //   {
  //       $this->findModel($id)->delete();
		// Yii::$app->getSession()->setFlash('success', [
  //                   'type' => 'info',
  //                   'duration' => 500,
  //                   'icon' => 'fa fa-info-circle',
  //                   'message' => Yii::t('app','Success Delete'),
  //                   'title' => 'Info',
  //                   'positonY' => Yii::$app->params['flashMessagePositionY'],
  //                   'positonX' => Yii::$app->params['flashMessagePositionX']
  //               ]);
  //       return $this->redirect(['index']);
  //   }

    /**
     * Finds the JenisKelamin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JenisKelamin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisKelamin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
