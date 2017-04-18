<?php
  $errors = [];
  if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){
    $errors['name'] = "Vous n'avez pas entré correctement votre nom...";
  }
  if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Votre adresse email n'est pas valide.";
  }
  if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
    $errors['message'] = "Vous avez oublié d'écrire votre message...";
  }
  session_start();
  if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: formulaire.php');
  }else{
    $_SESSION['success'] = 1;
    $message = $_POST['message'];
    $headers = 'FROM: ' . $_POST['email'];
    mail('solange.picard@icloud.com', 'Un message a été envoyé par ' . $_POST['name'] .' via solangeharmoniepicard.com', $message, $headers);
    header('Location: formulaire.php');
  }
?>
