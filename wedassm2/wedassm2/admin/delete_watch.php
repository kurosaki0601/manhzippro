<?php
require_once 'header.php';
$id = $_POST['id'];
$qry = "DELETE FROM watch WHERE watch_id = '$id'";
$result = querySQL($qry);
if ($result) { ?>
 <script>
     alert ("Delete watch successfully !");
     window.location.href = "manage_watch.php";
 </script>
<?php } else { ?> 
  <script>
    alert ("Delete watch failed !");
    window.location.href = "manage_watch.php";
</script>
<?php } ?>