@extends('layout.start')

@section('fill')
<form action="/registrasi" class="justify-content-center" method="POST">
    @csrf
    <h2 class="login-text">{{ $tittle }}</h2>
    <div class="row align-self-end my-5">
        <h6>Name</h6>
        <div class="align-self-start form-floating ps-1">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" name="name" value="{{ old('name') }}"
                autofocus required>
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
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            <label class="ps-4" for="username">Username</label>
        </div>
        <h6 class="mt-2">Password</h6>
        <div class="align-self-center form-floating ps-1">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password"
                required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label class="ps-4" for="password">Password</label>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Daftar</button>
        <a class="btn btn-danger mt-2" href="/" style="border-radius: 5px">Kembali</a>
    </div>
</form>
@endsection
