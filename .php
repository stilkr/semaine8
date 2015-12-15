<?php
$s = "";
function verifieEmail($mail) 
{
	if (preg_match('/^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]/i',$mail)) return false;
	list ($nom,$domaine) = explode ('@',$mail);
	if (getmxrr($domaine,$mxhosts)) return true;
	else return false;
} 
if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['message']))
{
    $destinataire = "&#115;&#116;&#105;&#108;&#107;&#114;&#43;&#103;&#105;&#116;&#104;&#117;&#98;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;";
    $sujet = "Infos Github";
    $message = "Nom : ".$_POST['patronyme']."\r\n";
    $message .= "Adresse email : ".$_POST['courriel']."\r\n";
    $message .= "Message : ".$_POST['message']."\r\n";
    $from = $_POST['courriel'];
    if (verifieEmail($from))
    {
        $entete = 'De: '.$from;
        if (mail($destinataire,$message))
        {
            header('Location: confirmation.html'); // Redirection vers la page de confirmation
        }
        else
        {
            $s = "Une erreur s'est produite. Votre demande n'a pas été envoyée.";
        }
    }
    else
    {
        $s = "Votre email est invalide. Votre demande n'a pas été envoyée.";
    }
}
else
{
    $s = "Vous n'avez pas rempli tous les champs. Votre demande n'a pas été envoyée.";
}
if ($s) echo $s;

?>