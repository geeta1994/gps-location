<!DOCTYPE html>
<html>
  <form method = "POST" action = "" enctype="multipart/form-data" >
    Lat : <input type = "text" name = "lat"><BR>
    longi : <input type = "text" name = "longi"><BR>
    Zoom : <input type = "text" name = "zoom"><BR>
    <input type="file"  name = "image" ><BR>
    <input type = "submit" name = "locate" value = "Locate">
  </form>
</html>
<?php
require 'conn.php';
//error_reporting(E_ALL);
  if(isset($_POST['locate'])){
    $lat=$_POST['lat'];
    $longi=$_POST['longi'];
    $zoom=$_POST['zoom'];

     $imgpath=$_FILES['image']['tmp_name'];
     if($imgpath){
          $img_binary = fread(fopen($imgpath, "r"), filesize($imgpath));
          $picture = base64_encode($img_binary);

          $insert=mysqli_query($conn,"INSERT INTO mymap (lat,longi,zoom,image) VALUES ('$lat','$longi','$zoom','$picture')");
            if($insert){
               //echo "inserted successfully";
                echo"<script language='javascript'>";
                echo'document.location.replace("./location.php")';
                echo"</script>";
            }else{
                echo $conn->error;
            }
    }else{
      echo "insert image";
    }
  }
  ?>
