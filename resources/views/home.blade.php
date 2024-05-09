@extends('layout.main')

@section('fill')
<div class="card mx-auto" style="max-width: 50rem">
    <div class="card-body">
        <div class="table-responsive small fill-karyawan">
            <table class="table table-sm table-hover list-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">No</th>
                        <th scope="col" style="width: 20%;">Penulis</th>
                        <th scope="col" style="width: 20%;">Kategori</th>
                        <th scope="col" style="width: 40%;">Judul</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ ($posts->currentPage() -1) * $posts->links()->paginator->perPage() + $loop->iteration }}
                        </td>
                        <td class="text-capitalized">{{ $post->user->name }}</td>
                        <td class="text-capitalized">{{ $post->kategori->name }}</td>
                        <td class="text-capitalized">{{ substr($post["judul"], 0,30) }}</td>
                        <td>
                                <a class="btn btn-success"
                                    href="/detail_post/{{ $post["id"] }}" style="border-radius: 10px">Detail</a>
                        </td>
                        <td>
                            <div class="justify-content-center">
                                <form class="d-inline" action="/post/{{ $post["id"] }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" style="border-radius: 10px;" onclick="return confirm('Apakah anda yakin ingin menghapus data pesan dengan judul {{ $post['judul'] }} ?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 18 18">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z">
                                        </path>
                                    </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection