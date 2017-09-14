<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 04/08/2017
 * Time: 9:56 AM
 */
use yii\grid\GridView;

?>

<h1>My Student List</h1>

<?= GridView::widget([
    'dataProvider' => $students,
    'columns' => [
        'name'
    ],
]) ?>
