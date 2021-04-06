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
            <h2>DATA RESEP</h2>
        </div>
        <!-- Untuk menampilkan form search   -->
        <form class="float-right form-inline" id="searchForm" method="get" action="/dashboard" role="search">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Keyword" value="{{request()->query('keyword')}}">
            </div>
            <button type="submit" class="btn btn-primary mx-2">Cari</button>
            <a href="/dashboard">
                <button type="button" class="btn btn-danger">Reset</button>
            </a>
        </form>

        <!-- Tombol tambah resep -->
        <div class="my-2">
            <a class="btn btn-success" href="/dashboard/create"> Tambah Resep </a>
        </div>
    </div>

    <!-- Untuk Menampilkan Status Jika data berhasil ditambahkan  -->
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="col-md-10">

    <!-- Untuk Menampilkan List Data Tabel Resep -->
    <ul class="list-group">
    @foreach($dashboards as $dashboard)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $dashboard->nama}}
            <a href="/dashboard/{{ $dashboard->id_resep }}" class="badge badge-info">detail</a>
        </li>
    @endforeach
    </ul>
    </div>
    <div class="d-flexin">
        {{ $dashboards->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
