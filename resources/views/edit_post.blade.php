{{-- @dd($result->kategori->name) --}}
@extends('layout.main')

@section('fill')
    <div class="card mx-auto" style="max-width: 50rem">
        <div class="card-body">
            <form action="/edit_post/{{ $result["id"] }}" method="POST">
                @csrf

                <h6 class="my-3">Judul Pesan</h6>
                <div class="align-self-start form-floating ps-1">
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Pesan"
                        name="judul" value="{{ old('judul', $result["judul"]) }}" autofocus required>
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="ps-4" for="judul">Judul Pesan</label>
                </div>

                <h6 class="my-3">Kategori</h6>
                <div class="align-self-start form-floating ps-1">
                    <input type="text" list="dataListKategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="kategori" value="{{ $result->kategori->name }}" @error('kategori') is-invalid @enderror required>
                    
                    <datalist id="dataListKategori">
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori["name"] }}"></option>
                        @endforeach
                    </datalist>

                    @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="ps-4" for="kategori">Kategori</label>
                </div>

                <h6 class="my-3">Isi Surat</h6>
                <div class="align-self-start ps-1">
                    <textarea class="form-control @error('isi_post') is-invalid @enderror" id="isi_post"
                        name="isi_post" style="min-height: 10rem" required>{{ old('isi_post', $result["isi_post"]) }}</textarea>
                    @error('isi_post')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center align-self-center mt-3">
                    <a href="/detail_post/{{ $result["id"] }}" class="btn btn-primary me-3">Batal</a>

                    <button type="submit" class="btn btn-success ms-3">Ubah</button>
                </div>
            </form>
        </div>
    </div>
@endsection