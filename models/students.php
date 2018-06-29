<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class studentsModel extends Connection {

///////////////// ******** ---- 		save					------ ************ //////////////////
//////// Save the student data on the DB
	// The parameters that can receive are:
		// name -> Student name
		// last_name -> Student last name
		// date -> Student birthday
	
	function save($objet) {
		$sql = "INSERT INTO cat_alumno(vchNombres, vchApellidos, dtFechaNac)
				VALUES	('".$objet['name']."', '".$objet['last_name']."', '".$objet['date']."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 			END save			------ ************ //////////////////

///////////////// ******** ---- 		list_students			------ ************ //////////////////
//////// Check the students on the DB and return into array
	// The parameters that can receive are:
		// text -> Text to search
	
	function list_students($objet) {
	// Filter by text exists
		$condition = (!empty($objet['text'])) ? 
					' AND (iCodigoAlumno LIKE \'%'.$objet['text'].'%\'
							OR vchNombres LIKE \'%'.$objet['text'].'%\'
							OR vchApellidos LIKE \'%'.$objet['text'].'%\'
							OR dtFechaNac LIKE \'%'.$objet['text'].'%\')'  : '';

		$sql = "SELECT
					*
				FROM
					cat_alumno 
				WHERE
					1 = 1 ".
				$condition;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 		END list_students		------ ************ //////////////////

///////////////// ******** ---- 		list_subjects			------ ************ //////////////////
//////// Check the subjects on the DB and return into array
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
		
///////////////// ******** ---- 		save_inscription		------ ************ //////////////////
//////// Save the inscription data on the DB
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
	
	function save_inscription($objet) {
		$sql = "INSERT IGNORE INTO cat_rel_alumno_materia(iCodigoAlumno, vchCodigoMateria, fCalificacion)
				VALUES	('".$objet['student_id']."', '".$objet['subject_id']."', 0)";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 		END save_inscription	------ ************ //////////////////

///////////////// ******** ---- 		list_student_subjects	------ ************ //////////////////
//////// Check relation between the student and the subjects on the DB and return into array
	// The parameters that can receive are:
		// student_id -> Student ID

	function list_student_subjects($objet) {
		$condition = (!empty($objet['student_id'])) ? ' AND r.iCodigoAlumno = '.$objet['student_id'] : '';
		$condition .= (!empty($objet['subject_id'])) ? 
						' AND m.vchCodigoMateria = \''.$objet['subject_id'].'\'' : '';

		$sql = "SELECT 
					r.iCodigoAlumno, a.vchNombres, a.vchApellidos, a.dtFechaNac,
					r.vchCodigoMateria, m.vchMateria, r.fCalificacion
				FROM
					cat_rel_alumno_materia r 
				LEFT JOIN
						cat_materia m 
					ON
						m.vchCodigoMateria = r.vchCodigoMateria 
				LEFT JOIN
						cat_alumno a 
					ON
						a.iCodigoAlumno = r.iCodigoAlumno 
				WHERE
					1 = 1 ".
				$condition;
		$result = $this -> query_array($sql);
		
		return $result;
	}
		
///////////////// ******** ---- 	END list_student_subjects	------ ************ //////////////////
	
///////////////// ******** ---- 		save_grade				------ ************ //////////////////
//////// Update the grade data on the DB
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
		// grade -> Grade obtainer
	
	function save_grade($objet) {
		$sql = "UPDATE
					cat_rel_alumno_materia
				SET
					fCalificacion = '".$objet['grade']."' 
				WHERE
					iCodigoAlumno = '".$objet['student_id']."'
				AND
					vchCodigoMateria =  '".$objet['subject_id']."'";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 		END save_grade			------ ************ //////////////////
	
///////////////// ******** ---- 		delete_relation			------ ************ //////////////////
//////// Delete subject from student on the DB
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
	
	function delete_relation($objet) {
		$sql = "DELETE FROM 
					cat_rel_alumno_materia
				WHERE
					iCodigoAlumno = '".$objet['student_id']."'
				AND
					vchCodigoMateria =  '".$objet['subject_id']."'";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 		END delete_relation		------ ************ //////////////////
	
}
?>
