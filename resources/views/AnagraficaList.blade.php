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
    <td>Edit</td>
    <td>Cancella</td>
  </tr>
  @foreach($anagraficas as $anag)
  <tr>
    <td>{{$anag['id']}}</td>
    <td>{{$anag['nome']}}e</td>
    <td>{{$anag['cognome']}}</td>
    <td>{{$anag['indirizzo']}}</td>
    <td>{{$anag['civico']}}</td>
    <td>{{$anag['cap']}}</td>
    <td>{{$anag['localita']}}</td>
    <td>{{$anag['comune']}}</td>
    <td>{{$anag['sigla_provincia']}}</td>
    <td>{{$anag['email']}}</td>
    <td>{{$anag['pec']}}</td>
    <td>{{$anag['codice_fiscale']}}</td>
    <td>{{$anag['partita_iva']}}</td>
    <td>{{$anag['telefono']}}</td>
    <td>{{$anag['cellulare']}}</td>
    <td>{{$anag['tipo_socio']}}</td>
    <td>{{$anag['tipo_consegna']}}</td>

    <td>{{$anag['published']}}</td>
    <td>{{$anag['created_at']}}</td>
    <td><a href={{"edit/".$anag['id']}}>Edit</a></td>
    <td><a href={{"delete/".$anag['id']}}>Cancella</a></td>
  </tr>
  @endforeach
</table>