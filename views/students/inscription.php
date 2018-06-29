<br>
<h3>Inscripción a materia</h3><br>
<div class="row">
    <div class="col-xs-12 col-md-6"><?php
        if (empty($students)) { ?>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No se encontraron alumnos</h5>
                </div>
            </div><?php
        } ?>
        <select id="student_id" class="custom-select" data-live-search="true" tabindex="-98"><?php
            foreach ($students as $key => $value) { ?>
                <option value="<?php echo $value['iCodigoAlumno'] ?>">
                    <?php echo $value['iCodigoAlumno'].' - '.$value['vchNombres'] ?>
                </option><?php
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-6"><?php
        if (empty($subjects)) { ?>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No se encontraron materias</h5>
                </div>
            </div><?php
        } ?>
        <select id="subject_id" class="custom-select" data-live-search="true" tabindex="-98"><?php
            foreach ($subjects as $key => $value) { ?>
                <option value="<?php echo $value['vchCodigoMateria'] ?>">
                    <?php echo $value['vchCodigoMateria'].' - '.$value['vchMateria'] ?>
                </option><?php
            } ?>
        </select>
    </div>
</div><br>
<button 
    class="btn btn-primary"
    onclick="students.save_inscription({
        student_id: $('#student_id').val(),
        subject_id: $('#subject_id').val()
    })">
    <i class="fa fa-check"></i> Guardar
</button>