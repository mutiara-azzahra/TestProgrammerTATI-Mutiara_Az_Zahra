<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MasterPegawai;
use App\Models\LogHarianPegawai;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $user             = Auth::user();
        $id_atasan        = MasterPegawai::where('id', $user->id)->first();
        $id_pegawai       = MasterPegawai::where('id_atasan_pegawai', $id_atasan->id)->pluck('id');
        $list_log_pending = LogHarianPegawai::whereIn('id_pegawai', $id_pegawai)
                            ->where('status_log_harian', 'Pending')
                            ->where('status', 'A')
                            ->count();

        return view('dashboard', compact('list_log_pending'));
    }
}
