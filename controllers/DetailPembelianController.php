<?php

namespace app\controllers;

use Yii;
use app\models\DetailPembelian;
use app\models\DetailPembelianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailPembelianController implements the CRUD actions for DetailPembelian model.
 */
class DetailPembelianController extends Controller
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
     * Lists all DetailPembelian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailPembelianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailPembelian model.
     * @param string $kode_pembelian
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_pembelian, $kode_barang)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_pembelian, $kode_barang),
        ]);
    }

    /**
     * Creates a new DetailPembelian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailPembelian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_pembelian' => $model->kode_pembelian, 'kode_barang' => $model->kode_barang]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailPembelian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_pembelian
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_pembelian, $kode_barang)
    {
        $model = $this->findModel($kode_pembelian, $kode_barang);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_pembelian' => $model->kode_pembelian, 'kode_barang' => $model->kode_barang]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetailPembelian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_pembelian
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_pembelian, $kode_barang)
    {
        $this->findModel($kode_pembelian, $kode_barang)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetailPembelian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_pembelian
     * @param string $kode_barang
     * @return DetailPembelian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_pembelian, $kode_barang)
    {
        if (($model = DetailPembelian::findOne(['kode_pembelian' => $kode_pembelian, 'kode_barang' => $kode_barang])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
