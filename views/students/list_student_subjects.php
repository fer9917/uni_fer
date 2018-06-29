<?php
    if (empty($data)) { ?>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">No se encontró información</h5>
            </div>
        </div><?php
        
        return;
    }
?>
<h3>Materias inscritas</h3><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">C. Alumno</th>
            <th scope="col">Alumno</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Fecha nacimiento</th>
            <th scope="col">C. Materia</th>
            <th scope="col">Materia</th>
            <th scope="col">Calificación</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody><?php
        foreach ($data as $key => $value) { ?>
            <tr>
                <th scope="row"><?php echo $value['iCodigoAlumno'] ?></th>
                <td><?php echo $value['vchNombres'] ?></td>
                <td><?php echo $value['vchApellidos'] ?></td>
                <td><?php echo $value['dtFechaNac'] ?></td>
                <th scope="row"><?php echo $value['vchCodigoMateria'] ?></th>
                <td><?php echo $value['vchMateria'] ?></td>
                <td><?php echo $value['fCalificacion'] ?></td>
                <td>
                    <button 
                        onclick="students.delete_relation({
                            div: '<?php echo $objet['div'] ?>',
                            student_id: <?php echo $value['iCodigoAlumno'] ?>,
                            subject_id: '<?php echo $value['vchCodigoMateria'] ?>'
                        })"
                        class="btn btn-danger">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>