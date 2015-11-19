<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $phone = $_POST['phone'];


    $email_from = 'andrew.gaidis@gmail.com';
    $email_subject = "New Rent Estimator";
    $email_body = "A new visitor, $name.\n".
                  "Email: $email.\n".
                  "Phone #: $phone.\n".;

    $to = "andrew.gaidis@gmail.com";
    $headers = "From: $email_from \r\n";
    $headers = "Reply-To: $visitor_email \r\n";
    mail($to,$email_subject,$email_body,$headers);
}
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
                
    $inject = join('|', $injections);
    $inject = "/$inject/i";
     
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
 
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>