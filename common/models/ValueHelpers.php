<?php
/**
 * Created by PhpStorm.
 * User: 윤수
 * Date: 2015-03-06
 * Time: 오후 5:34
 */

namespace common\models;


class ValueHelpers
{
    /**
     * return the value of a role name handed in as string
     * @param mixed $role_name
     */
    public static function getRoleValue($role_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT role_value FROM role WHERE role_name = :role_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":role_name", $role_name);
        $result = $command->queryOne();

        return $result['role_value'];
    }

    public static function getStatusValue($status_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT status_value FROM status WHERE status_name = :status_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":status_name", $status_name);
        $result = $command->queryOne();

        return $result['status_value'];
    }

    /**
     *
     * @param $user_type_name
     * @return mixed
     */
    public static function getUserTypeValue($user_type_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT user_type_value FROm user_type WHERE user_type_name = :user_type_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":user_type_name", $user_type_name);
        $result = $command->queryOne();

        return $result['user_type_value'];

    }


}