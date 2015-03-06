<?php
/**
 * Created by PhpStorm.
 * User: 윤수
 * Date: 2015-03-06
 * Time: 오후 11:56
 */

namespace common\models;


class PermissionHelpers
{

    public static function UserMustBeOwner($model_name, $model_id)
    {
        $connection = \Yii::$app->db;
        $user_id = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id=:$user_id AND id=:model_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":user_id", $user_id);
        $command->bindValue(":model_id", $model_id);
        if ($command->queryOne()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param mixed $user_type_name
     * @return \yii\web\Response
     */
    public static function requireUpgradeTo($user_type_name)
    {
        if (Yii::$app->user->identity->user_type_id != ValueHelpers::getUserTypeValue($user_type_name)) {
            return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
        }
    }

    public static function requireStatus($status_name)
    {
        if (Yii::$app->user->identity->status_id == ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }

    public static function requireMinimumStatus($status_name)
    {
        if (Yii::$app->user->identity->status_id >= ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }

    public static function requireRole($role_name)
    {
        if (Yii::$app->user->identity->role_id == ValueHelpers::getStatusValue($role_name)) {
            return true;
        } else {
            return false;
        }
    }

    public static function requireMinimumRole($role_name)
    {
        if (Yii::$app->user->identity->role_id >= ValueHelpers::getStatusValue($role_name)) {
            return true;
        } else {
            return false;
        }
    }

}