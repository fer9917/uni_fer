<?php
    if (empty($students)) { ?>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">No se encontró información</h5>
                <p class="card-text">Intenta con otra palabra.</p>
            </div>
        </div><?php
        
        return;
    }
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Fecha nacimiento</th>
            <th scope="col">Ver materias</th>
        </tr>
    </thead>
    <tbody><?php
        foreach ($students as $key => $value) { ?>
            <tr>
                <th scope="row"><?php echo $value['iCodigoAlumno'] ?></th>
                <td><?php echo $value['vchNombres'] ?></td>
                <td><?php echo $value['vchApellidos'] ?></td>
                <td><?php echo $value['dtFechaNac'] ?></td>
                <td>
                    <button
                        class="btn btn-primary btn-block"
                        onclick="students.list_student_subjects({
                            student_id: <?php echo $value['iCodigoAlumno'] ?>,
                            div: 'div_students'
                        })">
                        <i class="fa fa-list"></i>
                    </button>
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>