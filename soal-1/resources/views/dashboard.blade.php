@extends('welcome')
 
@section('content')
<div class="container" style="padding: 10px;">
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb pb-3">
            <div class="float-left">
                <h4></h4>
            </div>
        </div>
    </div>

    {{-- @if((Auth::user()->id_role == 2)) --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $list_log_pending }}</h3>
                <p>Belum diverifikasi / Pending</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Verfikasi Disini<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    {{-- @endif --}}
</div>
@endsection

@section('script')

@endsection