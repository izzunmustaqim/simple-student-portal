<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 04/08/2017
 * Time: 11:13 AM
 */

namespace app\models;

use yii\base\Model;

class UploadForm extends Model
{
    var $uploadDoc;

    public function rules()
    {
        return [
            [['uploadDoc'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc,docx,pdf']
        ];
    }

    public function upload() {
        if ($this->validate()) {
            $this->uploadDoc->saveAs('uploads/' . $this->uploadDoc->baseName . '.' . $this->uploadDoc->extension);
            return true;
        } else {
            return false;
        }
    }
}