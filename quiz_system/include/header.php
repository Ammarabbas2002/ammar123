<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">
   <nav class="navbar">
       
         
         <a href="#">Lecture Notes</a>
         <a href="#">Assignments</a>
         <a href="#">Discussion Forum</a>
         <a href="insert.php">INSERT</a>
         <a href="Delete.php">DELETE</a>
      </nav>
      <a href="std_home.php" class="logo">Student Content<span></span></a>
      <a href="login.php">Login</a>
      <a href="registration.php">Regester</a>
      

    

     
        
              
         
         
      </div>

   </section>

</header>