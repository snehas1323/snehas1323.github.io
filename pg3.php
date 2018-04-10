<?php 
require_once("config.php");

if(isset($_POST['submit'])){
	$m_name=mysqli_real_escape_string($link,$_POST['name']);
	$sql = "INSERT INTO manufacturer(manufacturer_name) values('$_POST[name]')";
	mysqli_query($link,$sql);
	echo "Inserted Successfully";
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#inventory').DataTable();
  } );
		function sold(s_no,count) {
		$.ajax({
			type: "POST",
			url: "test.php",
			data: { 
				no: s_no,
				count: count 
			},
			success: function(msg){
			$( "#inventory" ).load( "pg3.php #inventory" );
			alert( "Action Performed" );		
			
        }
      });
    } 
   </script>
</head>
<body>
<div class="jumbotron vertical-center">
<div class="container">
<h3>Page 3(View Repository)</h3><br/>
  <table id="inventory" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Serial no</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
	<?php $sql1 = mysqli_query($link,"SELECT * FROM model m join manufacturer a where m.manufacturer_id=a.manufacturer_id");

	while($res = mysqli_fetch_array($sql1)){  ?>
            <tr>
                <td><?php echo $res['serial_no'];?></td>
                <td><?php echo $res['manufacturer_name'];?></td>
                <td><?php echo $res['model_name'];?></td>
                <td><?php echo $res['count'];?></td>
                <td><button class="btn btn-primary" id="sold" value="<?php echo $res['serial_no'];?>" onclick="sold(this.value,<?php
				echo $res['count']; ?>)">Sold</button></td>
            </tr>
	<?php } ?>
        </tbody>
        
    </table>
</div>
</div>

</body>
</html>
