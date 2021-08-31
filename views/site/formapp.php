<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<link rel="stylesheet"  href="css/style2.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<title>test_task</title>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Product Add</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="#"> <button class="btn btn-outline-primary" type="submit" name="save-button" form ='product_form' id="save-button" >Save</button></a>
    <a class="p-2 text-dark" href="/"> <button class="btn btn-outline-primary" type="button" name="button" >Cancel</button></a>
  </nav>
	</div>

<main>
<div class="mycontainer ">
	<div class="errors" id="errors">

	</div>
	<form id="product_form" action="#" method="post" class="validate">
	  <div class="form-group row">
	    <label for="staticEmail" class="col-sm-2 col-form-label" >SKU</label>
	    <div class="col-sm-10">
	      <input type="text"  class="form-control" id="sku" name="sku">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="name" name="name" >
	    </div>
	  </div>
		<div class="form-group row">
	    <label for="inputPassword" class="col-sm-2 col-form-label">Price($)</label>
	    <div class="col-sm-10">
	      <input type="text" class="required form-control " id="price" name="price"  >

	    </div>
	  </div>
		<div class="switcher">
			<div class="form-group row ">
			<label for="inputPassword" class="col-sm-5 col-form-label">Type switcher</label>
		<div class="col-sm-7">
		<select class=" form-control " name="myselect" id="productType" >
			<option  value=""></option>
			<option value="DVD" id="DVD">DVD</option>
			<option value="Furniture" id="furniture">Furniture</option>
			<option value="Book" id="book">Book</option>

		</select>
		</div>
		</div>
		</div>
		<div class="form_description " id="form_description">
		</div>

	<script src="/js/script1.js"></script>

	</form>
</div>

</main>

 <?php require 'layouts/footer.php' ?>

</body>
</html>
