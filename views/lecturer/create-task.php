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

<h1>Create Task</h1>
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

echo $form->field($task, 'name');
echo $form->field($task, 'due')->widget(
    DatePicker::className(), [
    // inline too, not bad
    'inline' => true,
    // modify template for custom rendering
    'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]);

echo Html::activeDropDownList($task, 'limit', $limit, [
    'class' => 'form-control'
]);

echo '<br/>';

echo \yii\bootstrap\Html::submitButton('Submit', [
    'class' => 'btn btn-primary'
]);
ActiveForm::end();
?>
