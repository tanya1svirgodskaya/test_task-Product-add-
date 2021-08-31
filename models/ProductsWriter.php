<?php
include_once ROOT.'/autoload.php';

class ProductsWriter
{
  public $allproducts= array();
  public function addProduct( Products $product)
  {
      $this->allproducts[] = $product;
	}

  public function sortedwrite()
  {
      for ($j=0; $j<count($this->allproducts);$j++)
      {
        for($i=1; $i<count($this->allproducts);$i++)
        {
          if (($this->allproducts[$i-1]->getid())>($this->allproducts[$i]->getid()))
          {
              $temp=$this->allproducts[$i-1];
              $this->allproducts[$i-1]=$this->allproducts[$i];
              $this->allproducts[$i]=$temp;
          }
        }
      }
  }
    public function write()
    {
        $prodlist=array();
        foreach ($this->allproducts as $prod)
        {
          $descr=$prod->description();
          $prodlist[]=$descr;
        }
        return $prodlist;
    }
}
