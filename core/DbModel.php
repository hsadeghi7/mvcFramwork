<?php

namespace app\core;


abstract class DbModel extends Model
{

    abstract public function tableName(): string;
    abstract public function attributes(): array;

    abstract public static function primaryKey(): string; // خودم استاتیکش کردم 4:20:34

    public function save()
    {
        
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);

        $statment = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUE(" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statment->bindValue(":$attribute", $this->{$attribute});
        }

        $statment->execute();
        return true;
    }


    public static function findOne($where){
        $tableName = 'users';// static::tableName(); /// 4:09:59
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statment = self::prepare("SELECT *FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statment->bindValue(":$key", $item);
        }
        $statment->execute();
        return $statment->fetchObject(static::class);
    }
    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
