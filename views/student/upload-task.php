<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 03/08/2017
 * Time: 3:53 PM
 */
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;

?>

<h1>Upload Task</h1>
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
$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]);

echo $form->field($docModel, 'uploadDoc')->fileInput();

echo \yii\bootstrap\Html::submitButton('Submit', [
    'class' => 'btn btn-primary'
]);
ActiveForm::end();
?>
