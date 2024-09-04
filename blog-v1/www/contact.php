<?php

include dirname(__DIR__).'/src/init.php';




// formulaire de contact

$page_title = 'Contactez-nous';
$page_content = '<section class="row"><div class="col-lg-6 offset-lg-3">'; 
// Page qui permettra de valider le formulaire
$page_content = <<<FORMULAIRE
<form action="<?php dirname(__DIR__) .'/srce/validation-contact.php'?>" method="post">

    
    <input type="text" name="nom" placeholder="Votre nom" required class="form-control">

    
    <input type="text" name="prénom" placeholder="Votre prénom" required class="form-control">

    
    <input type="email" name="email" placeholder="Votre email" required class="form-control">

   
    <input type="tel" name="téléphone" placeholder="Votre téléphone" required class="form-control">

   
    <textarea name="message" placeholder="Votre message" required class="form-control"></textarea>
    
    <input type="submit" value="Envoyer" class="form-control">

</form>
FORMULAIRE;


include dirname(__DIR__).'/src/layout.php';
