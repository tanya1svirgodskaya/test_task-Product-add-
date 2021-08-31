<?php
include_once ROOT.'/autoload.php';
class Furniture extends Products
{
protected $height;
protected $length;
protected $width;

     public  function __construct($data=NULL)
    {
    if (!empty($data)) {
      parent::__construct($data);
      $this->height=$data['height'];
      $this->length=$data['length'];
      $this->width=$data['width'];
      }
    }

    public  function save_db()
   {
    $type_id=Db::get_typeid($this->type);
    $db = Db::getConnection();
    $sql = "INSERT INTO `products`( `sku`, `name`, `price`, `type_id`, `height`,`length`,`width`) VALUES (:sku,:name,:price,:type,:height,:length,:width)";
    $result = $db->prepare($sql);
    $result->bindParam(':sku', $this->sku,PDO::PARAM_STR);
    $result->bindParam(':name', $this->name,PDO::PARAM_STR);
    $result->bindParam(':price', $this->price,PDO::PARAM_STR);
    $result->bindParam(':type',$type_id ,PDO::PARAM_INT);
    $result->bindParam(':height', $this->height,PDO::PARAM_STR);
    $result->bindParam(':length', $this->length,PDO::PARAM_STR);
    $result->bindParam(':width', $this->width,PDO::PARAM_STR);
    $result->execute();
    return true;
   }

   public  function get_all()
   {
     $type_id=2;
     $db = Db::getConnection();
     $sql = "Select * from products where type_id =:type";
     $result = $db->prepare($sql);
     $result->bindParam(':type', $type_id,PDO::PARAM_INT);
     $result->execute();
     $furnitures = array();
        while ($furniture = $result->fetchObject(__CLASS__)) {
            $furnitures[] = $furniture;
        }
      return $furnitures;
    }

     public function getwidth()
     {
       return $this->width;
     }

     public function getheight()
     {
       return $this->height;
     }

     public function getlength()
     {
       return $this->length;
     }
     
     public function mydescription()
     {
       $str= "<span>Dimension:{$this->getheight()}x{$this->getwidth()}x{$this->getlength()}</span><br>";
       return $str;
     }

      public  function description($str=null)
      {
        $mydesc= parent::description($this->mydescription());
        return $mydesc;
      }
}
