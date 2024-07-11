<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiComtroller extends Controller
{
    public function index()
    {
        return Provinsi::all();
    }

    public function store(Request $request)
    {
        $provinsi = Provinsi::create($request->all());

        return response()->json($provinsi, 201);
    }

    public function show($id)
    {
        return Provinsi::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->update($request->all());

        return response()->json($provinsi, 200);
    }

    public function destroy($id)
    {
        Provinsi::destroy($id);
        
        return response()->json(null, 204);
    }
}
