@extends('layout.start')

@section('fill')
<form action="/detail_user/{{ $result["id"] }}" class="justify-content-center" method="POST">
    @csrf
    <h2 class="login-text">{{ $tittle }}</h2>
    <div class="row align-self-end my-5">
        <h6>Name</h6>
        <div class="align-self-start form-floating ps-1">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" name="name" value="{{ old('name', $result["name"]) }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label class="ps-4" for="name">Nama</label>
        </div>
        <div class="mt-2 mb-2">
            <h6>Jabatan</h6>
            <select class="form-select form-select-sm" aria-label="Small select example" id="jabatan" name="jabatan"
                style="font-size: 16px; border-radius: 10px;">
                @foreach ($jabatans as $jabatan)
                    @if (old('jabatan') == $jabatan)
                        <option value="{{ $jabatan }}" selected>{{ $jabatan }}</option> 
                    @else
                        <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <h6>Username</h6>
        <div class="align-self-start form-floating ps-1">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username', $result["username"]) }}" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            <label class="ps-4" for="username">Username</label>
        </div>
        <a class="btn btn-danger mt-2" href="/data_user" style="border-radius: 5px">Kembali</a>
        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
    </div>
</div>
@endsection
