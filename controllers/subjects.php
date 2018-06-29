<?php

require ('controllers/common.php');

// Load Query functions
require ("models/subjects.php");

class subjects extends Common {
	public $subjectsModel;

	function __construct() {
		$this -> subjectsModel = new subjectsModel();
	}

///////////////// ******** ---- 			add					------ ************ //////////////////
//////// Load the view to add new subject
	// The parameters that can receive are:
	
	function add() {
		require ('views/subjects/add.html');
	}
	
///////////////// ******** ---- 		END add					------ ************ //////////////////

///////////////// ******** ---- 		save					------ ************ //////////////////
//////// Call the function to save the data on the DB
	// The parameters that can receive are:
		// name -> Subject name
	
	function save($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$result = $this -> subjectsModel -> save($objet);
		
		echo json_encode($result);
	}
	
///////////////// ******** ---- 		FIN agregar_nombre			------ ************ //////////////////

///////////////// ******** ---- 		view_subjects				------ ************ //////////////////
//////// Load the view to search a subject
	// The parameters that can receive are:
	
	function view_subjects() {
		require ('views/subjects/view_subjects.html');
	}
	
///////////////// ******** ---- 		END view_subjects			------ ************ //////////////////

///////////////// ******** ---- 		list_subjects				------ ************ //////////////////
//////// Check the subjects and load a view
	// The parameters that can receive are:
		// text -> Text to search

	function list_subjects($objet) {
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$subjects = $this -> subjectsModel -> list_subjects($objet);
		$subjects = $subjects['rows'];
		
		require ('views/subjects/list_subjects.php');
	}
	
///////////////// ******** ---- 		FIN list_subjects			------ ************ //////////////////
	
}
?>
