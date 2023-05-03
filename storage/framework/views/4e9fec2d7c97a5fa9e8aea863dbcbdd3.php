
<link rel="stylesheet" href="css/app.css">
<h1 class="tit-add">Aggiunge Socio</h1>


<div class="container-sm">

<form action="add" method="POST">
    <?php echo csrf_field(); ?>
<div class="form-group">
    <label for="usr">Nome:</label>
    <input type="text" class="form-control" id="nom" name="nome"  placeholder="Inserire nome">
  </div>
  <div class="form-group">
    <label for="pwd">Cognome:</label>
    <input type="text" class="form-control" id="co" name="cognome"  placeholder="Inserire cognome">
  </div>
  <div class="form-group">
    <label for="pwd">Indirizzo:</label>
    <input type="text" class="form-control" id="in" name="indirizzo"  placeholder="Inserire Indirizzo">
  </div>
  
     
    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
          <label class="form-check-label" for="form1Example3"> Ricordami </label>
        </div>
      </div>
  
      <div class="col">
        <!-- Simple link -->
        <a href="#!">Dimenticato password?</a>
      </div>
    </div>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block">Aggiungi</button>
  </form>
  <a class="btn btn-primary b-list" href="<?php echo e("/"); ?>" role="button">Ritorno a lista</a>
</div><?php /**PATH /home/rino/LARAVEL/anag_dir/resources/views/anagrafica/AddAnagrafica.blade.php ENDPATH**/ ?>