<?php 
require_once 'header.php';
$id = $_POST['id'];
$qry = "SELECT * FROM watch WHERE watch_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
$name = $row['watch_name'];
$amount = $row['watch_amount'];
$price = $row['watch_price'];
$year =$row['watch_year'];
$brand = $row['watch_brand'];
$image = $row['watch_image'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $amount =$_POST['amount'];
    $price = $_POST['price'];
    $year=$_POST['year'];
    $brand = $_POST['brand'];
    $image = "";
//đoạn code dùng để upload & xử lý ảnh
//kiểm tra người dùng đã chọn file ảnh có dung lượng khác 0
if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {	
   //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
    $temp_name = $_FILES['image']['tmp_name'];
    //khai báo biến dùng để lưu tên của ảnh
    $img_name = $_FILES['image']['name'];
    //tách tên file ảnh dựa vào dấu chấm
    $parts = explode(".", $img_name);
    //tìm index cuối cùng
    $lastIndex = count($parts) - 1;
    //lấy ra extension (đuôi) file ảnh
    $extension = $parts[$lastIndex];
    //thiết lập tên mới cho ảnh
    $image = $name . "_" . $brand . "." . $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $image_folder = "images/watch/";
    $destination = $image_folder . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
} 
else { //người dùng không update ảnh => lấy lại ảnh cũ
    $image =  $row['watch_image'];
}
$query12 = "UPDATE watch SET watch_name = '$name', watch_price = '$price', 
          watch_brand = '$brand', watch_image = '$image' ,'watch_amount' = '$amount'
          WHERE watch_id = '$id'";
$result12 = querySQL($query12);
if ($result12) { ?>
  <script>
      alert("Update successfully !");
      window.location.href = "manage_watch.php";
  </script>
<?php } else { ?>
    <script>
      alert("Update failed !");
      window.location.href = "manage_watch.php";
  </script>
<?php } } ?>
<center>
<form class="frm123" action="" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend> Update watch </legend>
        Name: <input type="text" required maxlength="30" size="20"
               name="name" value="<?= $name ?>"> <br> <br>
        Amount: <input type="number"required maxlength="20" size="20"
                name="amount" value="<?= $amount ?>"> <br> <br>
        Price: <input type="text" required maxlength="20" size="19"
               name="price" value="<?= $price ?>"> <br> <br>
        Year: <input type="number" required maxlength="20" size="19"
               name="year" value="<?= $year  ?>"> <br> <br>              
        Brand:  
        <?php
        $sql = "SELECT * FROM brand";
        $run = querySQL($sql); 
        ?>
        <select name="brand">
        <?php
        while ($row1 = mysqli_fetch_array($run)) { 
            if ($row1['brand_id'] == $brand) { ?>
                <option value='<?= $brand ?>' selected> <?= $row1['brand_name'] ?> </option>
            <?php } else { ?>
                <option value='<?= $row1['brand_id'] ?>'> <?= $row1['brand_name'] ?> </option>
            <?php } } ?>
        </select> 
        <br> <br>
        Image: <img src='images\watch\<?= $image ?>' width="150" height="150" ><br>
        <input type="file" name="image" accept="images/*"> <br> <br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Update" name="update">
    </fieldset>
</form>
</center>