<?php $name = $_POST['patronyme'];
$email = $_POST['courriel'];
$message = $_POST['message'];
$formcontent="De: $name \n Message: $message";
$recipient = "&#115;&#116;&#105;&#108;&#107;&#114;&#43;&#103;&#105;&#116;&#104;&#117;&#98;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;";
$subject = "Formulaire Github";
$mailheader = "De: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Oups! Quelque chose cloche !");
echo "Je reviens vers vous dès que possible!";
?>