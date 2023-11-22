@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Ubah Produk</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update.product', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Produk</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="name" value="{{ $product->name }}"/>
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                    <select class="form-select" id="exampleFormControlSelect1" name="category_id">
                      <option hidden>Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id}}" @if($category->id === $product->category_id) selected @endif>{{ ($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar Thumbnail</label>
                    <input class="form-control" type="file"  name="thumb_img" />
                    @error('thumb_img')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Deskripsi</label>
                    <input type="text" class="form-control" name="description" value="{{ $product->description}}"/>
                    @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-email">Harga</label>
                    <input type="number" class="form-control" name="price" value="{{ $product->price }}"/>
                    @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('product') }}" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection
