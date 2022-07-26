<?php
require_once "header.php";   
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $amount =$_POST['amount'];
    $price = $_POST['price'];
    $year =$_POST['year'];
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
$sql = "INSERT INTO watch (watch_name, watch_amount, watch_price, watch_year, watch_brand, watch_image)
        VALUES ('$name','$amount','$price','$year','$brand','$image')";
$run = querySQL($sql);
if ($run) { ?>
   <script>
       alert("Add new watch successfully !");
       window.location.href = "manage_watch.php";
   </script>
<?php } }  ?>
<center>
<form style="width: fit-content; margin-top: 30px;" 
      action="" method="POST" enctype="multipart/form-data">
<!-- Lưu ý: bổ sung thuộc tính enctype vào form khi upload file -->
    <fieldset>
    <legend>Add new watch </legend>
    Name: <input type="text" name="name" required maxlength="50"> <br> <br>
    Amount: <input type="number" name="amount" required maxlength="20"> <br> <br>
    Price: <input type="text" name="price" required maxlength="20"> <br> <br>
    Year : <input type="number" name="year" required maxlength="20"> <br> <br>
    Brand: <br> <br>
    <?php
    $sql = "SELECT * FROM brand";
    $run = querySQL($sql); ?>
    <select name="brand">
    <?php
    while ($row = mysqli_fetch_array($run)) { ?>
        <option value='<?= $row['brand_id'] ?>'> <?= $row['brand_name'] ?> </option>
    <?php } ?>
    </select> 
    <br> <br>
    Image: <input type="file" name="image" required> <br> <br>
    <input type="submit" value="Add" name="add">
    </fieldset>
</center>
