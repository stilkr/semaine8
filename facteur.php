<?php
$errors = [];

    if (!array_key_exists('patronyme', $_POST) || $_POST ['patronyme'] == '') {
	$errors['patronyme']="Merci d'entrer vos nom et prénom.";
	}
	
	if (!array_key_exists('courriel', $_POST) || $_POST ['courriel'] == '' || !filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL)) {
	$errors['courriel']="Vous n'avez pas saisi d'adresse e-mail valide.";
	}
	
	    if (!array_key_exists('message', $_POST) || $_POST ['message'] == " ") {
	$errors['message']="Merci de laisser un message.";
	}
	
	session_start();
	
	if (!empty($errors)){
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
	header ('Location: CV_ABB_s8.php');
	}
	
	else {
	$_SESSION['success']=1;
	
$to = 'stilkr+github@gmail.com'; 
$subject = 'Message du Cv Github';
$message = $_POST['patronyme']  . $_POST['courriel'] . $_POST['message'];	
mail($to, $subject, $message);
header ('Location: confirmation.html');
	}
die();
?>
