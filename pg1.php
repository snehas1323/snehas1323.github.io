<?php 
require_once("config.php");

if(isset($_POST['submit'])){
	$m_name=mysqli_real_escape_string($link,$_POST['name']);
	$sql = "INSERT INTO manufacturer(manufacturer_name) values('$_POST[name]')";
	mysqli_query($link,$sql);
	unset($_POST);
	echo '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Successfully!</strong>inserted</div>';
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>MAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron vertical-center">
<div class="container">
<h3>Page 1(Add Manufacturer)</h3><br/>
  <form class="form-inline" action="" method="POST">
    <div class="form-group">
      <label class="sr-only" for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name"  name="name" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>

</body>
</html>
