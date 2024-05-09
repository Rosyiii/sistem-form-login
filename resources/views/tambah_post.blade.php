{{-- @dd($kategoris) --}}
@extends('layout.main')

@section('fill')
    <div class="card mx-auto" style="max-width: 50rem">
        <div class="card-body">
            <form action="/tambah_post" method="POST">
                @csrf

                <h6 class="my-3">Judul Post</h6>
                <div class="align-self-start form-floating ps-1">
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Post"
                        name="judul" value="{{ old('judul') }}" autofocus required>
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="ps-4" for="judul">Judul Post</label>
                </div>

                <h6 class="my-3">Kategori</h6>
                <div class="align-self-start form-floating ps-1">
                    <input type="text" list="dataListKategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="kategori" @error('kategori') is-invalid @enderror required>
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

                <h6 class="my-3">Isi Post</h6>
                <div class="align-self-start ps-1">
                    <textarea class="form-control @error('isi_post') is-invalid @enderror" id="isi_post"
                        name="isi_post" style="min-height: 7rem" required></textarea>
                    @error('isi_post')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center align-self-center mt-3">
                    <a href="/" class="btn btn-primary me-3">Batal</a>

                    <button type="submit" class="btn btn-primary ms-3">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection