<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 27-Jul-18
 * Time: 2:45 PM
 */
if (!isset($_SESSION)) {
    session_start();
}
$link = mysqli_connect("localhost", "root", "", "carena");

if (isset($_GET['message_id'])) {
    $msg_id = $_GET['message_id'];
    $query = "SELECT * FROM contact_messages WHERE message_id=" . $msg_id;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $name = $row['uname'];
    $email = $row['email'];
    $msg = $row['message'];
    $phone=$row['phone'];
    $subject=$row['subject'];

} else {
    echo "failed";
}

if(isset($_POST['replyBtn'])){
    $to = $email;
    $subject = "Response To Your Message";
    $message = $_POST['replyMsg'];
    $headers = "From: raihantanvir.96@gmail.com";

    ini_set('SMTP','localhost');
    ini_set('smtp_port',25);

    if(mail($to,$subject,$message,$headers)){
        $msg_id = $_GET['message_id'];
        $replyStatus=1;
        $replySql="UPDATE contact_messages SET status=1 where message_id=$msg_id";
        if(mysqli_query($link,$replySql)){
            echo "<script type='text/javascript'>alert('Message Sent')</script>";
        }
    }
    else echo "<script type='text/javascript'>alert('Failed')</script>";
}
echo "<div class='row p-4 mb-5'>
            <div class='col-md-6 border-right'>
              <h2 class=\" font-weight\">Message Details:</h2>

                <div class=\"input-group mb-3 mt-3\">
                       <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">Name</span>
                       </div>
                   <input disabled class='form-control  bg-white' value='$name'>
                </div>
           
                <div class=\"input-group mb-3\">
                       <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">Email</span>
                       </div>
                   <input disabled class='form-control  bg-white' value='$email'>
                </div>
                <div class=\"input-group mb-3\">
                       <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">Phone</span>
                       </div>
                   <input disabled class='form-control  bg-white' value='$phone'>
                </div>
         
                <div class=\"input-group mb-3\">
                     <div class=\"input-group-prepend\">
                          <span class=\"input-group-text\">Subject</span> 
                     </div>
                     <input disabled class='form-control bg-white'  value='$subject'>
                </div>         

                <div class=\"input-group mb-3\">
                       <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">Message</span>
                       </div>
                   <textarea disabled class='form-control  bg-white' rows='6'>$msg</textarea>
                </div>
             </div>         
   <div class='col-md-6 pl-4'>
      <h2 class=\" font-weight\">Response to Message:</h2>

  <form class=\"form-group mt-3 \"   method=\"post\" enctype='multipart/form-data'>
                   <div class='input-group mb-3'>
                       <div class='input-group-prepend'>
                            <span class='input-group-text'>To</span>
                       </div>
                   <input disabled class='form-control  bg-white' name='toUser' value='$email'>
                </div>
                      <div class='input-group mb-3'>
                       <div class='input-group-prepend'>
                            <span class='input-group-text'>Reply</span>
                       </div>
                   <textarea name='replyMsg'class='form-control  bg-white' required rows='6' placeholder='your reply text....'></textarea>
                </div>
                                
                         <br>
                        <input type=\"submit\" name=\"replyBtn\" value=\"Send Reply\"  class=\"btn btn-primary rounded-0 setMidHorizontal\">
                        <br>

                        <br>
                    </div>

                </form>
                </div>
                </div>";


?>