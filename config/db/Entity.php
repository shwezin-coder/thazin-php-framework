<?php 
namespace Thazin\Core\DB;
use Thazin\Core\Router;
use Thazin\Core\Validation;
abstract class Entity extends Validation{
    abstract public static function tableName() : string;
    abstract public function attributes() : array;
    abstract public static function primaryKey() : string;
    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr",$attributes);
        $statement = self::prepare("INSERT INTO $tableName(".implode(',',$attributes).")
                     VALUES(".implode(',',$params).")
                    ");
        foreach($attributes as $attribute)
        {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }
        $statement->execute();
        return true;

    }
    public static function prepare($sql)
    {
        return Router::$router->db->pdo->prepare($sql);
    }
    public static function findOne($where) // ['email' => admin@gmail.com,first_name => shwezin]
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND",array_map(fn($attr) => "$attr = :$attr",$attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $item)
        {
            $statement->bindValue(":$key",$item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}