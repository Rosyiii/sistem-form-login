<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        return view('data_kategori', [
            "tittle" => "Data Kategori",
            "kategoris" => Kategori::latest()->paginate(9)
        ]);
    }

    public function indexTambah(){
        return view('tambah_kategori', [
            "tittle" => "Tambah Kategori"
        ]);
    }

    public function indexEdit(Kategori $id){
        return view('edit_kategori', [
            "tittle" => "Edit Kategori",
            "result" => $id
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'min:4', 'max:20', 'unique:kategoris,name']
        ]);

        Kategori::create($validatedData);

        return redirect('/data_kategori')->with('message', 'Data Kategori Berhasil Ditambahkan!!');
    }

    public function update(Request $request, Kategori $id)
    {
        if($request->name != $id->name){
            $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'unique:kategoris,name']
            ]);
            
            Kategori::where('id', $id->id)->update($validatedData);
            
            return redirect('/data_kategori')->with('message', 'Data Kategori berhasil dirubah!!');
        }

        return redirect('/data_kategori')->with('message', 'Data Kategori tidak ada yang dirubah!!');
    }

    public function destroy(Request $request)
    {
        Kategori::where('id', $request->id)->delete();

        return redirect('/data_kategori')->with('message', 'Data Kategori berhasil dihapus!!');
    }
}
