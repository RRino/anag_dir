
<h1 class="tit-add">Modifica Socio</h1>
<link rel="stylesheet" href="/css/app.css">

<div class="container-sm">
    <form action="/edit" method="POST">
        @csrf

        <div class="form-group">
            <label for="usr">Nome:</label>
            <input type="text" class="form-control" id="nom" name="nome" value="{{ $anagraficas['nome'] }}">
        </div>
        <div class="form-group">
            <label for="pwd">Cognome:</label>
            <input type="text" class="form-control" id="co" name="cognome"
                value="{{ $anagraficas['cognome'] }}">
        </div>
        <div class="form-group">
            <label for="pwd">Indirizzo:</label>
            <input type="text" class="form-control" id="in" name="indirizzo"
                value="{{ $anagraficas['indirizzo'] }}">
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Aggiorna</button>
    </form>
    <a class="btn btn-primary b-list" href="{{ '/' }}" role="button">Ritorno a lista</a>
</div>
