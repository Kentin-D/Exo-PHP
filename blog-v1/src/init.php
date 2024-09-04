<?php

// affichage des erreurs

ini_set('display_errors',1);
ini_set('log_errors',1);
error_reporting(E_ALL);








// ICI il y avait les 4 articles. Supprimés car ils ont été mis dans le fichier 'articles.json







// Chargement du contenu avec JSON

// 1 - Définir le chemin. => Stocker le chemin dans la variable $json_file_path
$json_file_path = dirname(__DIR__).'/src/articles.json';


// 2 - On vérifie que le fichier existe bien à cet emplacement (DEBUG)
//var_dump(file_exists($json_file_path));
//exit();

// 3 - On vérifie que le fichier existe
if(file_exists($json_file_path) === false){
	
	//on lance une exception
	throw new Exception('Fichier Introuvable');
}


// 4- On récupère le contenu du fichier json
$json_file_content = file_get_contents($json_file_path);

//var_dump($json_file_content);

// 5 - Transformer le contenu sous forme de tableau (décoder une chaîne json = json_decode)
$json_data = json_decode($json_file_content,true);

// 6 - On vérifie si les données json récupérées sont valides
if(json_last_error() !==JSON_ERROR_NONE){
	
	throw new Exception('Erreur JSON: "%s',json_last_error_msg());
	
}

// 7 - On extrait la variable articles
$articles = $json_data['articles'];

var_dump($articles);



















