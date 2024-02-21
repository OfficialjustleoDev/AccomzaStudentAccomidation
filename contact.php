<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<section class="contact">

   <div class="row">
   
      <form action="" method="post">
         <h3>Contact Us</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="Email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="Number" class="box">
         <textarea name="message" placeholder="Type your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>
   </div>

</section>



<section class="faq" id="faq">

   <h1 class="heading">Typical Questions and Answers</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>How To Cancel Booking?</span><i class="fas fa-angle-down"></i></h3>
         <p> Let the Lessor that you are not interested in the propert no longer.</p>
      </div>

      <div class="box active">
         <h3><span>When will I get the possession?</span><i class="fas fa-angle-down"></i></h3>
         <p>As soon as you enquire the process for getting you the Accomza begins.</p>
      </div>

      <div class="box">
         <h3><span>Where can I pay the rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>You discuss with the Lessor the most convinient way to make payments</p>
      </div>

      <div class="box">
         <h3><span>How to contact with the buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>Accomza provides quick and efficient ways to get in touch with buyers.</p>
      
      </div>

      <div class="box">
         <h3><span>Why my listing not showing up?</span><i class="fas fa-angle-down"></i></h3>
         <p>Accomza, check all required fields are filled. If the error persists, send us a message.</p>
      </div>

      <div class="box">
         <h3><span>How to promote my listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>
            Make the Accomza cheap,affordable and list all the facilities you think students would like.
         </p> </div>

   </div>

</section>








<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>


<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>