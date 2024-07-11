<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogHarianPegawai;

class LogHarianPegawaiController extends Controller
{
    public function index(){

        $log_harian = LogHarianPegawai::where('status', 'A')->get();

        return view('log-harian-pegawai.index', compact('log_harian'));
    }

    public function create(){

        $user = Auth::user();

        return view('log-harian-pegawai.create', compact('user'));
    }

    public function show($id){

         $master_part_id = LogHarianPegawai::findOrFail($id);

        return view('log-harian-pegawai.show', compact('master_part_id'));
       
    }

    public function store(Request $request){

        $request -> validate([
            'id_pegawai'                => 'required', 
            'keterangan_log_harian'     => 'required',
        ]);

        $input['keterangan_log_harian'] = $request->keterangan_log_harian;
        $input['status_log_harian']     = 'Pending';
        $input['id_pegawai']            = $request->id_pegawai;
        $input['created_by']            = Auth::user()->username;
        $input['updated_by']            = Auth::user()->username;

        $created    = LogHarianPegawai::create($input);

        if ($created){
            return redirect()->route('log-harian-pegawai.index')->with('success','Data baru berhasil ditambahkan');
        } else{
            return redirect()->route('log-harian-pegawai.index')->with('danger','Data baru gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $master_part_id  = LogHarianPegawai::findOrFail($id);
        $kode_rak = MasterKodeRak::where('status', 'A')->get();

        return view('log-harian-pegawai.update',compact('master_part_id', 'kode_rak'));
    }

    public function delete($id)
    {
        $updated = LogHarianPegawai::where('id', $id)->update([
                'status'         => 'N',
                'updated_at'     => NOW(),
                'updated_by'     => Auth::user()->nama_user
            ]);

        if ($updated){
            return redirect()->route('log-harian-pegawai.index')->with('success','Master part berhasil dihapus!');
        } else{
            return redirect()->route('log-harian-pegawai.index')->with('danger','Master part gagal dihapus');
        }
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'part_no'       => 'required',
            'part_nama'     => 'required',
        ]);

        $LogHarianPegawai = LogHarianPegawai::find($id);

        if (!$LogHarianPegawai) {
            return redirect()->route('log-harian-pegawai.index')->with('danger', 'Data master part tidak ditemukan');
        }

        $LogHarianPegawai->update($request->all());

        return redirect()->route('log-harian-pegawai.index')->with('success', 'Data master part berhasil diubah');
    }

}

