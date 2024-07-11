<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\MasterPegawai;
use App\Models\LogHarianPegawai;
use Illuminate\Http\Request;

class VerifikasiLogController extends Controller
{
    public function index(){

        $user = Auth::user();
        $id_atasan = MasterPegawai::where('id', $user->id)->first();
        $id_pegawai = MasterPegawai::where('id_atasan_pegawai', $id_atasan->id)->pluck('id');
        $list_log_bawahan = LogHarianPegawai::whereIn('id_pegawai', $id_pegawai)->where('status', 'A')->get();


        return view('verifikasi-log.index', compact('id_atasan', 'list_log_bawahan'));
    }

    public function create(){

        $user = Auth::user();

        return view('verifikasi-log.create', compact('user'));
    }

    public function show($id){

         $master_part_id = LogHarianPegawai::findOrFail($id);

        return view('verifikasi-log.show', compact('master_part_id'));
       
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
            return redirect()->route('verifikasi-log.index')->with('success','Data baru berhasil ditambahkan');
        } else{
            return redirect()->route('verifikasi-log.index')->with('danger','Data baru gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $master_part_id  = LogHarianPegawai::findOrFail($id);
        $kode_rak = MasterKodeRak::where('status', 'A')->get();

        return view('verifikasi-log.update',compact('master_part_id', 'kode_rak'));
    }

    public function delete($id)
    {
        $updated = LogHarianPegawai::where('id', $id)->update([
                'status'         => 'N',
                'updated_at'     => NOW(),
                'updated_by'     => Auth::user()->username
            ]);

        if ($updated){
            return redirect()->route('verifikasi-log.index')->with('success','Master part berhasil dihapus!');
        } else{
            return redirect()->route('verifikasi-log.index')->with('danger','Master part gagal dihapus');
        }
        
    }

    public function diterima(Request $request, $id)
    {

        $log_pegawai = LogHarianPegawai::findOrFail($id);

        if (!$log_pegawai) {

            return redirect()->route('verifikasi-log.index')->with('danger', 'Log Harian Pegawai tidak ditemukan');

        } else {

            $updated_log = LogHarianPegawai::where('id', $id)
                ->update([
                'status_log_harian' => 'Diterima',
                'updated_at'        => NOW(),
                'updated_by'        => Auth::user()->username
            ]);

        return redirect()->route('verifikasi-log.index')->with('success', 'Log Harian Pegawai part berhasil diterima');

        }

    }

     public function ditolak(Request $request, $id)
    {

        $log_pegawai = LogHarianPegawai::findOrFail($id);

        if (!$log_pegawai) {

            return redirect()->route('verifikasi-log.index')->with('danger', 'Log Harian Pegawai tidak ditemukan');

        } else {

            $updated_log = LogHarianPegawai::where('id', $id)
                ->update([
                'status_log_harian' => 'Ditolak',
                'updated_at'        => NOW(),
                'updated_by'        => Auth::user()->username
            ]);

        return redirect()->route('verifikasi-log.index')->with('success', 'Log Harian Pegawai part berhasil ditolak');

        }

    }

}
