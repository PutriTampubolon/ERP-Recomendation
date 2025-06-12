@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create Function Area</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/function-area/store" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                                <div class="form-group">
                                    <label for="nama">Function Area Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="nama" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @foreach ($erp as $item)
                                    <input type="hidden" name="erp_id{{$item->id}}" value="{{$item->id}}">
                                    <div class="form-group">
                                        <label for="bobot{{$item->name}}">Bobot {{$item->name}}</label>
                                        <div class="input-group mb-2">
                                            <input type="number" required
                                                class="form-control @error('bobot{{$item->name}}') is-invalid @enderror"
                                                id="bobot{{$item->name}}" name="bobot{{$item->name}}"
                                                value="{{ old('bobot'.$item->name)}}">
                                            @error('bobot{{$item->name}}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            <button type="submit" class="btn btn-primary btn-block">Create Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
