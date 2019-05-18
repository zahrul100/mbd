<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
 
class PelangganController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pelanggan
    	$pelanggan = DB::table('pelanggan')->get();
 
    	// mengirim data pelanggan ke view index
    	return view('index',['pelanggan' => $pelanggan]);
 
    }

    public function tambah()
    {
    	return view('tambah');
 
    }
     public function pesan($id)
    {
    	// mengambil data dari table pelanggan
    	$pelanggan = DB::table('pelanggan')->get();
 
    	// mengirim data pelanggan ke view index
    	return view('pesan',['id' => $id]);
 
 
    }

    public function store(Request $request)
{
	// insert data ke table pelanggan

        $faker = Faker::create('id_ID');
        $ID = $faker->ean13;
	DB::table('pelanggan')->insert([
		'ID_Pelanggan' => $ID,
		'Nama_plg' => $request->nama,
		'KTP_plg' => $request->ktp,
		'nohp_plg' => $request->nohp,
		'Alamat_Plg' => $request->alamat,
		'email' => $request->email
	]);
	// alihkan halaman ke halaman pelanggan
	return redirect('/pelanggan/tambah/'.$ID);
 
}

  public function lihat(Request $id)
    {
    	// mengambil data dari table pelanggan
    	$kamar = DB::table('kamar')->get();
 
    	// mengirim data pelanggan ke view index
//    	return view('pesan',['id' => $id]);
 return view('lihat',['kamar' => $kamar,'id'=> $id]);
 
 	
    }


}