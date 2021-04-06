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
            <h2>EDIT RESEP</h2>
        </div>
        <form method="POST" action="/dashboard/{{$dashboard->id_resep}}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="nama">Nama Resep</label>
            <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Resep" name="nama" value="{{$dashboard->nama}}"> 
            @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control @error ('penulis') is-invalid @enderror" id="penulis" placeholder="Masukkan Nama Penulis" name="penulis" value="{{$dashboard->penulis}}">
            @error('penulis') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
            <label for="tema">Tema</label>
            <input type="text" class="form-control @error ('tema') is-invalid @enderror" id="tema" placeholder="Masukkan Tema" name="tema" value="{{$dashboard->tema}}">
            @error('tema') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
            <label for="resep">Resep</label>
            <textarea type="text" class="form-control @error ('resep') is-invalid @enderror" id="resep" placeholder="Masukkan Resep" name="resep">{{$dashboard->resep}}</textarea>
            @error('resep') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Data</button>
        </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
