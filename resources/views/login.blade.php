@extends('layout.start')

@section('fill')
@if (session()->has('loginEror'))
<div class="alert alert-warning alert-dismissible fade show alert-close" role="alert">
    {{ session('loginEror') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-warning alert-dismissible fade show alert-close text-uppercase" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form action="/login" class="justify-content-center" method="POST">
    @csrf
    <h2 class="text-center">{{ $tittle }}</h2>
    <div class="row align-self-end mt-5">
        <h6>Username</h6>
        <div class="align-self-start form-floating ps-1">
            <input type="username" class="form-control" id="username" placeholder="Username" name="username" autofocus
                required>
            <label class="ps-4" for="username">Username</label>
        </div>
        <h6 class="mt-2">Password</h6>
        <div class="align-self-center form-floating ps-1">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <label class="ps-4" for="password">Password</label>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary" type="submit" name="login">Sign in</button>
    </div>
</form>
@endsection

