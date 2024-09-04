<?php


include dirname(__DIR__).'/src/init.php';


// boucle pour l'affichage du contenu du tableau

$page_title = 'Blog V1';

$page_content = '<section class="row">';

foreach($articles as $index=> $item){

    $page_content .= '<article class="col-lg-3"><h1>
	
		<a href="article.php?id='.'$index.">'
		
		.$item['Title'].'</a></h1><p>'.$item['content'].'</p></article>';
}

$page_content .='</section>';

include dirname(__DIR__).'/src/layout.php';




