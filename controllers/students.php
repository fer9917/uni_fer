<?php

require ('controllers/common.php');

// Load Query functions
require ("models/students.php");

class students extends Common {
	public $studentsModel;

	function __construct() {
		$this -> studentsModel = new studentsModel();
	}

///////////////// ******** ---- 			add					------ ************ //////////////////
//////// Load the view to add new student
	// The parameters that can receive are:
	
	function add() {
		require ('views/students/add.html');
	}
	
///////////////// ******** ---- 		END add					------ ************ //////////////////

///////////////// ******** ---- 		save					------ ************ //////////////////
//////// Call the function to save the data on the DB
	// The parameters that can receive are:
		// name -> Student name
		// last_name -> Student last name
		// date -> Student birthday
	
	function save($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$result = $this -> studentsModel -> save($objet);
		
		echo json_encode($result);
	}
	
///////////////// ******** ---- 		END agregar_nombre		------ ************ //////////////////

///////////////// ******** ---- 		view_students			------ ************ //////////////////
//////// Load the view to search a student
	// The parameters that can receive are:
	
	function view_students() {
		require ('views/students/view_students.html');
	}
	
///////////////// ******** ---- 		END view_students		------ ************ //////////////////

///////////////// ******** ---- 		list_students			------ ************ //////////////////
//////// Check the students and load a view
	// The parameters that can receive are:
		// id -> Student ID

	function list_students($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$students = $this -> studentsModel -> list_students($objet);
		$students = $students['rows'];
		
		require ('views/students/list_students.php');
	}
	
///////////////// ******** ---- 		END list_students		------ ************ //////////////////
	
///////////////// ******** ---- 		inscription				------ ************ //////////////////
//////// Load the view to enroll student
	// The parameters that can receive are:
		// div -> Div where the content are loaded

	function inscription($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
	
	// Check students
		$students = $this -> studentsModel -> list_students($objet);
		$students = $students['rows'];

	// Check subjects
		$subjects = $this -> studentsModel -> list_subjects($objet);
		$subjects = $subjects['rows'];
		
		require ('views/students/inscription.php');
	}
	
///////////////// ******** ---- 		END inscription			------ ************ //////////////////
	
///////////////// ******** ---- 		save_inscription		------ ************ //////////////////
//////// Call the function to save the inscription info
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID

	function save_inscription($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$result = $this -> studentsModel -> save_inscription($objet);
		
		echo json_encode($result);
	}
	
///////////////// ******** ---- 		END save_inscription	------ ************ //////////////////
	
///////////////// ******** ---- 		list_student_subjects	------ ************ //////////////////
//////// Load a view of the relation between the students and subjects
	// The parameters that can receive are:

	function student_subjects($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
	
	// Check students
		$students = $this -> studentsModel -> list_students($objet);
		$students = $students['rows'];
		
		require ('views/students/student_subjects.php');
	}
	
///////////////// ******** ---- 		END inscription			------ ************ //////////////////
	
///////////////// ******** ---- 	list_student_subjects		------ ************ //////////////////
//////// Load the view of subjects of the student
	// The parameters that can receive are:
		// student_id -> Student ID

	function list_student_subjects($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;

	// Check subjects
		$data = $this -> studentsModel -> list_student_subjects($objet);
		$data = $data['rows'];
		
		require ('views/students/list_student_subjects.php');
	}
	
///////////////// ******** ---- 	END list_student_subjects	------ ************ //////////////////
	
///////////////// ******** ---- 		grades					------ ************ //////////////////
//////// Load a view of the grades of the students
	// The parameters that can receive are:

	function grades($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;

	// Check students
		$students = $this -> studentsModel -> list_students($objet);
		$students = $students['rows'];

	// Check subjects
		$subjects = $this -> studentsModel -> list_subjects($objet);
		$subjects = $subjects['rows'];
		
		require ('views/students/grades.php');
	}
	
///////////////// ******** ---- 		END grades				------ ************ //////////////////
	
///////////////// ******** ---- 		list_grades				------ ************ //////////////////
//////// Check the grades of the student and load a view
	// The parameters that can receive are:
		// div -> Div where the content are loaded

	function list_grades($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;

	// Check grades
		$data = $this -> studentsModel -> list_student_subjects($objet);
		$data = $data['rows'];
		
		require ('views/students/list_grades.php');
	}
	
///////////////// ******** ---- 	END list_grades				------ ************ //////////////////
	
///////////////// ******** ---- 		save_grade				------ ************ //////////////////
//////// Call the function to update the grade info
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
		// grade -> Grade obtainer

	function save_grade($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;

	// Update grade info
		$result= $this -> studentsModel -> save_grade($objet);
		
		echo json_encode($result);
	}
	
///////////////// ******** ---- 	END list_grades				------ ************ //////////////////
	
///////////////// ******** ---- 		delete_relation			------ ************ //////////////////
//////// Call the function to delete subject from student
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID

	function delete_relation($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;

	// Delete subject from student
		$result= $this -> studentsModel -> delete_relation($objet);
		
		echo json_encode($result);
	}
	
///////////////// ******** ---- 	END delete_relation			------ ************ //////////////////
		
}
?>
