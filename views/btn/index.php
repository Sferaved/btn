<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Btn;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BtnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Btns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="btn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Btn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time:datetime',
            'curency:ntext',
            'summa',
            'exchange',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Btn $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); 



    echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Tabl BTС'],
        'xAxis' => [
            'categories' => $categories
        ],
        'yAxis' => [
            'title' => ['text' => 'Dollars from the day']
        ],
         'series' => [
            $series,
        ]
    ]
    ]);

?>
</div>
