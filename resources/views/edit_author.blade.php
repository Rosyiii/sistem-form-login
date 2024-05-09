@extends('layout.start')

@section('fill')
<form action="/edit_author/{{ $result['id'] }}" class="justify-content-center" method="POST">
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
                    @if ($result["jabatan"] == $jabatan)
                        <option value="{{ $jabatan }}" selected>{{ $jabatan }}</option>
                    @elseif (old('jabatan') == $jabatan)
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
        <h5 class="mt2">
            Ganti Password
        </h5>
        <div class="form-check" style="padding-left: 40px;">
            <input class="form-check-input" type="checkbox" id="ganti_password" name="ganti_password" onchange="gantiPassword()">
            <label class="form-check-label" for="ganti_password">
                Ganti Password
            </label>
        </div>

        @can('admin')
        <div id="formPassword" style="display: none;">
            <h6 class="mt-2">Password</h6>
            <div class="align-self-center form-floating ps-1">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label class="ps-4" for="password">Password</label>
            </div>
        </div>
        @endcan

        @cannot('admin')
        <div id="formPassword" style="display: none;">
            <h6 class="mt-2">Password Saat ini</h6>
            <div class="align-self-center form-floating ps-1">
                <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" placeholder="Password Saat ini" name="old_password">
                @error('old_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label class="ps-4" for="password">Password Saat ini</label>
            </div>

            <h6 class="mt-2">Password Baru</h6>
            <div class="align-self-center form-floating ps-1">
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Password Saat ini" name="new_password">
                @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label class="ps-4" for="password">Password Baru</label>
            </div>
        </div>
        @endcannot
        <button class="btn btn-primary mt-3" type="submit">Edit</button>
        @if (auth()->user()->jabatan == 'Admin')
            <a class="btn btn-danger mt-2" href="/data_author" style="border-radius: 5px">Kembali</a>
        @else
            <a class="btn btn-danger mt-2" href="/" style="border-radius: 5px">Kembali</a>
        @endif
    </div>
</form>
@endsection
