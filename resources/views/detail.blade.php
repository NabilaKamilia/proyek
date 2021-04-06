@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="row m-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2 mb-3">
            <h2>DETAIL RESEP</h2>
        </div>
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{$dashboard->nama}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$dashboard->penulis}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">{{$dashboard->tema}}</h6>
                <p class="card-text">{{$dashboard->resep}}</p>
                
                <a href="{{$dashboard->id_resep}}/edit" class="btn btn-primary"> Edit </a>
                <form action="{{$dashboard->id_resep}}" method="POST" class="d-inline"> 
                @method('delete')
                <!-- Fungsi csrf untuk mengamankan form -->
                @csrf 
                <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
                <a href="/dashboard" class="card-link"> Kembali </a>
                

            </div>
        </div>
    </table>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
