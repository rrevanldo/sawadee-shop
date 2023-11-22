@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card">
        <h5 class="card-header">List Kategori</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Gambar Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img src="{{ asset('storage/images/'. $category->thumb_img) }}"width="100px" alt="">
                            </td>
                            <td>
                                <form method="POST" action="{{ route('delete.category', $category->id) }}" class="d-flex">
                                    <a class="btn btn-success d-flex align-items-center me-1" href="{{ route('edit.category', $category->id) }}"><i class="bx bx-edit-alt me-1"></i>Ubah</a>

                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger d-flex align-items-center ms-1" type="submit"><i
                                            class="bx bx-trash me-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
