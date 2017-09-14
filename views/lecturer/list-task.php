<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 04/08/2017
 * Time: 9:56 AM
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<h1>My Task List</h1>

<?= GridView::widget([
    'dataProvider' => $tasks,
    'columns' => [
        'name',
        [
            'attribute' => 'due',
            'content' => function ($model, $key, $index, $column) {
                return Yii::$app->formatter->asDate($model->due, 'php: d-m-Y');
            }
        ],
        'limit',
        [
            'header' => 'Action',
            'template' => '{update} {delete}',
            'class' => 'yii\grid\ActionColumn',
        ],


    ],
]) ?>

