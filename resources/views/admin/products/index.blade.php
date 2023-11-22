@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card">
        <h5 class="card-header">Daftar Produk</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Thumbnail Image</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name}}</td>
                            <td>
                                <img src="{{ asset('storage/images/'. $product->thumb_img) }}"width="100px" alt="">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <form method="POST" action="{{ route('delete.product', $product->id) }}" class="d-flex">
                                    <a class="btn btn-success me-1" href="{{ route('edit.product', $product->id) }}"><i class="bx bx-edit-alt me-1"></i> Ubah</a>

                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ms-1" type="submit"><i
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
