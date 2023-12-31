@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Product</h5>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.store.product')}}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Product Name</label>
                    <input type="text" class="form-control" placeholder="Plush doll" name="name"/>
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Category</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="category_id">
                      <option selected hidden>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ ($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Thumbnail Image</label>
                    <input class="form-control" type="file"  name="thumb_img" />
                    @error('thumb_img')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Description</label>
                    <input type="text" class="form-control" placeholder="this is very amazing product" name="description" />
                    @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-email">Price</label>
                    <input type="number" class="form-control" placeholder="Rp. 250.000 (just put the number)" name="price"/>
                    @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-secondary" style="background-color: #AEDEFC; color: black;">Submit</button>
            </form>
        </div>
    </div>
@endsection
