<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

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
	use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
   //  {
   //       $this->middleware('guest:user', ['except'=> ['logout']]);

   //  }


  //   public function login(Request $request){
   

  //       $userdata = array(
  //           'username'   => $request->username,
  //           'password'          => $request->password,
  //       );
        
  //            if (Auth::attempt($userdata)){
  //              $user = User::where('username', $request->username)->first();
  //              if($user->rule == 'Anggota') {
  //                $this->middleware('guest:user', ['except'=> ['logout']]);
  //               return redirect()->intended('/');
  //             } else {               
  //                       return redirect()->back();
  //             }
  //           }  elseif (Auth::attempt($userdata)){
  //              $user = User::where('username', $request->username)->first();
  //              if($user->rule == 'Pimpinan') {
  //                $this->middleware('guest:user', ['except'=> ['logout']]);
  //           return redirect()->intended('pimpinan/dashboard');
  //             } else {               
  //                       return redirect()->back();
  //             }
  //           }elseif (Auth::attempt($userdata)){
  //              $user = User::where('username', $request->username)->first();
  //              if($user->rule == 'Admin') {
  //                $this->middleware('guest:admin', ['except'=> ['logout']]);
  //               return redirect()->intended('pimpinan/dashboard');
  //             } else {               
  //                       return redirect()->back();
  //             }
  // }


	public function login(Request $request){
		$role = Input::get('rule');

        $userdata = array(
            'username'   => $request->username,
            'password'          => $request->password,
            'rule'  => $role,
        );
        
            if($role == 'Anggota'){
              $this->middleware('guest:user', ['except'=> ['logout']]);
              if (Auth::guard('user')->attempt($userdata)) {
                return redirect()->intended('/');
              } else {               
                        return redirect()->back();
              }
            }elseif($role == 'Pimpinan'){
              $this->middleware('guest:pimpinan', ['except'=> ['logout']]);
              if (Auth::guard('pimpinan')->attempt($userdata)) {
                return redirect()->intended('pimpinan/dashboard');
              } else {               
                        return redirect()->back();
              }
            }elseif($role == 'Admin'){
              $this->middleware('guest:admin', ['except'=> ['logout']]);
              if (Auth::guard('admin')->attempt($userdata)) {
                return redirect()->intended('admin/dashboard');
              } else {               
                        return redirect()->back();
            }
  }

  
  //       $user=DB::table('user')
  //                   ->select('password')
  //                   ->where('username',Input::get('username'))
  //                   ->first();

  //       if($user->password == Hash::check(Input::get('password'), $user->password)){
	
  //           return redirect('/');
  //       } else {               
  //               return redirect('/dokumen');
  //       }
        // if($role == 'Anggota'){
        //     return redirect()->route('depan');
        // }elseif($role == 'Pimpinan'){
        //     return redirect()->route('home');
        // }elseif($role == 'Admin'){
        //     return redirect()->route('dashboard');
        // }
		
}
// 		dd($request->all());

// 		if(Auth::attempt([

// 			'username' => $request->username,
// 			'password' => $request->password

// 			]))

// 		{
// 			$user = User::where('username', $request->username)->first();

// 			if($user->rule =="Anggota"){

// 				return redirect()->route('home');
// 			}
// 			return redirect()->route('dashboard');
// 		}

	
	// public function login(){
	// 	$rules = array(
 //                        'username'    => 'required|username',
 //                        'password' => 'required|alphaNum|min:5'
 //        );
 //        $validator = Validator::make(Input::all(), $rules);
 //        if ($validator->fails()) {
 //                        return Redirect::to('login')
 //                                        ->withErrors($validator)
 //                                        ->withInput(Input::except('password'));
 //        } else {
 //                        $userdata = array(
 //                                        'username'   => Input::get('username'),
 //                                        'password'          => Input::get('password')
 //                        );
 //                        if (Auth::attempt($userdata)) {
 //                                        return Redirect::to('/');
 //                        } else {               
 //                                        return Redirect::to('login');
 //                        }
 //        }
 //   }
	

	public function logout(){
		
  Session::flush();    
		return redirect('/');
	}
}