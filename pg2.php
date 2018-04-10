<?php 
require_once("config.php");
if(isset($_POST['submit'])){
	$model_name=mysqli_real_escape_string($link,$_POST['m_name']);
	$manu_id=mysqli_real_escape_string($link,$_POST['manu_id']);
	$count=mysqli_real_escape_string($link,$_POST['count']);
	$sql = "INSERT INTO model(model_name,manufacturer_id,count) values('$model_name','$manu_id','$count')";
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
	<style type="text/css">

	</style>
	<script type="text/javascript">
	</script>
	</head>
<body>
<div class="jumbotron vertical-center">
<div class="container">
<h3>Page 2(Add Model)</h3><br/>
<div id="error"></div>
  <form class="form-inline" action="" method="POST">
  <div class="form-group">
      <label class="sr-only" for="name">Name:</label>
      <input type="name" class="form-control" id="m_name" placeholder="Enter model name"  name="m_name" required>
  </div>
  <div class="form-group">  
  <div class="dropdown">
	<select class="form-control" name="manu_id" id="manu_id" required>
	<option value="" disabled selected>Select Manufacturer</option>
		<?php $manu = mysqli_query($link,"SELECT * FROM manufacturer");
		while($res = mysqli_fetch_array($manu)){?>
	<option value="<?php echo $res['manufacturer_id']; ?>"><?php echo $res['manufacturer_name'];?></option><?php } ?>
	</select>
  </div>
  </div>
  <div class="form-group">
      <label class="sr-only" for="name">Count:</label>
      <input type="number" class="form-control" id="count" placeholder="Enter count"  name="count" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</body>
</html>
