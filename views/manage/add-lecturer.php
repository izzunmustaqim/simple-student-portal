<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 03/08/2017
 * Time: 3:53 PM
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;

?>

<h1>Add New Lecturer</h1>
<?php
if (Yii::$app->session->hasFlash('success')) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-success',
        ],
        'body' => Yii::$app->session->getFlash('success'),
    ]);
}
?>
<?php
    $form = ActiveForm::begin();

    echo $form->field($lecturer, 'name');
    echo $form->field($user, 'username');
    echo $form->field($user, 'email');
    echo $form->field($user, 'newPassword')->passwordInput();

    echo \yii\bootstrap\Html::submitButton('Submit', [
        'class' => 'btn btn-primary'
    ]);
    ActiveForm::end();
?>
