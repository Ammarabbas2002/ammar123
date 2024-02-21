
<center>
<style>
  body{
    background-color: blueviolet;
  }
</style>
<html xmlns="2.php" xml:lang="en" lang="en"> 
  <head><title>3</title></head> 
  <body> 
    <h2>Success!</h2>
   
 <?php 
    // get form input 
    $type = $_POST['selType']; 
    $color = $_POST['txtColor']; 
 
    // use form input 
    echo "Your $color $type is ready. Safe driving!"; 
    ?> 
  </body> 
</html>
</center>