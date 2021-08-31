<?php
include_once ROOT.'/autoload.php';

class SiteController{

	public function actionIndex()
	{
		if(isset($_POST['massdelete'])) {
			$deletedata=$_POST['formDoor'];
			Db::massdelete($deletedata);
		}
		$productwrite= new ProductsWriter ;
		$books= new Books;
		$dvds= new DVD;
		$furnitures= new Furniture;
		$data=array($books,$dvds,$furnitures);
		foreach ($data as $d) {
			$result= $d->get_all();
			foreach ($result as $r) {
				$productwrite->addProduct($r);
				}
		}
		$productwrite->sortedwrite();
		$descr=$productwrite->write();
		require_once (ROOT.'/views/site/index.php');
		return true;
	}

	public function actionProductadd()
	{
		if(isset($_POST['save-button']))
		{
			if ($_POST['myselect']=='Furniture') {
			$obj=new Furniture ($_POST);
		} elseif ($_POST['myselect']=='Book') {
			$obj=new Books ($_POST);
		} elseif ($_POST['myselect']=='DVD') {
			$obj=new DVD ($_POST);
		}
		$obj->save_db();
		header("Location:/");
	}
		require_once (ROOT.'/views/site/formapp.php');
		return true;
	}

	public function actionCheckfunc()
	{
		if (isset($_POST['sku'])) {
		Db::check_sku($_POST['sku']);
	}
		return true ;
	}

	public function actionSaveproduct()
	{
		require_once (ROOT.'/views/site/index.php');
		return true;
	}
}
