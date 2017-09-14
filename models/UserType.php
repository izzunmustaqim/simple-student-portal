<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 03/08/2017
 * Time: 4:35 PM
 */


namespace app\models;


class UserType
{
    public static function isLecturer($user_id) {
        $lecturer = Lecturer::find()->where(['id' => $user_id]);
        if ($lecturer->exists()) {
            return true;
        } else return false;
    }

    public static function isStudent($user_id) {
        $student = Student::find()->where(['id' => $user_id]);
        if ($student->exists()) {
            return true;
        } else return false;
    }
}