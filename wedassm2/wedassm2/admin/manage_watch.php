<?php
require_once 'header.php';

$qry = "SELECT * FROM watch";
if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	$qry .= " WHERE watch_name LIKE '%$keyword%' 
	          OR watch_price LIKE '%$keyword%'"; 
    $result = querySQL($qry);
   //không tìm thấy kết quả  
   if ($result->num_rows == 0) {  ?>
   <script>
	 alert("watch not found");
	 window.location.href = "";
   </script> 
   <?php } 
}
$result = querySQL($qry);
?>
<center>
<form class="frm123" action="" method="POST">
	<fieldset>
		<legend> Search Motor </legend>
		<input type="text" name="keyword" required maxlength="15"
	  	placeholder="Input name or price"> <br> <br>
		<input type="submit" value="Search" name="search">
	</fieldset>
</form>
<br><br>
<table class="tbl" border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Amount</th>
		<th>Price</th>
		<th>Year</th>
		<th>Brand</th>
		<th>Image</th>
		<th>Options</th>
		
	</tr>
		<?php 
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?= $row[2] ?></td>
			<td><?= $row[3] ?></td>
			<td><?= $row[4] ?></td>
			<td><?= $row[5] ?></td>
			<?php
			//Hiển thị class name thay vì class id
			$qry1 = "SELECT * FROM brand";
			$result1 = querySQL($qry1);
			while ($row1 = mysqli_fetch_array($result1)) {
				if ($row1["brand_id"] == $row["watch_brand"]) {
					$brand = $row1["brand_name"];
				}
			}
			?>
			<td><?= $brand ?></td>
			</td>
			<td> 
			<img src='images\watch\<?= $row['watch_image'] ?>' width="100" height="130"></td>
		    </td>
			<td> 
				<form class="frm_inline" action="update_watch.php" method="POST">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Update">
			    </form>
				<form class="frm_inline" action="delete_watch.php" method="POST"
				 onsubmit="return confirmDelete();">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Delete">
			    </form>
			</td>
		</tr>
		<?php } ?>
</table>
</center>
<script>
	function confirmDelete() {
		var del = confirm("Do you want to delete this watch ?");
		if (del)
			return true;
		else
			return false;
	}
</script>