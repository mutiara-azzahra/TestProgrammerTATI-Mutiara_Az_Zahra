@extends('welcome')
 
@section('content')
<div class="container" style="padding: 10px;">
    <div class="row mt-2">
        <div class="col-lg-12 pb-3">
             <div class="float-left">
                <h4>Verifikasi Log Harian</h4>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-warning" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card" style="padding: 10px;">
        <div class="card-body">
            <div class="col-lg-12">  
                <table class="table table-hover table-bordered table-sm bg-light table-striped" id="example2">
                    <thead>
                        <tr style="background-color: #6082B6; color:white">
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal Log</th>
                            <th class="text-center">Nama Pegawai</th>
                            <th class="text-center">Keterangan Kegiatan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp

                        @foreach($list_log_bawahan as $p)
                        <tr>
                            <td class="text-center">{{ $no++ }}.</td>
                            <td class="text-center">{{  Carbon\Carbon::parse($p->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td class="text-left">{{  $p->master_pegawai->nama_pegawai }}</td>
                            <td class="text-left">{{  $p->keterangan_log_harian }}</td>
                            <td class="text-center">
                                @if($p->status_log_harian == 'Ditolak')
                                <div><span class="badge badge-danger">Ditolak</span></div>

                                @elseif($p->status_log_harian == 'Pending')
                                <div><span class="badge badge-warning">Pending</span></div>

                                @elseif($p->status_log_harian == 'Diterima')
                                <div><span class="badge badge-success">Diterima</span></div>

                                @endif
                            </td>
                            <td class="text-center">{{  Carbon\Carbon::parse($p->updated_at)->format('d-m-Y H:i:s') }}</td>
                            <td class="text-center">

                                <form action="{{ route('verifikasi-log.diterima', $p->id) }}" method="POST" id="form_terima_{{ $p->id }}" data-id="{{ $p->id }}">

                                    @csrf
                                    @method('POST')
                                    
                                    <a class="btn btn-success btn-sm" onclick="Terima('{{$p->id}}')"><i class="fas fa-check"></i></a>
                                </form>

                                <form action="{{ route('verifikasi-log.ditolak', $p->id) }}" method="POST" id="form_tolak_{{ $p->id }}" data-id="{{ $p->id }}">

                                    @csrf
                                    @method('POST')
                                    
                                    <a class="btn btn-danger btn-sm" onclick="Tolak('{{$p->id}}')"><i class="fas fa-times"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>

    //TERIMA
    Terima = (id)=>{
        Swal.fire({
            title: 'Apa anda yakin menerima data log harian ini?',
            text:  "Data tidak dapat kembali" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'Terima' ,
            cancelButtonText: 'batal' ,
            reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    document.getElementById('form_terima_' + id).submit();
                }
        })
    }

    //TERIMA
    Tolak = (id)=>{
        Swal.fire({
            title: 'Apa anda yakin menerima data log harian ini?',
            text:  "Data tidak dapat kembali" ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6' ,
            cancelButtonColor: 'red' ,
            confirmButtonText: 'Tolak' ,
            cancelButtonText: 'batal' ,
            reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    document.getElementById('form_tolak_' + id).submit();
                }
        })
    }

</script>

@endsection