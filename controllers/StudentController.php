<?php

namespace app\controllers;

use app\models\Document;
use app\models\Student;
use app\models\Task;
use app\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 04/08/2017
 * Time: 9:10 AM
 */
class StudentController extends Controller
{

    //beforeAction

    public function actionIndex()
    {

    }

    public function actionListTask()
    {
        $student = Student::findOne(Yii::$app->user->id);

        $task_list = $student->lecturer->getTasks();

        $task_provider = new ActiveDataProvider([
            'query' => $task_list
        ]);

        return $this->render('list-task', [
            'tasks' => $task_provider
        ]);
    }

    public function actionUploadTask($id)
    {
        $document = new Document();
        $docModel = new UploadForm();

        if (Yii::$app->request->isPost) {

            $task = Task::findOne($id);
            $task_limit = $task->limit;

            $total_document_uploaded = Document::find()->where(['student_id' => Yii::$app->user->id])->andWhere(['task_id' => $id])->count();

            if ($total_document_uploaded < $task_limit) {
                $docModel->uploadDoc = UploadedFile::getInstance($docModel, 'uploadDoc');

                if ($docModel->upload()) {

                    $document->path = Url::home(true) . '/uploads/' . $docModel->uploadDoc->baseName . '.' . $docModel->uploadDoc->extension;
                    $document->task_id = $id;
                    $document->student_id = Yii::$app->user->id;

                    $document->save();


                }
            } else {
                $docModel->addError('uploadDoc', 'You can only upload ' . $task_limit . ' times only.');
            }

        }

        return $this->render('upload-task', [
            'document' => $document,
            'docModel' => $docModel,
        ]);
    }
}