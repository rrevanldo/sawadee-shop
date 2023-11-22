@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('update.category', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Category Name</label>
                    <input type="text" class="form-control" placeholder="Toys" name="name" value="{{ $category->name }}" />
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Thumbnail Category</label>
                    <input class="form-control" type="file"  name="thumb_img" />
                    @error('thumb_img')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('category') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-secondary" style="background-color: #AEDEFC; color: black;">Update</button>
            </form>
        </div>
    </div>
@endsection

{{-- action="/category/update/{{ $category['id'] }}" --}}
