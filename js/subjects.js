/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal, instancies, funciones, console, Morris, utilidades, JsBarcode, isValid, toSingle, toastr, offline_data, sucursales, swal */
/*jslint browser: true*/
var subjects = {
	
///////////////// ******** ---- 			add					------ ************ //////////////////
//////// Load the view to add new subject
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		
	add : function(objet) {
		"use strict";
		console.log('==========> objet add', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=subjects&f=add',
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
		// form -> Form with the subject data
		
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
			url : 'ajax.php?c=subjects&f=save',
			type : 'post',
			dataType : 'json',
		}).done(function(resp) {
			console.log('==========> done save', resp);
			
			swal({
				title: 'Guardado!',
				text: 'Los datos han sido guardados con éxito',
				type: 'success'
			});

			subjects.view_subjects({div: 'contenedor'});
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
	
///////////////// ******** ---- 		view_subjects			------ ************ //////////////////
//////// Load the view to search a student
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		
	view_subjects : function(objet) {
		"use strict";
		console.log('==========> objet view_subjects', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=subjects&f=view_subjects',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done view_subjects');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail view_subjects', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al cargar la vista',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END view_subjects1		------ ************ //////////////////
	
///////////////// ******** ---- 		list_subjects			------ ************ //////////////////
//////// List subjects on a view
	// The parameters that can receive are:
		// div -> Div where the content are loaded
		// text -> Text to search
	
	list_subjects : function(objet) {
		"use strict";
		console.log('==========> objet list_subjects', objet);
		
		$.ajax({
			data : objet,
			url : 'ajax.php?c=subjects&f=list_subjects',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done list_subjects');
			
			$("#"+objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail list_subjects', resp);

			swal({
				title: 'Error!',
				text: 'Algo salio mal al buscar el alumno',
				type: 'error'
			})
		});
	},
	
///////////////// ******** ---- 	END list_subjects		------ ************ //////////////////
		
};
