<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterLevelPegawai;

class MasterLevelPegawaiController extends Controller
{
    public function index(){

        $log_harian = MasterLevelPegawai::where('status', 'A')->get();

        return view('master-level-pegawai.index', compact('log_harian'));
    }

    public function create(){

        return view('master-level-pegawai.create');
    }

    public function store(Request $request){

        $request -> validate([
            'level'    => 'required',
        ]);

        try {

            $check_data = MasterLevelPegawai::where('kategori_level', $request->level)->exists();

            if(!$check_data){

                $input['kategori_level']    = $request->level;
                $input['created_by']        = Auth::user()->username;
                $input['updated_by']        = Auth::user()->username;

                $created    = MasterLevelPegawai::create($input);
                
                return redirect()->route('master-level-pegawai.index')->with('success', 'Data master level pegawai berhasil ditambahkan!');

            } else {

                return redirect()->route('master-level-pegawai.index')->with('warning', 'Data sudah ada pada level pegawai!');

            }

        } catch (\Exception $e) {

            return redirect()->route('master-level-pegawai.details')->with('danger', 'Data master level tidak dapat ditambahkan!');
        }

    }

    public function edit($id)
    {
        $level  = MasterLevelPegawai::findOrFail($id);

        return view('master-level-pegawai.update',compact('level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_level'    => 'required',
        ]);

        $level = MasterLevelPegawai::findOrFail($id);

        $level->update($request->all());

        return redirect()->route('master-level-pegawai.index')->with('success', 'Data level pegawai berhasil diubah!');

    }

    public function delete($id)
    {
        $updated = MasterLevelPegawai::where('id', $id)->update([
                'status'         => 'N',
                'updated_at'     => NOW(),
                'updated_by'     => Auth::user()->username
            ]);

        if ($updated){
            return redirect()->route('master-level-pegawai.index')->with('success','Master part berhasil dihapus!');
        } else{
            return redirect()->route('master-level-pegawai.index')->with('danger','Master part gagal dihapus');
        }
        
    }

}

