<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = User::all();
        $title = "Dashboard Home page ";
        return view('admin.index',compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $data = $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required|min:6',
        ]);
        //IF Check On Remember Me
        if($request->remember == "on"){
            $remember = true;
        }else{
            $remember = false;
        }
        //Succes Message
        if(auth()->guard('admin')->attempt($data)){
            return redirect()->Route('dashboard')->with([
                'message' => trans('admin.login success'),
                ]);
        }
        //Error  Message
        return redirect('/admin/login')->with([
        'error' => trans('admin.login fail'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login(){
        // dd('test');
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin');
    }
    public function users(){
        $users = User::all();
        // dd($users->toArray());
        return view('admin.users.users',compact('users'));
    }
    public function user_edit($id){
        $user  = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    public function user_update(Request $request , $id){

        $user = User::findOrFail($id);
        $data = $this->validate($request, [
            'name' => ['string','max:255'],
            'email' => ['email', 'max:255'],
        ]);
        if(request('password')){
            $data = $this->validate($request, [
                'password' => [ 'string', 'min:8'],
            ]);
            $password =  Hash::make($data['password']);
        }
        else{
            $password = $user->password;
        }
        //Send Message
        $user->name = request('name');
        $user->email = request('email');
        $user->password = $password;
        $user->save();
        return back();
    }
    public function user_activate($id){
        $user  = User::find($id);
        $user->status = '1';
        $user->save();
        return back();
    }
    public function user_deactivate($id){
        $user  = User::find($id);
        $user->status = '0';
        $user->save();
        return back();
    }
    public function user_delete($id){
     User::findOrFail($id)->delete();
     return back();
    }
    public function subscribers(){
        $subscribers = DB::table('subscriptions')->get();
        // dd($subscribers);
        return view('admin.users.subscribers',compact('subscribers'));
    }

}
