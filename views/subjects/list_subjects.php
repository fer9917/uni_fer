<?php
    if (empty($subjects)) { ?>
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
        </tr>
    </thead>
    <tbody><?php
        foreach ($subjects as $key => $value) { ?>
            <tr>
                <th scope="row"><?php echo $value['vchCodigoMateria'] ?></th>
                <td><?php echo $value['vchMateria'] ?></td>
            </tr><?php
        } ?>
    </tbody>
</table>