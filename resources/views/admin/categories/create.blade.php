@extends('admin.layout.dashboard')

@section('dashboard')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Product Category</h5>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.store.category')}}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Catgeory Name</label>
                    <input type="text" class="form-control" placeholder="Gadget" name="name"/>
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

                <button type="submit" class="btn btn-primary" style="background-color: #AEDEFC; color: black;">Submit</button>
            </form>
        </div>
    </div>
@endsection
