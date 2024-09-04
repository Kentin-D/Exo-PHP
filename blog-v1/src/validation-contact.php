<?php

// 1 - Configurer les messages en créant des variables

$message_erreur = 'Erreur les champs suivants doivent être complétés';
$message_ok = 'Votre message a bien été envoyé';
$message = $message_erreur;



// 2 - Définir les constantes pour l'envoi d'emails

define ('MAIL_EXPEDITEUR', 'quentin-duchatel@hotmail.fr');
define ('MAIL_SUJET', 'Contact blog V1');



// 3 - Vérifier les champs de formulaire

// Initialiser les variables pour éviter les warnings
$nom = $prénom = $email = $telephone = $message = '';

if(empty($_POST['nom'])){
    $message .= 'Le champ nom est vide <br/>';
}

if(empty($_POST['prénom'])){
    $message .= 'Le champ prénom est vide <br/>';
}

if(empty($_POST['email'])){
    $message .= 'Le champ email est vide <br/>';
}

if(empty($_POST['téléphone'])){
    $message .= 'Le champ téléphone est vide <br/>';
}

if(empty($_POST['message'])){
    $message .= 'Le champ message est vide <br/>';
}



// 4 - Vérifier que les champs soient bien remplis
// Si le message final est + long que le message d'erreur de départ = erreur => affichage de l'erreur
// On enverra le mail que si tous les champs sont remplis

// strlen() => string lengh => défini le nombre de caractère dans une chaîne

if(strlen($message)> strlen($message_erreur)){

    // On affiche le message d'erreur
    echo $message;
}



// Sinon on crée une variable pour récupérer le contenu des champs
// en enlevant les espaces et les caractères d'échappement = trim() / stripslashes()


else{
    foreach ($_POST as $index => $valeur){

       // $$index = $valeur (enlever espaces et les caractères d'échappement)
       $$index= stripslashes(trim($valeur));
    }
}


// 5 - Préparation de l'entête du mail

$mail_entete= "MIME-Version : 1.0\r\n";
$mail_entete.= "From: {$_POST['nom']}"."<{$_POST['email']}>\r\n";
$mail_entete.= 'Reply-To:'.$_POST['email']."\r\n";
$mail_entete.= 'Content-Type: text/plain;charset="UTF-8"';
$mail_entete.= "\r\nContent-Transfer-Encoding:8bit\r\n";
$mail_entete.= 'X-Mailer:PHP/'. phpversion() ."\r\n";


// 6 - Préparation du corps du mail

$mail_corps="Message de : $nom - $prénom \r\n";
$mail_corps.="Email : $email \r\n";
$mail_corps.="Téléphone : $telephone \r\n";
$mail_corps.="Message : $message \r\n";


// 7 - Envoi du mail

if (mail(MAIL_EXPEDITEUR,MAIL_SUJET, $mail_corps, $mail_entete)){

    // Si les infos si dessus sont bonnes et présentes alors le mail est envoyé et message ok

    echo '<script type="text/javascript">
    alert("Votre email a bien été envoyé");
    window.location="../www/index.php";
    </script>';
}

    // Si le mail n'a pas été envoyé

    else{
     echo 'erreur';
}