<?php
include_once ROOT.'/autoload.php';

class DVD extends Products
{
protected $size;
     public  function __construct($data=NULL)
    {
      if (!empty($data)) {
          parent::__construct($data);
          $this->size=$data['size'];
        }
    }

    public  function save_db()
   {
    $type_id=Db::get_typeid($this->type);
    $db = Db::getConnection();
    $sql = "INSERT INTO `products`( `sku`, `name`, `price`, `type_id`, `size`) VALUES (:sku,:name,:price,:type,:size)";
    $result = $db->prepare($sql);
    $result->bindParam(':sku', $this->sku,PDO::PARAM_STR);
    $result->bindParam(':name', $this->name,PDO::PARAM_STR);
    $result->bindParam(':price', $this->price,PDO::PARAM_STR);
    $result->bindParam(':type',$type_id ,PDO::PARAM_INT);
    $result->bindParam(':size', $this->size,PDO::PARAM_STR);
    $result->execute();
    return true;
   }

   public  function get_all()
   {
     $type_id=1;
     $db = Db::getConnection();
     $sql = "Select * from products where type_id =:type";
     $result = $db->prepare($sql);
     $result->bindParam(':type', $type_id,PDO::PARAM_INT);
     $result->execute();
     $dvds = array();
        while ($dvd = $result->fetchObject(__CLASS__)) {
            $dvds[] = $dvd;
        }
        return $dvds;
    }

     public function getsize()
     {
       return $this->size;
     }

     public function mydescription()
     {
       $str="<span>Size:{$this->getsize()}MB</span><br>";
       return $str;
     }

      public  function description($str=null)
      {
        $mydesc= parent::description($this->mydescription());
        return $mydesc;
      }
}
