<html>
	<head>
	<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Bootstrap Select -->
		<link rel="stylesheet" href="plugins/Bootstrap-Select/dist/css/bootstrap-select.min.css">

	<!-- Fontawesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- Mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<nav class="navbar navbar-dark bg-primary navbar-expand-lg navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="students.add({div: 'contenedor'})">
						| Agregar alumno
					</a>
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="students.view_students({div: 'contenedor'})">
						| Buscar alumnos
					</a>
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="subjects.add({div: 'contenedor'})">
						| Agregar materia
					</a>
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="subjects.view_subjects({div: 'contenedor'})">
						| Buscar materias
					</a>
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="students.inscription({div: 'contenedor'})">
						| Inscripción a materia
					</a>
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="students.student_subjects({div: 'contenedor'})">
						| Materias inscritas
					</a>
					<a 
						class="nav-item nav-link" 
						href="#contenedor"
						onclick="students.grades({div: 'contenedor'})">
						| Calificaciones
					</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-xs-12" id="contenedor">
					<!-- In this Div the content are loaded -->
				</div>
			</div>
		</div>
	<!-- Jquery JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- Bootstrap Select -->
		<script src="plugins/Bootstrap-Select/dist/js/bootstrap-select.min.js"></script>
	<!-- Sweetalert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
		
	<!-- System JS´s -->
		<script type="text/javascript" src="js/students.js"></script>
		<script type="text/javascript" src="js/subjects.js"></script>
	</body>
</html>