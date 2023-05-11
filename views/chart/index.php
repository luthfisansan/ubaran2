<?php

use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use app\models\transaksi;

/* @var $this yii\web\View */

$this->title = 'laporan';
$this->params['breadcrumbs'][] = $this->title;

$transaksiPerBulan = transaksi::find()
    ->select(['MONTH(tanggal_transaksi) as bulan', 'COUNT(*) as jumlah_transaksi'])
    ->where(['>=', 'tanggal_transaksi', date('Y-m-01')])
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
    $dataSet[] = (int) $item['jumlah_transaksi'];
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
?>

<div class="chart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [
            'height' => 100,
            'width' => 400
        ],
        'data' => $data,
        'clientOptions' => [
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'beginAtZero' => true,
                            'stepSize' => 1
                        ]
                    ]
                ],
                'xAxes' => [
                    [
                        'ticks' => [
                            'offset' => true,
                            'autoSkip' => false,
                        ]
                    ]
                ]
            ]
        ]
    ]);
    ?>


</div>