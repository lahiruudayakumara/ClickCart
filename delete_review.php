<?php

  include("conn.php");
  $id = $_GET["id"];
  $result = mysqli_query($con, "DELETE FROM rating WHERE rating_ID=$id");
  header("location:myreviews.php");
  $con->close();
?>
<!--reference: W3Schools-->