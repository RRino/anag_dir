<h1 class='tit-lista'>Anagrafica lista</h1>
<link rel="stylesheet" href="css/app.css">
<table class="tab1">
  <tr class="head">
    <td>ID</td>
    <td>Nome</td>
    <td>Cognome</td>
    <td>Indirizzo</td>
    <td>N.</td>
    <td>CAP</td>
    <td>Località</td>
    <td>Comune</td>
    <td>Prov.</td>
    <td>Email</td>
    <td>Pec</td>
    <td>C.F</td>
    <td>P.I</td>
    <td>Tel.</td>
    <td>Cell.</td>
    <td>Tipo socio</td>
    <td>Consena</td>
    <td>Pubb.</td>
    <td>Created</td>
    <td>Modifica</td>
    <td>Cancella</td>
  </tr>
  <?php $__currentLoopData = $anagraficas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr class="colo-list">
    <td><?php echo e($anag['id']); ?></td>
    <td><?php echo e($anag['nome']); ?></td>
    <td><?php echo e($anag['cognome']); ?></td>
    <td><?php echo e($anag['indirizzo']); ?></td>
    <td><?php echo e($anag['civico']); ?></td>
    <td><?php echo e($anag['cap']); ?></td>
    <td><?php echo e($anag['localita']); ?></td>
    <td><?php echo e($anag['comune']); ?></td>
    <td><?php echo e($anag['sigla_provincia']); ?></td>
    <td><?php echo e($anag['email']); ?></td>
    <td><?php echo e($anag['pec']); ?></td>
    <td><?php echo e($anag['codice_fiscale']); ?></td>
    <td><?php echo e($anag['partita_iva']); ?></td>
    <td><?php echo e($anag['telefono']); ?></td>
    <td><?php echo e($anag['cellulare']); ?></td>
    <td><?php echo e($anag['tipo_socio']); ?></td>
    <td><?php echo e($anag['tipo_consegna']); ?></td>

    <td><?php echo e($anag['published']); ?></td>
    <td><?php echo e($anag['created_at']); ?></td>
    <td><a href=<?php echo e("edit/".$anag['id']); ?>>Modifica</a></td>
    <td><a href=<?php echo e("delete/".$anag['id']); ?>>Cancella</a></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<a class="btn btn-primary b-add" href="<?php echo e("add"); ?>" role="button">Aggiungi Socio</a><?php /**PATH /home/rino/LARAVEL/anag_dir/resources/views/AnagraficaList.blade.php ENDPATH**/ ?>