<?php
include_once ROOT.'/autoload.php';
abstract class Products
{ protected $id;
 protected $sku;
 protected $name;
 protected $price;
 protected $type;

    /**
     * Returns an array of categories
     */
     public function __construct($data=null)
     {
       if (!empty($data))
         {
         $this->sku=$data['sku'];
         $this->name=$data['name'];
         $this->price=$data['price'];
         $this->type=$data['myselect'];
       }
     }




    public function getsku()
    {
      return $this->sku;
    }
    public function getname()
    {
      return $this->name;
    }
    public function getPrice()
    {
      return $this->price;
    }
    public function getid()
    {
      return $this->id;
    }
    public  function description($str=NULL)
    {
    $description= "<div class=\"col-3\">
    <div class=\"card  mb-4  w-100 \"  >
      <div class=\"check\" style=\"padding-left: 10px; padding-top:5px;\">

        <input type=\"checkbox\" class=\"delete-checkbox\" form=\"mass-delete\" name=\"formDoor[]\" value=\"{$this->getid()}\" >
        </div>
          <div class=\"card-text text-center \">
            <span>{$this->getsku()}</span> <br>
            <span>{$this->getname()}</span><br>
            <span>{$this->getPrice()}$</span><br>
            {$str}
          </div>
      </div>
    </div>";
    return $description;
}

}
?>
