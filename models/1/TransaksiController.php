<?php


namespace app\controllers;

use yii;
use app\models\Transaksi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pasien;
use app\models\TransaksiObat;
use app\models\TransaksiTindakan;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller
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
     * Lists all Transaksi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Transaksi::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaksi model.
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
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Transaksi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // simpan data transaksi obat
            if (!empty($model->obat_1)) {
                $transaksiObat1 = new TransaksiObat();
                $transaksiObat1->transaksi_id = $model->id;
                $transaksiObat1->obat_id = $model->obat_1;
                $transaksiObat1->jumlah_obat = $model->jumlah_obat_1;
                $transaksiObat1->save();
            }
            if (!empty($model->obat_2)) {
                $transaksiObat2 = new TransaksiObat();
                $transaksiObat2->transaksi_id = $model->id;
                $transaksiObat2->obat_id = $model->obat_2;
                $transaksiObat2->jumlah_obat = $model->jumlah_obat_2;
                $transaksiObat2->save();
            }
            if (!empty($model->obat_3)) {
                $transaksiObat3 = new TransaksiObat();
                $transaksiObat3->transaksi_id = $model->id;
                $transaksiObat3->obat_id = $model->obat_3;
                $transaksiObat3->jumlah_obat = $model->jumlah_obat_3;
                $transaksiObat3->save();
            }

            // simpan data transaksi tindakan
            if (!empty($model->tindakan)) {
                foreach ($model->tindakan as $tindakanId) {
                    $transaksiTindakan = new TransaksiTindakan();
                    $transaksiTindakan->transaksi_id = $model->id;
                    $transaksiTindakan->tindakan_id = $tindakanId;
                    $transaksiTindakan->save();
                }
            }

            // Update stok obat
            foreach ($model->detailTransaksiObat as $detailObat) {
                $obat = $detailObat->obat;
                $obat->stok -= $detailObat->jumlah;
                $obat->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }





    /**
     * Updates an existing Transaksi model.
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
     * Deletes an existing Transaksi model.
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
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transaksi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
