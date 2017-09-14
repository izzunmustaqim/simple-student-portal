<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\UserType;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>My APP | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
if (Yii::$app->user->isGuest) {
    NavBar::begin(['brandLabel' => 'Student Simple Portal']);
    echo Nav::widget([
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Login', 'url' => ['/user/login']],
        ],
        'options' => ['class' => 'navbar-nav'],
    ]);
    NavBar::end();
} else {
    if (Yii::$app->user->can('admin')) {
        NavBar::begin(['brandLabel' => 'Student Simple Portal']);
        echo Nav::widget([
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Add Student', 'url' => ['/manage/add-student']],
                ['label' => 'Add Lecturer', 'url' => ['/manage/add-lecturer']],
                ['label' => 'Logout', 'url' => ['/user/logout'], 'linkOptions' => ['data-method' => 'post']],
            ],
            'options' => ['class' => 'navbar-nav'],
        ]);
        NavBar::end();
    } else {

        if (UserType::isLecturer(Yii::$app->user->id)) {
            NavBar::begin(['brandLabel' => 'Student Simple Portal']);
            echo Nav::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Create Task', 'url' => ['/lecturer/create-task']],
                    ['label' => 'Task List', 'url' => ['/lecturer/task-list']],
                    ['label' => 'Student List', 'url' => ['/lecturer/student-list']],
                    ['label' => 'Logout', 'url' => ['/user/logout'], 'linkOptions' => ['data-method' => 'post']],
                ],
                'options' => ['class' => 'navbar-nav'],
            ]);
            NavBar::end();
        }

        if (UserType::isStudent(Yii::$app->user->id)) {
            NavBar::begin(['brandLabel' => 'Student Simple Portal']);
            echo Nav::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Upload Task', 'url' => ['/student/upload-task']],
                    ['label' => 'List Task', 'url' => ['/student/list-task']],
                    ['label' => 'Logout', 'url' => ['/user/logout'], 'linkOptions' => ['data-method' => 'post']],
                ],
                'options' => ['class' => 'navbar-nav'],
            ]);
            NavBar::end();
        }

    }

}

?>
<div class="container">
    <?= $content ?>
</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
