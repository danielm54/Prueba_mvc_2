<?php require RUTA_APP.'/views/inc/header.php'; ?>


<div>
<table>

    <thead>
        
            <th>Identificación</th>
            <th>Nombre</th>
            <th>Teléfono</th>
        
    </thead>

        <?php foreach($data ['usuarios'] as $usuario): ?>

    <tbody>
        
            <td><?php echo $usuario -> id_clnt; ?></td>
            <td><?php echo $usuario -> nom_clnt; ?></td>
            <td><?php echo $usuario -> tel_clnt; ?></td>

            <?php endforeach; ?>    
    </tbody>

</table>
</div>

<?php require RUTA_APP.'/views/inc/footer.php'; ?>