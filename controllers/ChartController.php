<?php

namespace app\controllers;

use app\models\Transaksi;
use DateTime;
use yii\web\Controller;

class ChartController extends Controller
{
    public function actionIndex()
    {
        // Ambil data dari database menggunakan Active Record
        $transaksiPerBulan = Transaksi::find()
            ->select(['MONTH(tanggal_transaksi) as bulan', 'COUNT(*) as jumlah_transaksi'])
            ->groupBy(['bulan'])
            ->orderBy(['bulan' => SORT_ASC])
            ->asArray()
            ->all();

        // Ubah format data untuk ChartJs
        $labels = [];
        $dataSet = [];

        foreach ($transaksiPerBulan as $item) {
            $bulan = DateTime::createFromFormat('!m', $item['bulan'])->format('F');
            $labels[] = $bulan;
            $dataSet[] = $item['jumlah_transaksi'];
        }

        $data = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => "Jumlah Transaksi",
                    'backgroundColor' => "rgba(179,181,198,0.2)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' => $dataSet
                ]
            ]
        ];

        return $this->render('index', [
            'data' => $data,
        ]);
    }
}
