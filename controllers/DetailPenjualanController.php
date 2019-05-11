<?php

namespace app\controllers;

use Yii;
use app\models\DetailPenjualan;
use app\models\DetailPenjualanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailPenjualanController implements the CRUD actions for DetailPenjualan model.
 */
class DetailPenjualanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DetailPenjualan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailPenjualanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailPenjualan model.
     * @param string $kode_penjualan
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_penjualan, $kode_barang)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_penjualan, $kode_barang),
        ]);
    }

    /**
     * Creates a new DetailPenjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailPenjualan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_penjualan' => $model->kode_penjualan, 'kode_barang' => $model->kode_barang]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailPenjualan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_penjualan
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_penjualan, $kode_barang)
    {
        $model = $this->findModel($kode_penjualan, $kode_barang);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_penjualan' => $model->kode_penjualan, 'kode_barang' => $model->kode_barang]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetailPenjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_penjualan
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_penjualan, $kode_barang)
    {
        $this->findModel($kode_penjualan, $kode_barang)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetailPenjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_penjualan
     * @param string $kode_barang
     * @return DetailPenjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_penjualan, $kode_barang)
    {
        if (($model = DetailPenjualan::findOne(['kode_penjualan' => $kode_penjualan, 'kode_barang' => $kode_barang])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
