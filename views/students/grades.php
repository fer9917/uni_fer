<br>
<h3>Calificaciones</h3><br>
<div class="row">
    <div class="col-xs-12 col-md-5"><?php
        if (empty($students)) { ?>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No se encontraron alumnos</h5>
                </div>
            </div><?php
        } ?>
        <label>Alumno:</label>
        <select id="student_id" class="custom-select" data-live-search="true" tabindex="-98">
            <option value="">- Todos</option><?php
            foreach ($students as $key => $value) { ?>
                <option value="<?php echo $value['iCodigoAlumno'] ?>">
                    <?php echo $value['iCodigoAlumno'].' - '.$value['vchNombres'] ?>
                </option><?php
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-5"><?php
        if (empty($subjects)) { ?>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No se encontraron materias</h5>
                </div>
            </div><?php
        } ?>
        <label>Materia:</label>
        <select id="subject_id" class="custom-select" data-live-search="true" tabindex="-98">
            <option value="">- Todas</option><?php
            foreach ($subjects as $key => $value) { ?>
                <option value="<?php echo $value['vchCodigoMateria'] ?>">
                    <?php echo $value['vchCodigoMateria'].' - '.$value['vchMateria'] ?>
                </option><?php
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-2" style="padding-top: 30px">
        <button 
            class="btn btn-outline-primary" 
            onclick="students.list_grades({
                student_id: $('#student_id').val(),
                subject_id: $('#subject_id').val(),
                div: 'div_students_subjects'
            })">
            <i class="fa fa-search"></i> Buscar
        </button>
    </div>
</div><br>
<div class="row">
    <div class="col-xs-12" id="div_students_subjects">

    </div>
</div>