<?php
/**
 * Created by PhpStorm.
 * User: 윤수
 * Date: 2015-03-07
 * Time: 오전 12:22
 */

namespace common\models;


class RecordHelpers
{
    public static function userHas($model_name)
    {
        $connection = \Yii::$app->db;
        $user_id = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id=:$user_id ";
        $command = $connection->createCommand($sql);
        $command->bindValue(":user_id", $user_id);
        $result = $command->queryOne();
        if ($result == null) {
            return false;
        } else {
            return $result['id'];
        }
    }


}