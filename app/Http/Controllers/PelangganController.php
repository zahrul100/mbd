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
     public function pesan()
    {
    	// mengambil data dari table pelanggan
    	$pelanggan = DB::table('pelanggan')->get();
 
    	// mengirim data pelanggan ke view index
    	return view('pesan');
 
 
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
	return redirect('/pelanggan');
 
}

  public function lihat(Request $id)
    {
    	// mengambil data dari table pelanggan
    	// $ne = DB::table('pemesanan')->select('pemesanan.ID_Kamar')->whereBetween($id->cekin,['pemesanan.tglcheckin','pemesanan.tglcheckout'])->whereBetween($id->cekot,['pemesanan.tglcheckin','pemesanan.tglcheckout']);
    	
    	// $kamar = DB::table('pemesanan')->select('pemesanan.ID_Kamar','detail_kamar.nama_JK','detail_kamar.kapasitas','kamar.ID_JK','detail_kamar.harga_JK')
    	// ->join('kamar','pemesanan.ID_Kamar','=','kamar.ID_Kamar')
    	// ->join('detail_kamar','kamar.ID_JK','=','detail_kamar.ID_JK')
    	// ->whereNotExist($ne)
    	// ->get();
    	// mengirim data pelanggan ke view index
    	// $posts = DB::SELECT('select * from kamar,detail_kamar');
    	$posts = DB::select('select DISTINCT pemesanan.ID_Kamar,detail_kamar.nama_JK,detail_kamar.kapasitas,detail_kamar.harga_JK FROM pemesanan INNER JOIN kamar on pemesanan.ID_Kamar = kamar.ID_Kamar INNER join detail_kamar on kamar.ID_JK = detail_kamar.ID_JK AND NOT EXISTS (SELECT DISTINCT pemesanan.ID_Kamar from pemesanan INNER join kamar on ? BETWEEN tglcheckin AND tglcheckout AND ? BETWEEN tglcheckin AND tglcheckout ) Order by ID_Kamar',[$id->cekin,$id->cekot]);
   	// return view('pesan',['id' => $id]);


$to = \Carbon\Carbon::createFromFormat('Y-m-d', $id->cekin);
$from = \Carbon\Carbon::createFromFormat('Y-m-d', $id->cekot);
$id->hari = $to->diffInDays($from);
  return view('lihat',['kamar' => $posts,'id'=> $id]);
 
 	
    }


}
/* SELECT DISTINCT pemesanan.ID_Kamar,pemesanan.ID_Kamar,detail_kamar.nama_JK,detail_kamar.kapasitas,detail_kamar.harga_JK 
FROM pemesanan 
INNER JOIN kamar on pemesanan.ID_Kamar = kamar.ID_Kamar 
INNER join detail_kamar on kamar.ID_JK = detail_kamar.ID_JK AND 
NOT EXISTS (
SELECT DISTINCT pemesanan.ID_Kamar 
from pemesanan INNER join kamar on cekin BETWEEN tglcheckin AND tglcheckout AND cekot BETWEEN tglcheckin AND tglcheckout )