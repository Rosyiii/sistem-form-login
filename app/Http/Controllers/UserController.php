<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login', [
            "tittle" => "LOG IN"
        ]);
    }

    public function indexAuthors(){
        return view('data_author', [
            "tittle" => "Data Author",
            "authors" => User::oldest()->paginate(9)
        ]);
    }

    public function indexRegis()
    {
        return view('registrasi', [
            "tittle" => "Registrasi",
            "jabatans" => ["Admin", "Author"]
        ]);
    }

    public function edit(User $id)
    {
        return view('edit_author', [
            "tittle" => "Edit Author",
            "jabatans" => ["Admin", "Author"],
            "result" => $id
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('message', 'Anda Berhasil Login. Selamat datang '. auth()->user()->name . '!!');
        }

        return back()->with('loginEror', 'Login Failed');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'jabatan' => 'required',
            'username' => ['required', 'min:4', 'max:20', 'unique:users,username'],
            'password' => ['required', 'min:4', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/data_author')->with('message', 'Data User Berhasil Ditambahkan!!');
    }
    
    public function loginSucces(){
        if(auth()->user()->jabatan === "Admin"){
            return view('home', [
                "tittle" => "Home",
                "posts" => Post::with('user', 'kategori')->latest()->paginate(9)
        ]);}
        else
        {
            return view('home', [
                "tittle" => "Home",
                "posts" => Post::with('user')->where('id_user', auth()->user()->id)->latest()->paginate(9) // hanya dapat melihat post yang dibuat olehnya sendiri
        ]);}
    }

    public function update(Request $request, User $id)
    {
        $rules =  ['name' => 'required|max:255'];

        if ($request->username != $id->username){
            $rules['username'] = ['required', 'min:4', 'max:20', 'unique:users,username'];
        }

        $validatedData = $request->validate($rules);

        if($request['ganti_password'] == true){
            if(auth()->user()->jabatan === 'Admin'){
                $validatedData['password'] = $request->validate([
                    'password' => ['required', 'min:4', 'max:255']
                ]);
                $validatedData['password'] = Hash::make(implode($validatedData['password']));
            }else{
                $old_password = $request->validate([
                    'old_password' => 'required'
                ]);
                if(Hash::check(implode($old_password), $id->password)){
                    $validatedData['password'] = $request->validate([
                        'new_password' => ['required', 'min:4', 'max:255']
                    ]);
                    $validatedData['password'] = Hash::make(implode($validatedData['password']));
                }else{
                    return redirect('/')->with('message', 'Password Lama yang anda masukan salah!!');
                }
            }
        }

        User::where('id', $id->id)->update($validatedData);

        if(auth()->user()->jabatan === 'Admin'){
            return redirect('/data_author')->with('message', 'Data author Berhasil Di Perbarui!!');
        }
        return redirect('/')->with('message', 'Data author Berhasil Di Perbarui!!');
    }

    public function destroy(Request $request)
    {
        User::where('id', $request->id)->delete();

        return redirect('/data_author')->with('message', 'Data Karyawan berhasil dihapus!!');
    }

    public function logout()
    {
        Auth::logout();
    
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
}
