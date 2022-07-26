<?php
require_once 'header.php';
//kiểm tra người dùng đã bấm nút Add chưa
//nếu đã bấm rồi thực thi câu lệnh SQL
//ngược lại skip code PHP và hiển thị form
if (isset($_POST['add'])) {
$name = $_POST['name'];
$sql = "INSERT INTO brand (brand_name) VALUES ('$name')";
$run = querySQL($sql);
if ($run) { ?>
  <script>
      alert("Add new brand successfully !");
      window.location.href = "manage_brand.php";
  </script>
<?php } else { ?>
   <script>
       alert("Add brand failed !");
       window.location.href = "manage_brand.php";
   </script>
<?php } } ?>
<center>
    <form style="width: fit-content; margin-top: 30px;" 
          action="add_brand.php" method="POST">
        <fieldset>
            <legend>Add new brand</legend>
        Brand: <input type="text" name="name" required maxlength="30"> 
        <br><br>
        <input type="submit" value="Add" name="add">
        </fieldset>
    </form>
</center>