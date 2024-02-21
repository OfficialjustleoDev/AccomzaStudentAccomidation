<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

  

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<section class="about">

   <div class="row">

      <div class="content">
         <h3>Why Accomza is the Best?</h3>
         <p>
ACCOMZA is a student accommodation platform that provides students with a comprehensive database of listings, easy-to-use search tools, and affordable options.
</p>
         <a href="contact.php" class="inline-btn">contact us</a>

      </div>
   </div>

</section>


<section class="steps">

   <h1 class="heading">3 simple steps</h1>

   <div class="box-container">

      <div class="box">
         <h3>search property</h3>
         
      </div>

      <div class="box">
        
         <h3>contact agents</h3>
        
      </div>

      <div class="box">
         <h3>Find Your Accomza</h3>
        
      </div>

   </div>

</section>










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>