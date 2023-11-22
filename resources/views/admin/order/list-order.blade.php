@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card">
        <h5 class="card-header">Semua Orderan Pengguna</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Bukti Pembayaran</th>
                        <th>Produk / Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($order as $orders)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $orders->name }}</td>
                            <td>{{ $orders->adress }}</td>
                            <td>{{ $orders->phone }}</td>
                            <td>
                                <a href="/dashboard/detailpembayaran/{{$orders->id}}"><button class="btn btn-primary" style="color: white">Detail</button></a>
                            </td>
                            <td>{{ $orders->product }} / {{ $orders->category }}</td>
                            <td>
                                @if($orders['status'] == 3 || $orders['status'] == 1)
                                    <p style="color: green">Di Terima</p>
                                    @if($orders['updated_at'])
                                        <p>Tanggal Update: {{ $orders['updated_at']->format('d-m-Y') }}</p>
                                    @endif
                                @elseif($orders['status'] == 2)
                                    <p style="color: red">Di Ditolak</p>
                                @else
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('validasi', $orders->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="updated_at" value="{{ now() }}">
                                            <button type="submit" class="btn btn-primary" style="color: white; background:rgb(24, 175, 24)"> Terima </button>
                                        </form>

                                        <form action="{{ route('tolak', $orders->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="updated_at" value="{{ now() }}">
                                            <button type="submit" class="btn btn-danger" style="color: white"> Tolak </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
