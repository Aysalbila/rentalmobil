<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeMobil;

class TipeMobilController extends Controller
{
   function index()
    {
    $tipeMobilData = TipeMobil::get();
    return view('pages.tipemobil.index', ['tipeMobilData' => $tipeMobilData]);
    }

    function create()
    {
        return view('pages.tipemobil.create');
    }

    function store(Request $request)
    {
        $tipeMobilData = new TipeMobil;
        $tipeMobilData->tipe = $request->tipe;
        $tipeMobilData->save();

        return redirect()->to('/tipemobil')->with('successs','Data Tipe Berhasil Ditambahkan');
    }

    function formEdit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipemobil.form_edit', ['tipeMobilData' => $tipeMobilData]);
    }

    function update($id, Request $request)
    {
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->tipe = $request->tipe;
        $tipeMobilData->save();

        return redirect()->to('/tipemobil')->with('successs','Data Tipe Berhasil Diupdate');

    }

    function delete($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->delete();

        return redirect()->to('/tipemobil')->with('successs','Data Tipe Berhasil Dihapus');


    }
}
