<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MasterPegawai;
use App\Models\MasterLevelPegawai;
use App\Models\User;

class MasterPegawaiController extends Controller
{
    public function index(){

        $master_pegawai = MasterPegawai::where('status', 'A')->get();

        return view('master-pegawai.index', compact('master_pegawai'));
    }

    public function create(){

        $all_user_aktif = User::where('status', 'A')->get();
        $atasan_pegawai = MasterPegawai::where('status', 'A')->get();
        $level_pegawai  = MasterLevelPegawai::where('status', 'A')->get();

        return view('master-pegawai.create', compact('all_user_aktif', 'atasan_pegawai', 'level_pegawai'));
    }

    public function store(Request $request){

        $request -> validate([
            'nama_pegawai'      => 'required',
            'id_level_pegawai'  => 'required',
            'id_user'           => 'required',
        ]);

        $input['nama_pegawai']      = $request->nama_pegawai;
        $input['id_level_pegawai']  = $request->id_level_pegawai;
        $input['id_user']           = $request->id_user;
        $input['id_atasan_pegawai'] = $request->id_atasan_pegawai;
        $input['created_by']        = Auth::user()->username;
        $input['updated_by']        = Auth::user()->username;

        $created    = MasterPegawai::create($input);

        if ($created){
            return redirect()->route('master-pegawai.index')->with('success','Data baru berhasil ditambahkan');
        } else{
            return redirect()->route('master-pegawai.index')->with('danger','Data baru gagal ditambahkan');
        }
    }

    public function show($id){

         $pegawai = MasterPegawai::findOrFail($id);

        return view('master-pegawai.show', compact('pegawai'));
       
    }

    public function edit($id)
    {
        $pegawai        = MasterPegawai::findOrFail($id);
        $atasan_pegawai = MasterPegawai::where('status', 'A')->get();
        $level_pegawai  = MasterLevelPegawai::where('status', 'A')->get();

        return view('master-pegawai.update',compact('pegawai', 'atasan_pegawai', 'level_pegawai'));
    }

    public function delete($id)
    {
        $updated = MasterPegawai::where('id', $id)->update([
                'status'         => 'N',
                'updated_at'     => NOW(),
                'updated_by'     => Auth::user()->nama_user
            ]);

        if ($updated){
            return redirect()->route('master-pegawai.index')->with('success','Master part berhasil dihapus!');
        } else{
            return redirect()->route('master-pegawai.index')->with('danger','Master part gagal dihapus');
        }
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'part_no'       => 'required',
            'part_nama'     => 'required',
        ]);

        $pegawai = MasterPegawai::find($id);

        if (!$pegawai) {
            return redirect()->route('master-pegawai.index')->with('danger', 'Data master part tidak ditemukan');
        }

        $masterPart->update($request->all());

        return redirect()->route('master-pegawai.index')->with('success', 'Data master part berhasil diubah');
    }
}
