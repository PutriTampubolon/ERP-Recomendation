@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update {{$erp->name}}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/erp/update/{{$erp->id}}" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="nama" name="name" value="{{ $erp->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Link Download</label>
                                        <input type="text" class="form-control @error('link') is-invalid @enderror"
                                            id="link" aria-describedby="emailHelp" name="link"
                                            value="{{ $erp->link }}">
                                        @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="budget">Budget</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control @error('budget') is-invalid @enderror"
                                                id="budget" name="budget" value="{{ $erp->budget }}">
                                            @error('budget')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                            name="description">{{ $erp->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="implementation">Implementation</label>
                                        <div class="input-group mb-2">
                                            <input type="text"
                                                class="form-control @error('implementation') is-invalid @enderror"
                                                id="implementation" name="implementation"
                                                value="{{ $erp->implementation }}">
                                            @error('implementation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control @error('size') is-invalid @enderror"
                                                id="size" name="size" value="{{ $erp->size }}">
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="deployment">Deployment</label>
                                        <div class="input-group mb-2">
                                            <input type="text"
                                                class="form-control @error('deployment') is-invalid @enderror"
                                                id="deployment" name="deployment" value="{{ $erp->deployment }}">
                                            @error('deployment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <label for="">Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                            id="validatedCustomFile" name="image" value="{{ old('image') }}">
                                        <label class="custom-file-label" for="validatedCustomFile">Select Image</label>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>




                            <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
