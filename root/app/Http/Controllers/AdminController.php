<?php 

namespace App\Http\Controllers;
use Auth;
use DB;
use Redirect;
use App\Kategori;
use Illuminate\Http\Request;
use Validator;
use Response;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

//use App\Users;

class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	
	public function index()
	{
		// log this day
		$downd =0;
		$upd = 0;
		$opd =0;
		$downd = DB::table('userberkas')
					->where('log','Download')
					->where('createDate',date('Y-m-d'))
					->count();
		$upd = DB::table('userberkas')
					->where('log','Upload')
					->where('createDate',date('Y-m-d'))
					->count();
		$opd = DB::table('userberkas')
					->where('log','Open')
					->where('createDate',date('Y-m-d'))
					->count();
		$chartdown = array();
		$chartup = array();
		$chartop = array();
		for($bulan=1;$bulan<=12;$bulan++){
			Array_push($chartdown,DB::table('userberkas')
					->where('log','Download')
					->whereYear('createDate','=',date('Y'))
					->whereMonth('createDate','=',$bulan)
					->count());
			Array_push($chartup,DB::table('userberkas')
					->where('log','Upload')
					->whereYear('createDate','=',date('Y'))
					->whereMonth('createDate','=',$bulan)
					->count());
			Array_push($chartop,DB::table('userberkas')
					->where('log','Open')
					->whereYear('createDate','=',date('Y'))
					->whereMonth('createDate','=',$bulan)
					->count());
		
		}
		return view('admin/index',compact('downd','upd','opd','chartdown','chartop','chartup'));
		
	}
	//user
	public function get_user()
	{
		$kota = DB::table('kota')->get();
		$kecamatan = DB::table('kecamatan')
					->orderBy('namaKecamatan', 'asc')
					->get();
		$result = DB::table('pengguna')
					->join('user','pengguna.idPengguna','=','user.idPengguna')
					->paginate(10);
		// $result->setPath(URL::to('admin/user'));
		return view('admin/user', compact('result','kota','kecamatan'));
	}
	public function get_form_user($user)
	{
		$kota = DB::table('kota')->get();
		$kecamatan = DB::table('kecamatan')
					->orderBy('namaKecamatan', 'asc')
					->get();
		$result = DB::table('kota')
					->join('kecamatan','kota.idKota','=','kecamatan.idkota')
					->join('pengguna','kecamatan.idKecamatan','=','pengguna.idkecamatan')
					->join('user','pengguna.idPengguna','=','user.idPengguna')
					->where('id',$user)
					->get();
		
		return view('admin/form_user', compact('result','kota','kecamatan','user'));
	}
	public function post_form_user(){
		DB::table('pengguna')->insert([
                'namaPengguna' => Input::get('namaPengguna'),
                'tanggalLahir' => Carbon::parse(Input::get('tanggalLahir')),
                'jenisKelamin' => Input::get('jenisKelamin'),
                'noHP' 		   => Input::get('noHP'),
                'alamat'       => Input::get('alamat'),
                'idKecamatan'  => Input::get('inputKecamatan'),
                'createDate'   => date('Y-m-d'),
                'updateDate'   => date('Y-m-d')
            ]);
		$idPengguna = DB::getPdo()->lastInsertId();
		DB::table('user')->insert([
				'username' 		=> Input::get('username'),
				'idPengguna'	=> $idPengguna,
				'rule'			=> Input::get('rule'),
				'password'		=> Hash::make(Input::get('password')),
				'createDate'   => date('Y-m-d'),
                'updateDate'   => date('Y-m-d')
			]);
		return Redirect::to('/admin/user');
	}
	public function put_form_user($user){
		DB::table('pengguna')
				->where('idPengguna', $user)
	            ->update([
                'namaPengguna' => Input::get('namaPengguna'),
                'tanggalLahir' => Carbon::parse(Input::get('tanggalLahir')),
                'jenisKelamin' => Input::get('jenisKelamin'),
                'noHP' 		   => Input::get('noHP'),
                'alamat'       => Input::get('alamat'),
                'idKecamatan'  => Input::get('inputKecamatan'),
                'createDate'   => date('Y-m-d'),
                'updateDate'   => date('Y-m-d')
            ]);
		DB::table('user')
				->where('id', $user)
	            ->update([
				'username' => Input::get('username'),
				'rule'		=> Input::get('rule'),
				'updateDate'   => date('Y-m-d')
			]);
		return Redirect::to('/admin/user');
	}
	public function get_form_user_pass($user){
		return view('/admin/form_user_pass',compact('user'));
	}
	public function put_form_user_pass($user){
		
		DB::table('user')
				->where('id', $user)
	            ->update([
				'password'		=> Hash::make(Input::get('password')),
				'updateDate'   => date('Y-m-d')
			]);
		return Redirect::to('/admin/user');
	}


	//dokumen

	public function get_dokumen()
	{
		$result = DB::table('kategori')
					->join('berkas','kategori.idKategori','=','berkas.idKategori')
					->paginate(10);

		return view('admin/dokumen',compact('result'));
	}

	

	
	public function get_form_dokumen($dokumen)
	{
		$kategori = DB::table('kategori')->get();
		$result = DB::table('kategori')
					->join('berkas','kategori.idKategori','=','berkas.idkategori')
					->where('idBerkas',$dokumen)
					->get();

		return view('admin/form_dokumen',compact('result','kategori','dokumen'));
	}
	public function post_form_dokumen()
	{
		DB::table('berkas')->insert([
                'namaBerkas' 	=> Input::get('namaBerkas'),
                'idkategori' 	=> Input::get('inputKategori'),
                'namaAsli' 		=> Input::get('namaBerkas').".pdf",
                'jenisFile'		=> Input::get('jenisFile'),
                'createDate'	=> date('Y-m-d'),
                'updateDate'	=> date('Y-m-d')
    	]);
    	$idBerkas = DB::getPdo()->lastInsertId();
    	$file = Input::file('Berkas'); 
		$file->move(storage_path('files/'),Input::get('namaBerkas').".pdf");
		DB::table('userberkas')->insert([
                'idUser' 	=> Auth::user()->id,
                'idBerkas' => $idBerkas,
                'log'	=>'Upload',
                'createDate'	=> date('Y-m-d'),
                'updateDate'	=> date('Y-m-d')
        ]);
		return Redirect::to('/admin/dokumen');
	}
	
	public function put_form_dokumen($dokumen)
	{
		$file =DB::table('berkas')
	    		->where('idBerkas',$dokumen)
	    		->get();
	    foreach($file as $files){
		Storage::disk('local_public')->move('files/'.$files->namaAsli , 'files/'.Input::get('namaBerkas').'.pdf');
		}
		
		DB::table('berkas')
				->where('idBerkas', $dokumen)
	            ->update([
                'namaBerkas' => Input::get('namaBerkas'),
                'namaAsli' 		=> Input::get('namaBerkas').'.pdf',
                'updateDate'	=> date('Y-m-d')
    	]);
		return Redirect::to('/admin/dokumen');
	}
	// kategori
	public function get_kategori()
	{
		$result = DB::table('kategori')->paginate(10);
		return view('admin/kategori',compact('result'));
	}
	
	
	
	public function get_form_kategori($kategori){   
    	$result = DB::table('kategori')
    					->where('idKategori',$kategori)
    					->get();
    	return view('admin/form_kategori',compact('result','kategori'));
	}

	public function post_form_kategori(){
		DB::table('kategori')->insert([
                'namaKategori' => Input::get('namaKategori'),
                'createKategori'	=> date('Y-m-d'),
                'updateKategori'	=> date('Y-m-d')
    	]);
		return Redirect::to('/admin/kategori');
	}
	public function put_form_kategori($kategori){
		DB::table('kategori')
	            ->where('idKategori', $kategori)
	            ->update([
	            	'namaKategori' => Input::get('namaKategori'),
	            	'updateKategori'	=> date('Y-m-d')
	            	]);
	    return Redirect::to('/admin/kategori');
	}
}