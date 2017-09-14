<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 03/08/2017
 * Time: 11:56 AM
 */
use app\models\Lecturer;
use yii\bootstrap\Alert;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

<h1>Add New Student</h1>
<?php
if (Yii::$app->session->hasFlash('success')) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-success',
        ],
        'body' => Yii::$app->session->getFlash('success'),
    ]);
}

if (Yii::$app->session->hasFlash('error')) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-danger',
        ],
        'body' => Yii::$app->session->getFlash('error'),
    ]);
}
?>
<form action="<?= Url::to(['/manage/do-add-student']) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <div class="form-group">
        <label for="">Student Name</label>
        <input type="text" class="form-control" id="studentName" placeholder="Student Name" name="Student[name]">
    </div>

    <div class="form-group">
        <label for="">Choose Lecturer</label>
        <?= Html::dropDownList('Student[lecturer_id]', '',
            ArrayHelper::map(Lecturer::find()->all(), 'id', 'name'), [
                'class' => 'form-control'
            ]) ?>
    </div>

    <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" id="studentUsername" placeholder="Username" name="User[username]">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" id="studentEmail" placeholder="Student Email" name="User[email]">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" id="studentPassword" placeholder="Password" name="User[password]">
    </div>


    <button type="submit" class="btn btn-default">Submit</button>
</form>