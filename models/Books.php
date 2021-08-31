<?php
include_once ROOT.'/autoload.php';

class Books extends Products
{
protected $weight;
     public  function __construct($data=NULL)
    {
      if (!empty($data)) {
        parent::__construct($data);
        $this->weight=$data['weight'];
    }
    }

    public  function save_db()
    {
      $type_id=Db::get_typeid($this->type);
      $db = Db::getConnection();
      $sql = "INSERT INTO `products`( `sku`, `name`, `price`, `type_id`, `weight`) VALUES (:sku,:name,:price,:type,:weight)";
      $result = $db->prepare($sql);
      $result->bindParam(':sku', $this->sku,PDO::PARAM_STR);
      $result->bindParam(':name', $this->name,PDO::PARAM_STR);
      $result->bindParam(':price', $this->price,PDO::PARAM_STR);
      $result->bindParam(':type',$type_id ,PDO::PARAM_INT);
      $result->bindParam(':weight', $this->weight,PDO::PARAM_STR);
      $result->execute();
      return true;
   }

   public  function get_all()
   {
     $type_id=3;
     $db = Db::getConnection();
     $sql = "Select * from products where type_id =:type";
     $result = $db->prepare($sql);
     $result->bindParam(':type', $type_id,PDO::PARAM_INT);
     $result->execute();
     $books = array();
          while ($book = $result->fetchObject(__CLASS__)) {
              $books[] = $book;
          }
      return $books;
   }

   public function getweight()
   {
       return $this->weight;
   }

   public function mydescription()
    {
      $str= "<span>Weight:{$this->getweight()}KG</span><br>";
      return $str;
    }
   public  function description($str=null)
   {
     $mydesc= parent::description($this->mydescription());
     return $mydesc;
   }

  }
