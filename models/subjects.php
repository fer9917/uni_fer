<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class subjectsModel extends Connection {

///////////////// ******** ---- 		save					------ ************ //////////////////
//////// Save the data on the DB and return the result
	// The parameters that can receive are:
		// name -> Subject name
	
	function save($objet) {
	// Random code for subject
		$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

		$sql = "INSERT INTO cat_materia(vchCodigoMateria, vchMateria)
				VALUES	('".$code."', '".$objet['name']."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 			END save			------ ************ //////////////////

///////////////// ******** ---- 		list_subjects			------ ************ //////////////////
//////// Check the on the DB and return into array
	// The parameters that can receive are:
		// text -> Text to search
	
	function list_subjects($objet) {
	// Filter by text exists
		$condition = (!empty($objet['text'])) ? 
					' AND (vchCodigoMateria LIKE \'%'.$objet['text'].'%\'
							OR vchMateria LIKE \'%'.$objet['text'].'%\')'  : '';

		$sql = "SELECT 
					*
				FROM
					cat_materia 
				WHERE
					1 = 1 ".
				$condition;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 		END list_subjects		------ ************ //////////////////

}
?>
