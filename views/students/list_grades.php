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
?><br>
<label>Escribe la calificación que quieres cambiar en <b>Calificación</b> y pulsa cambiar.</label><br>
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
            <th scope="col">Cambiar</th>
        </tr>
    </thead>
    <tbody><?php
        $i = 0;
        foreach ($data as $key => $value) { 
            $i++; ?>
            <tr>
                <th scope="row"><?php echo $value['iCodigoAlumno'] ?></th>
                <td><?php echo $value['vchNombres'] ?></td>
                <td><?php echo $value['vchApellidos'] ?></td>
                <td><?php echo $value['dtFechaNac'] ?></td>
                <th scope="row"><?php echo $value['vchCodigoMateria'] ?></th>
                <td><?php echo $value['vchMateria'] ?></td>
                <td>
                    <input 
                        id="grade_<?php echo $i ?>"
                        type="number" 
                        class="form-control"
                        value="<?php echo $value['fCalificacion'] ?>">    
               </td>
                <td>
                    <button 
                        onclick="students.save_grade({
                            input: 'grade_<?php echo $i ?>',
                            grade: $('#grade_<?php echo $i ?>').val(),
                            student_id: <?php echo $value['iCodigoAlumno'] ?>,
                            subject_id: '<?php echo $value['vchCodigoMateria'] ?>'
                        })"
                        class="btn btn-primary">
                        <i class="fa fa-check"></i> Cambiar
                    </button>
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>