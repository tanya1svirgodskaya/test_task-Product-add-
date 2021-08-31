<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<link rel="stylesheet"  href="css/style2.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<title>test_task</title>
</head>
<body>

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Product Add</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/add-product"> <button class="btn btn-outline-primary" type="button" name="button">ADD</button></a>
    <a class="p-2 text-dark" > <button class="btn btn-outline-primary" type="submit" name="massdelete" form = "mass-delete">MASS DELETE</button></a>
  </nav>

</div>
<main role="main" class="container">
  <form id="check-checkbox "action="checkbox-form.php" method="post">
  <div class="container">
    <div class=" row ">
<?php  foreach ($descr as $d) {echo $d;}?>
    </div>
  </div>
  </form>
<form id="mass-delete" action=""  method="post">

</form>
</main>

<?php require 'layouts/footer.php' ?>
</body>
</html>
