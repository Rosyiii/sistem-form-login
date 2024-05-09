@extends('layout.main')

@section('fill')
    <div class="card mx-auto" style="max-width: 50rem">
        <div class="card-body">
            <form action="/tambah_kategori" method="POST">
                @csrf

                <h6 class="my-3">Judul Kategori</h6>
                <div class="align-self-start form-floating ps-1">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Judul Kategori"
                        name="name" autofocus required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="ps-4" for="name">Judul Kategori</label>
                </div>
                <div class="d-flex justify-content-center align-self-center mt-3">
                    <a href="/data_kategori" class="btn btn-primary me-3">Batal</a>

                    <button type="submit" class="btn btn-primary ms-3">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection