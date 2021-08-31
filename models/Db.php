<?php
include_once ROOT.'/autoload.php';
class Db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_config.php';
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");
        return $db;
    }

    public static function massdelete($data_id)
    {$db = self::getConnection();
      $n = count($data_id);
    //echo $id;

     for ($i=0; $i < $n; $i++) {
       $sql =  "DELETE FROM products where id=:id ";
       $result = $db->prepare($sql);
       $result->bindParam(':id', $data_id[$i],PDO::PARAM_INT);
       $result->execute();
     }
     return true;
    }
   public static function check_sku($sku)
    {
      $db = self::getConnection();
      $data = array();
      $sql =  "SELECT id FROM products WHERE sku=:sku ";
      $result = $db->prepare($sql);
      $result->bindParam(':sku', $sku,PDO::PARAM_STR);
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $result->execute();
      $row = $result->fetch();
           if (!empty($row)) {
        echo "false";}
      else{
         echo "true";}

    }
    public static  function get_typeid($type)
   {
     $db = self::getConnection();
     $data = array();
     $sql =  "SELECT id FROM type_products WHERE type=:type ";
     $result = $db->prepare($sql);
     $result->bindParam(':type', $type,PDO::PARAM_STR);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $row = $result->fetch();
     
          return $row['id'];

   }
}
