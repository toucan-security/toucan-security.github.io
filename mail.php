<?php
  if(isset( $_POST['formName']))
  $name = $_POST['fromName'];
  if(isset( $_POST['formEmail']))
  $email = $_POST['formEmail'];
  if(isset( $_POST['formMessage']))
  $message = $_POST['formMessage'];
  $subject = "contact form";

  if ($name === '') {
    echo "Name cannot be empty.";
    die();
  }
  if ($email === '') {
    echo "Email cannot be empty.";
    die();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email format invalid.";
      die();
    }
  }
  if ($subject === '') {
    echo "Subject cannot be empty.";
    die();
  }
  if ($message === '') {
    echo "Message cannot be empty.";
    die();
  }

  $content="From: $name \n Email: $email \n Message: $message";
  $recipient = "toucansec@gmail.com";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $content, $mailheader) or die("Error!");
  echo "Email sent!";
?>