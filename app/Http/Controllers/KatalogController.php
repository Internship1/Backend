<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Katalog;
use App\Http\Requests\StoreKatalogRequest;
use App\Commands\StoreKatalogCommand;
use App\Http\Controllers\Auth;
use Illuminate\Http\Response;
use Illuminate\Database\Query\Builder;

class KatalogController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    public function index()
    {
        // $katalog = Katalog::all();
        $katalog = Katalog::all([
            'judul',
    	   'kategori_id',
    	   'deskripsi',
    	   'harga',
            ]);
        return response()->json(compact('katalog'),200);
        // return $katalog;
    	// return view('index', compact('katalog'));
        
//        $data = Katalog::table('katalog')->where('id', 1)->get();
//        return response($data)->header('Access-Control-Allow-Origin', '*')
//                     ->header('Access-Control-Allow-Credentials', 'true')
//                     ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
//                     ->header('Access-Control-Allow-Headers', 'DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type');
    }
    
//    public function katalog()
//    {
//        
//    }

    public function show($id)
    {
    	$katalog = Katalog::find($id);
    	return view('show', compact('katalog'));
    }

    public function create()
    {
    	return view('create');
    }

    // public function store(Request $request)
    // {

    //     $requestData = $request->all();

    //     Katalog::create($requestData);

    //     Session::flash('flash_message', 'Katalog added!');

    //     return redirect('katalog.index');
    // }

    public function store(Request $request)
    {
        $katalog = new Katalog;
    	$katalog->judul = $request->input('judul');
    	$katalog->kategori_id = $request->input('kategori_id');
    	$katalog->deskripsi = $request->input('deskripsi');
    	$katalog->harga = $request->input('harga');
    	$katalog->kondisi = $request->input('kondisi');
    	$katalog->gambar = $request->file('gambar');
    	$katalog->lokasi = $request->input('lokasi');
    	$katalog->email = $request->input('email');
    	$katalog->telpon = $request->input('telpon');
    	$katalog->pemilik_id = 1;

        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        $request->file('gambar')->move("images", $fileName);

        $katalog->gambar = $fileName;

    	// if($gambar) {
    	// 	$gambar_nama = $gambar->getClientOriginalName();
    	// 	$gambar->move(public_path('images'), $gambar_nama);
    	// }else{
    	// 	$gambar_nama = 'noimage.jpg';
    	// }

        $katalog->save();


    	return \Redirect::route('katalog.index')
    			->with('message', 'Katalog Berhasil Dibuat');
    }
}
