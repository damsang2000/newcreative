
<?php
    //data sent in header are in JSON format
    header('Content-Type:application/json');

    //take the value from variable and post the data
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $subject=$_POST['subject'];
    $option=$_POST['option'];
    $to="damsang163@gmail.com";

    //email template
    $post_message = "<b>Name : </b>". $name ."<br>";
   $post_message .= "<b>Email Address : </b>".$email."<br>";
   $post_message .= "<b>Message : </b>".$message."<br>";

   $header = "From:"+$email+" \r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";

   $retval = mail ($to,$subject,$post_message,$header);
   // message Notification
   if( $retval == true ) {
      echo json_encode(array(
         'success'=> true,
         'message' => 'Message sent successfully'
      ));
   }else {
      echo json_encode(array(
         'error'=> true,
         'message' => 'Error sending message'
      ));
   }

?>
