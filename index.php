<?php
	require_once 'class.json.php';

	//=======================| EXEMPLE 1 |==================
	//	Convertir un array en json et écriture du résultat dans un fichier
	$arr = array(	0 => array(	'processeur'=>'i7 4.7Ghz',
								'ram'=>'16 Go DDR4',
								'gpu'=>'GTX 1080 Ti 6Go',
								'hdd'=>'2 To'),
					1 => array(	'processeur'=>'i5 2.7Ghz',
								'ram'=>'4 Go DDR4',
								'gpu'=>'GTX 760 3Go',
								'hdd'=>'500 Go')

				);
	$json1 = new ManipulationJSON($arr);
	$json1->setWorkingFile('gen/ordinateur.txt');
	$json1->toJSON();
	$b = $json1->writeInFile();
	var_dump('Ecriture du fichier: '.$b);


	//=======================| EXEMPLE 2 |==================
	//	Lire un fichier qui contient du JSON, le convertir en ARRAY, puis afficher le résultat
	$json2 = new ManipulationJSON();
	$json2->setWorkingFile('gen/voiture.txt');
	$json2->readFile();
	$json2->toArray();
	$r = $json2->getResult();
	var_dump($r);
	

