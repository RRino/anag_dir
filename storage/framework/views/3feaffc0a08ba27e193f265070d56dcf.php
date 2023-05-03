
<h1 class="tit-add">Modifica Socio</h1>
<link rel="stylesheet" href="/css/app.css">

<div class="container-sm">
    <form action="/edit" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="usr">ID:</label>
            <input type="text" class="form-control" id="nom" name="nome" value="<?php echo e($anagraficas['id']); ?>">
        </div>
        <div class="form-group">
            <label for="usr">Nome:</label>
            <input type="text" class="form-control" id="nom" name="nome" value="<?php echo e($anagraficas['nome']); ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Cognome:</label>
            <input type="text" class="form-control" id="co" name="cognome"
                value="<?php echo e($anagraficas['cognome']); ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Indirizzo:</label>
            <input type="text" class="form-control" id="in" name="indirizzo"
                value="<?php echo e($anagraficas['indirizzo']); ?>">
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Aggiorna</button>
    </form>
    <a class="btn btn-primary b-list" href="<?php echo e('/'); ?>" role="button">Ritorno a lista</a>
</div>
<?php /**PATH /home/rino/LARAVEL/anag_dir/resources/views/EditAnagrafica.blade.php ENDPATH**/ ?>