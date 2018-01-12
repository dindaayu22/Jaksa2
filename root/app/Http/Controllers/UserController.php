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

class UserController extends Controller {

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
	public function __construct()
	{
		$this->middleware('web');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//terpopuler
		$terpopuler=DB::table('kategori')
					->join('berkas','kategori.idKategori','=','berkas.idKategori')
					->join('userberkas','berkas.idBerkas','=','userberkas.idBerkas')
					->select('*',DB::raw('count(*) as count'))
					->where('log','Open')
					->orWhere('log','Download')
					->orwhere('log','Upload')
					->groupBy('namaKategori')
					->orderBy('count', 'desc')
					->paginate(4);

		//most view
		$most_view =  DB::table('kategori')
					->join('berkas','kategori.idKategori','=','berkas.idKategori')
					->join('userberkas','berkas.idBerkas','=','userberkas.idBerkas')
					->select('*',DB::raw('count(*) as count'))
					->where('log','Open')
					->groupBy('namaBerkas')
					->orderBy('count', 'desc')
					->paginate(5);
		//recent view
		$recent_view =  DB::table('kategori')
						->join('berkas','kategori.idKategori','=','berkas.idKategori')
						->join('userberkas','berkas.idBerkas','=','userberkas.idBerkas')
						->select('*',DB::raw('max(idUserBerkas) as mx'))
						->where('log','Open')
						->groupBy('namaBerkas')
						->orderBy('mx', 'desc')
						->paginate();

		return view('index',compact('recent_view','most_view','terpopuler'));
	}

	public function get_dokumen()
	{
		$result = DB::table('kategori')->get();
		return view('dokumen',compact('result'));
	}

	public function get_perkategori($kategori)
	{
		if(Auth::guard('user')->check() || Auth::guard('pimpinan')->check()||Auth::guard('admin')->check()){
				$berkas = DB::table('berkas')
					->where('idKategori',$kategori)
					->get();
			}else{
				$berkas = DB::table('berkas')
					->where('idKategori',$kategori)
					->where('jenisFile','Publik')
					->get();
			}
		$result = DB::table('kategori')
					->where('idKategori',$kategori)
					->get();
		return view('perkategori',compact('result','kategori','berkas'));
	}
	public function post_download_berkas($berkas){
		if(Auth::guard('user')->check()){
				$idUser 	= Auth::guard('user')->user()->id;
			}elseif (Auth::guard('pimpinan')->check()){
				$idUser 	= Auth::guard('pimpinan')->user()->id;
			}elseif (Auth::guard('admin')->check()){
				$idUser 	= Auth::guard('admin')->user()->id;
			}else{
				$idUser = 1;
			}
		
		DB::table('userberkas')->insert([			
                'idUser' => $idUser,
                'idBerkas' => $berkas,
                'log' => 'Download',
                'createDate'	=> date('Y-m-d'),
                'updateDate'	=> date('Y-m-d')
        ]);
        $result=DB::table('berkas')
					->where('idBerkas',$berkas)
					->first();
        return Response::Download(storage_path('files/'.$result->namaAsli), $result->namaAsli);
	}
	public function get_berkas($berkas)
	{
		$result = DB::table('kategori')
					->join('berkas','kategori.idKategori','=','berkas.idKategori')
					->where('idBerkas',$berkas)
					->get();
		if(Auth::guard('user')->check()){
				$idUser 	= Auth::guard('user')->user()->id;
			}elseif (Auth::guard('pimpinan')->check()){
				$idUser 	= Auth::guard('pimpinan')->user()->id;
			}elseif (Auth::guard('admin')->check()){
				$idUser 	= Auth::guard('admin')->user()->id;
			}else{
				$idUser = 1;
			}
		DB::table('userberkas')->insert([			
                'idUser' => $idUser,
                'idBerkas' => $berkas,
                'log' => 'Open',
                'createDate'	=> date('Y-m-d'),
                'updateDate'	=> date('Y-m-d')
        ]);
		return view('berkas',compact('result'));
	}
	public function get_register()
	{
		return view('register');
	}
	public function get_form_register($user)
	{
		$kota = DB::table('kota')->get();
		$kecamatan = DB::table('kecamatan')
					->orderBy('namaKecamatan', 'asc')
					->get();
		return view('form_register',compact('user','kota','kecamatan'));
	}
	public function get_login()
	{
		return view('login');
	}
	public function get_form_login($user)
	{
		return view('form_login',compact('user'));
	}

	public function post_register(){
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
				'password'		=> Hash::make(Input::get('password')),
				'rule'			=> Input::get('rule'),
				'createDate'   => date('Y-m-d'),
                'updateDate'   => date('Y-m-d')
			]);
		return Redirect::to('/login/'.Input::get('rule'));
	}
}