<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingatlanok;
use Illuminate\Support\Facades\DB;

class IngatlanokController extends Controller
{
    public function index()
    {
        return DB::table('ingatlanoks')
            ->join('kategoriaks', 'ingatlanoks.kategoira', '=', 'kategoriaks.id')
            ->select(
                'ingatlanoks.id',
                'ingatlanoks.leiras',
                'ingatlanoks.hirdetesDatuma',
                'ingatlanoks.tehermentes',
                'ingatlanoks.ar',
                'ingatlanoks.kepUrl',
                'kategoriaks.nev',
                'kategoriaks.id'
            )

            ->get();
    }

    public function show($id)

    {

        return Ingatlanok::find($id);
    }



    public function store(Request $request)

    {


        $request->validate([
            'id' => 'required',
            'kategoria' => 'required',
            'leiras' => 'required',
            'hirdetesDatuma' => 'required',
            'tehermentes' => 'required',
            'ar' => 'required',
            'kepUrl' => 'required',
        ]);

        $ingatlan = new Ingatlanok();
        $ingatlan -> id = $request -> id;
        $ingatlan -> kategoria = $request -> kategoria;
        $ingatlan -> leiras = $request -> leiras;
        $ingatlan -> hirdetesDatuma = $request -> hirdetesDatuma;
        $ingatlan -> tehermentes = $request -> tehermentes;
        $ingatlan -> ar = $request -> ar;
        $ingatlan -> kepUrl = $request -> kepUrl;
        $ingatlan -> save();

        //return Ingatlanok::create($request->all());
    }


    public function delete(Request $request, $id)

    {

        $article = Ingatlanok::find($id);

        $article->delete();

        return ['message' => 'Törölve'];
    }
}
