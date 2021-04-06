<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // UNTUK MEMBATASI AKSI USER YANG BELUM LOGIN
    public function __construct()
    {
        $this->middleware('auth', ["except"=> ["index", "show"]]);
    }

    public function index(Request $request)
    {
        
        // $dashboards = Dashboard::all();
        //Eloquent untuk menampilkan data resep, dengan atau tanpa search
        $dashboards = Dashboard::where([
            ['nama', '!=', null, 'OR', 'tema', '!=', null, 'OR', 'penulis', '!=', null ], //ketika form search kosong, maka request akan null. Ambil semua data di database
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('nama', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('tema', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('penulis', 'LIKE', '%' . $keyword . '%')->get(); //ketika form search terisi, request tidak null. Ambil data sesuai keyword
                }
            }]
        ])
            ->orderBy('id_resep', 'desc')
            ->paginate(5);
        return view('dashboard', compact('dashboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Untuk Menampilkan View Create atau menampilkan form tambah data resep
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    // Untuk menginputkan data resep ke dalam database dan divalidasi agar tidak boleh kososng
        {
        $request->validate([
            'nama' => 'required',
            'penulis' => 'required',
            'tema' => 'required',
            'resep' => 'required',
        ]);

        Dashboard::create($request->all());
        return redirect('/dashboard')->with('status', 'Resep Ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */

    // Untuk Menampilkan Halaman Detail
    public function show(Dashboard $dashboard)
    {
        return view('detail', compact('dashboard' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */

    //Untuk Menampilkan Halama form edit
    public function edit(Dashboard $dashboard)
    {
        return view('edit', compact('dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */

    // Untuk Meng update data resep dan divalidasi agar tidak boleh kososng
    public function update(Request $request, Dashboard $dashboard)
    {
        $request->validate([
            'nama' => 'required',
            'penulis' => 'required',
            'tema' => 'required',
            'resep' => 'required',
        ]);

        Dashboard::where('id_resep', $dashboard->id_resep)
                    ->update([
                        'nama' => $request->nama,
                        'penulis' => $request->penulis,
                        'tema' => $request->tema,
                        'resep' => $request->resep,
                    ]);
        
        return redirect('/dashboard')->with('status', 'Resep Diedit!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */

    //Untuk Menghapus Data
    public function destroy(Dashboard $dashboard)
    {
        Dashboard::destroy($dashboard->id_resep);
        return redirect('/dashboard')->with('status', 'Resep Telah Dipahus!');
    }
}
