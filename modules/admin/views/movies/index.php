<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MoviesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Movies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'text:ntext',
            'date',
            // 'image',
            // 'length',
            // 'premiere',
            // 'directors',
            // 'writers',
            // 'stars',
            // 'movie',
            // 'viewed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
