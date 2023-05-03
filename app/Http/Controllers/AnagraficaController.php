<?php

namespace App\Http\Controllers;

use App\Models\Anagrafica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnagraficaController extends Controller
{

    public function AddAnagrafica(Request $req)
    {
        $anagrafica = new Anagrafica;
        $anagrafica->id = $req->id;
        $anagrafica->nome = $req->nome;
        $anagrafica->cognome = $req->cognome;
        $anagrafica->indirizzo = $req->indirizzo;
        $anagrafica->save();
        return redirect('add');
    }

    /**
     * Display a listing of the resource.
     */
    function list() {
        $data = Anagrafica::all();
        return view('anagrafica.AnagraficaList', ['anagraficas' => $data]);
    }

    public function delete($id)
    {
        $data = Anagrafica::find($id);
        $data->delete();
        return redirect('/');
    }

   function showData($id){
    $data=Anagrafica::find($id);
    return view('anagrafica.EditAnagrafica',['anagraficas'=>$data]);
}

function edit(Request $request)
{
  $data = new Anagrafica;
  $data->id = $request->id;
  $data->nome = $request->nome;
  $data->cognome = $request->cognome;
  $data->indirizzo = $request->indirizzo;
  $data->save();
  return redirect('/');
}

    public function save(Request $request, Anagrafica $anagrafica)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        // $company->fill($request->post())->save();

        return redirect()->route('anagrafica.EditAnagrafica')->with('success', 'Company Has Been updated successfully');
    }

    public function operateDB()
    {
        $data = Anagrafica::all();
        $total = $data->count();
        foreach ($data as $users) {
            $id = $users->id;
            $user = DB::table('anagraficas')->where('id', $id)->select('id', 'nome', 'cognome')->get();
            $title1 = $users->nome;
            $title2 = $users->cognome;
            $title = $title1 . ' ' . $title2;
            $alias = str_slug($title,"-");
            $data = DB::table("anagraficas")->where('id', $id)
                ->update([
                    'title' => $title,
                    'alias' => $alias,
                ]);
        }
     
              // $users = DB::table('anagraficas')->distinct()->get();

        //$users = DB::table('anagraficas')->select('name as user_name')->get();

        // return DB::table('anagraficas')->get();
        // return DB::table('anagraficas')->sum('id');
        // return DB::table('anagraficas')->min('id');
        // return DB::table('anagraficas')->max('nome');
        // return DB::table('anagraficas')->avg('id');
        // return DB::table('anagraficas')->count('nome');

        /*    $data = DB::table("anagraficas")
    ->where ('id',3)
    ->update([
    'title'=>'Cizio-zz',
    'alias'=>'cizio-zz',
    'nome'=>'Caio',
    'cognome'=>'Catti',
    'indirizzo'=>'Via xx'
    ]);
     */

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
