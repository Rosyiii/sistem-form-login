<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Post
    </a>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item {{ ($tittle === "Home" ) ? 'active' : '' }}" href="/">Data Post</a></li>
        <li><a class="dropdown-item {{ ($tittle === "Tambah Post" ) ? 'active' : '' }}" href="/tambah_post">Tambah
                Post</a></li>
    </ul>
</li>

@can('admin')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Kategori
    </a>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item {{ ($tittle === "Data Kategori" ) ? 'active' : '' }}" href="/data_kategori">Data Kategori</a></li>
        <li><a class="dropdown-item {{ ($tittle === "Tambah Kategori" ) ? 'active' : '' }}" href="/tambah_kategori">Tambah
                Kategori</a></li>
    </ul>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        User
    </a>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item {{ ($tittle === "Data Author" ) ? 'active' : '' }}" href="/data_author">Data Author</a></li>
        <li><a class="dropdown-item {{ ($tittle === "Registrasi" ) ? 'active' : '' }}" href="/registrasi">Tambah
                User</a></li>
    </ul>
</li>
@endcan

@cannot('admin')
<li class="nav-item">
    <a href="/edit_author/{{ auth()->user()->id }}" class="nav-link"> Edit Author</a>
</li>
@endcannot

<li class="nav-item">
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="dropdown-item btn btn-secondary">Keluar</button>
    </form>
</li>
