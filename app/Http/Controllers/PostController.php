<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function indexTambah(){
        return view('tambah_post', [
            "tittle" => "Tulis Post",
            "kategoris" => Kategori::all()
        ]);
    }

    public function detail(Post $id)
    {
        if (auth()->user()->jabatan !== "Admin" && $id["id_user"] !== auth()->user()->id) {
            return redirect('/')->with('message', 'Anda Tidak bisa membuka pesan milik orang lain!!');
        }else{
            return view('detail_post', [
                "tittle" => "Detail Post",
                "result" => $id
            ]);
        }
    }

    public function edit(Post $id)
    {
        if (auth()->user()->jabatan !== "Admin" && $id["id_user"] !== auth()->user()->id) {
            return redirect('/')->with('message', 'Anda Tidak bisa mengubah pesan milik orang lain!!');
        } else {
            return view('edit_post', [
                "tittle" => "Edit Post",
                "kategoris" => Kategori::all(),
                "result" => $id
            ]);
        }
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'kategori' => ['required', 'exists:kategoris,name'],
            'isi_post' => 'required'
        ]);

        $validatedData['id_kategori'] = Kategori::where('name', $validatedData['kategori'])->first()->id;

        $validatedData['id_user'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/')->with('message', 'Data Post Berhasil Ditambahkan!!');
    }

    public function update(Request $request, Post $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'kategori' => ['required', 'exists:kategoris,name'],
            'isi_post' => 'required'
        ]);

        $validatedData['id_kategori'] = Kategori::where('name', $validatedData['kategori'])->first()->id;

        // dd($validatedData);

        array_splice($validatedData, 1, 1);

        Post::where('id', $id->id)->update($validatedData);

        return redirect('/')->with('message', 'Data Post Berhasil Di Perbarui!!');
    }

    public function destroy(Request $request)
    {
        Post::where('id', $request->id)->delete();

        return redirect('/')->with('message', 'Data berhasil dihapus!!');
    }
}
