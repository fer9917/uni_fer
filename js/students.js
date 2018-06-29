/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal, instancies, funciones, console, Morris, utilidades, JsBarcode, isValid, toSingle, toastr, offline_data, sucursales, swal */
/*jslint browser: true*/
var students = {
	
///////////////// ******** ---- 			add					------ ************ //////////////////
//////// Load the view to add new student
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		
	add : function(objet) {
		"use strict";
		console.log('==========> objet add', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=add',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done add');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail add', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar la vista',
				type: 'error'
			})
		});
	},

///////////////// ******** ---- 		END add					------ ************ //////////////////

///////////////// ******** ---- 		save					------ ************ //////////////////
//////// Build data array from form and send to controller
	// The parameters that can receive are:
		// form -> Form with the student data
		
	save : function(objet) {
		"use strict";
		console.log('==========> objet save', objet);
		
		var data = {};

	// Build data array
		$("#"+objet.form).find(':input').each(function(key, value){
			if(this.id){
				data[this.id] = $(this).val();
			}
		});

		$.ajax({
			data : data,
			url : 'ajax.php?c=students&f=save',
			type : 'post',
			dataType : 'json',
		}).done(function(resp) {
			console.log('==========> done save', resp);
			
			swal({
				title: 'Guardado!',
				text: 'Los datos han sido guardados con éxito',
				type: 'success'
			});

			students.view_students({div: 'contenedor'});
		}).fail(function(resp) {
			console.log('==========> fail save', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al guardar los datos',
				type: 'error'
			})
		});
	},

///////////////// ******** ---- 		END save				------ ************ //////////////////
	
///////////////// ******** ---- 		view_students			------ ************ //////////////////
//////// Load the view to search a student
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		
	view_students : function(objet) {
		"use strict";
		console.log('==========> objet view_students', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=view_students',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done view_students');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail view_students', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar la vista',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END view_students			------ ************ //////////////////
	
///////////////// ******** ---- 		list_students			------ ************ //////////////////
//////// List students on a view
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		// text -> Test to search
	
	list_students : function(objet) {
		"use strict";
		console.log('==========> objet list_students', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=list_students',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done list_students');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail list_students', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al buscar el alumno',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END list_students			------ ************ //////////////////
		
///////////////// ******** ---- 		inscription				------ ************ //////////////////
//////// Load the view to enroll student
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		
	inscription : function(objet) {
		"use strict";
		console.log('==========> objet inscription', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=inscription',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done inscription');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail inscription', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar la vista',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END inscription				------ ************ //////////////////
	
///////////////// ******** ---- 	save_inscription			------ ************ //////////////////
//////// Call the function to save the inscription info
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
		
	save_inscription : function(objet) {
		"use strict";
		console.log('==========> objet save_inscription', objet);
	
	// Validations
		if (!objet.student_id) {
			swal({
				title: 'Error!',
				text: 'Debes seleccionar un alumno',
				type: 'error'
			});

			return;
		}
		if (!objet.subject_id) {
			swal({
				title: 'Error!',
				text: 'Debes seleccionar una materia',
				type: 'error'
			});

			return;
		}

		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=save_inscription',
			type : 'post',
			dataType : 'json',
		}).done(function(resp) {
			console.log('==========> done save_inscription');
			
			swal({
				title: 'Guardado!',
				text: 'Los datos han sido guardados con éxito',
				type: 'success'
			});

			students.view_students({div: 'contenedor'});
		}).fail(function(resp) {
			console.log('==========> fail save_inscription', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar la vista',
				type: 'error'
			})
		});
	},

///////////////// ******** ---- 	END save_inscription		------ ************ //////////////////

///////////////// ******** ---- 	list_student_subjects		------ ************ //////////////////
//////// Load a view of the relation between the students and subjects
	// The parameters that can receive are:
		// div -> Div where the content are loaded
	
	student_subjects : function(objet) {
		"use strict";
		console.log('==========> objet student_subjects', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=student_subjects',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done student_subjects');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail student_subjects', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al buscar las materias',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END student_subjects		------ ************ //////////////////
		
///////////////// ******** ---- 	list_student_subjects		------ ************ //////////////////
//////// List students on a view
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		// student_id -> Student ID
	
	list_student_subjects : function(objet) {
		"use strict";
		console.log('==========> objet list_student_subjects', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=list_student_subjects',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done list_student_subjects');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail list_student_subjects', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al buscar las materias',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END list_student_subjects 	------ ************ //////////////////
	
///////////////// ******** ---- 		grades					------ ************ //////////////////
//////// Load a view of the grades of the students
	// The parameters that can receive are:
		// div -> Div where the content are loaded
	
	grades : function(objet) {
		"use strict";
		console.log('==========> objet grades', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=grades',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done grades');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail grades', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar las calificaciones',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 		END grades	 			------ ************ //////////////////
	
///////////////// ******** ---- 		list_grades				------ ************ //////////////////
//////// Check the grades of the student and load a view
	// The parameters that can receive are:
		// div -> Div where the content are loaded
	
	list_grades : function(objet) {
		"use strict";
		console.log('==========> objet list_grades', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=list_grades',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done list_grades');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail list_grades', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar las calificaciones',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 		END list_grades			------ ************ //////////////////
	
///////////////// ******** ---- 		save_grade				------ ************ //////////////////
//////// Call the function to update the grade info
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
		// grade -> Grade obtainer
		
	save_grade : function(objet) {
		"use strict";
		console.log('==========> objet save_inscription', objet);

	// Validations
		if (objet.grade <= 0) {
			swal({
				title: 'Error!',
				text: 'Cantidad no valida',
				type: 'error'
			});
			
			$('#'+objet.input).focus();

			return;
		}

		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=save_grade',
			type : 'post',
			dataType : 'json',
		}).done(function(resp) {
			console.log('==========> done save_grade', resp);
			
			swal({
				title: 'Guardado!',
				text: 'La calificación ha sido guardada con éxito',
				type: 'success'
			});
		}).fail(function(resp) {
			console.log('==========> fail save_grade', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al guardar la calificación',
				type: 'error'
			})
		});
	},

///////////////// ******** ---- 		END save_grade			------ ************ //////////////////
	
///////////////// ******** ---- 		delete_relation			------ ************ //////////////////
//////// Call the function to delete subject from student
	// The parameters that can receive are:
		// student_id -> Student ID
		// subject_id -> Subject ID
		// div -> Div where the content is loaded
		
	delete_relation : function(objet) {
		"use strict";
		console.log('==========> objet delete_relation', objet);

		$.ajax({
			data : objet,
			url : 'ajax.php?c=students&f=delete_relation',
			type : 'post',
			dataType : 'json',
		}).done(function(resp) {
			console.log('==========> done save_grade', resp);
			
			swal({
				title: 'Eliminada!',
				text: 'La materia ha sido eliminada con éxito',
				type: 'success'
			});

			students.list_student_subjects({
				student_id: objet.student_id,
				div: objet.div
			});
		}).fail(function(resp) {
			console.log('==========> fail save_grade', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al guardar la calificación',
				type: 'error'
			})
		});
	},

///////////////// ******** ---- 		END save_grade			------ ************ //////////////////
	
};
