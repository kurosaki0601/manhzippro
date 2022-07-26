<?php
require_once 'header.php';
$sql = "SELECT * FROM brand";
$result = querySQL($sql);
?>

<center>
   <p id="a"><h2>Brand Manage</h2></p>
<table class='tbl' border=1>
    <tr>
        <th > Brand ID </th>
        <th > Brand Name </th>
        <th > Options </th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    $id = $row['brand_id']; //$row[0] (cột 1)
    $name = $row['brand_name']; //$row[1] (cột 2) ?>
    <tr>
        <td> <?= $id ?> </td>
        <td> <?= $name ?> </td>
        <td> 
            <form class='frm_inline' action="update_brand.php" method="POST">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Update'>
            </form>
            <form class='frm_inline' action='delete_brand.php' method="POST" onsubmit="return confirmDelete();">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Delete'>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</center>
<script>
    function confirmDelele() {
        var del = confirm("Do you want to delete this brand ?");
        if (del)
            return true;
        else
            return false;
    }
</script>