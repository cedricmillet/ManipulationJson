<?php

	/**
	 * 	Petite classe pour la manipulation JSON en PHP
	 */
	class ManipulationJSON
	{
		//	$data -> Array ou String(JSON)
		function __construct($data='')
		{
			$this->data = $data;
			$this->file = null;
		}

		//	Conversion JSON => Array
		function toArray() {
			if(is_array($this->data)) return "ERREUR - Conversion impossible - fichier:".__FILE__." - ligne:".__LINE__;
			$this->data = json_decode($this->data, true);
		}

		//	Conversion Array => JSON
		function toJSON() {
			if(!is_array($this->data)) return "ERREUR - Conversion impossible - fichier:".__FILE." - ligne:".__LINE__;
			$this->data = json_encode($this->data);
		}

		//	Définition du fichier de travail
		function setWorkingFile($f) {
			$this->file = $f;
		}

		//	Retourne le contenu du fichier de travail
		function readFile() {
			if(!isset($this->file)) {
				echo 'Aucun fichier de travail définit ! Fichier:'.__FILE__.' - ligne:'.__LINE__;
				return false;
			}
			if(!file_exists($this->file))
				return "Fichier inexistant ({$f}) ! ";
			$this->data = file_get_contents($this->file);
		}

		//	Ecrire le dernier jeu de résultat dans un fichier
		function writeInFile() {
			$b = file_put_contents($this->file, $this->data);
			if(!$b)
				return false;
			return true;
		}

		//	Retourne le dernier jeu de résultat après converion (JSON ou ARRAY ou STR)
		function getResult() {
			return $this->data;
		}
	}