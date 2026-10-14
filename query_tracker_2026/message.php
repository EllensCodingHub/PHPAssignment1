
<?php 
  
  require './PHPMailer/PHPMailerAutoload.php';

  // send email function
  function send_mail($to_address, $to_name, $from_address, $from_name,
                      $subject, $body, $is_body_html = false) {
      
      // validate to/from address
      if(!valid_email($to_address)) {
        throw new Exception('this To Address is invalid: ' . htmlspecialchars($to_address));
      }
      if(!valid_email($from_address)) {
        throw new Exception('this From Address is invalid: ' . htmlspecialchars($from_address));
      }

      $mail = new PHPMailer();

      // ********* the following must be changed to match your SMTP server and your account information
      $mail->isSMTP();
      $mail->Host = 'smtp.somehost.com'; // provides server
      $mail->SMTPSecure = 'tls'; // valid values provided by host
      $mail->Port = 587; // supplied by host, 587 is just an example/placeholder
      $mail->SMTPAuth = true;
      $mail->Username = 'YOUR_USERNAME@somehost.com';
      $mail->Password = 'YOUR_APP_PASSWORD';

      // The above are ALL EXAMPLES. TRUE requirements would be supplied by host.

      // set From Address, To Address, subject, and body
      $mail->setFrom($from_address, $from_name);
      $mail->addAddress($to_address, $to_name);

      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AltBody = strip_tags($body);

      if ($is_body_html) {
        $mail->isHTML(true);
      }
      if (!$mail->send()) {
        // throw new Exception('Error sending email: ' . htmlspecialchars($mail->ErrorInfo));
      }

    }

  // function to validate email address conforms to proper format
  function valid_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
      return false;
    }
    else {
      return true;
    }
  }
?>