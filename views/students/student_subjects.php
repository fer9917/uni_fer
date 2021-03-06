<br>
<div class="row">
    <div class="col-xs-12">
        <h3>Buscar materias inscritas</h3>
    </div>
</div><br>
<div class="row">
    <div class="col-xs-12">
        <div class="input-group"><?php
            if (empty($students)) { ?>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No se encontraron alumnos</h5>
                    </div>
                </div><?php
            } ?>
            <select id="student_id" class="custom-select" data-live-search="true" tabindex="-98">
                <option value="">- Todos</option><?php
                foreach ($students as $key => $value) { ?>
                    <option value="<?php echo $value['iCodigoAlumno'] ?>">
                        <?php echo $value['iCodigoAlumno'].' - '.$value['vchNombres'] ?>
                    </option><?php
                } ?>
            </select>
            <div class="input-group-append">
                <button 
                    class="btn btn-outline-primary" 
                    onclick="students.list_student_subjects({
                        student_id: $('#student_id').val(),
                        div: 'div_students_subjects'
                    })">
                    <i class="fa fa-search"></i> Buscar
                </button>
            </div>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-xs-12" id="div_students_subjects">

    </div>
</div>