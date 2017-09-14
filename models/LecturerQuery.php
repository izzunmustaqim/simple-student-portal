<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Lecturer]].
 *
 * @see Lecturer
 */
class LecturerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Lecturer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lecturer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
