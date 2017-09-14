<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $name
 * @property string $due
 * @property integer $limit
 * @property integer $lecturer_id
 *
 * @property Document[] $documents
 * @property Lecturer $lecturer
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'due', 'lecturer_id'], 'required'],
            [['due'], 'safe'],
            [['due'], 'date', 'format' => 'php:Y-m-d', 'min' => Yii::$app->formatter->asDate('now', 'php:Y-m-d' )],
            [['limit', 'lecturer_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['lecturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lecturer::className(), 'targetAttribute' => ['lecturer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'due' => 'Due',
            'limit' => 'Limit',
            'lecturer_id' => 'Lecturer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLecturer()
    {
        return $this->hasOne(Lecturer::className(), ['id' => 'lecturer_id']);
    }

    /**
     * @inheritdoc
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }
}
