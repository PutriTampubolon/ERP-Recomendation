@extends('user.layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Company -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Owner Profile</h1>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-11">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Owner Profile</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/owner/update/{{$owner->id}}" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="nama" name="name" value="{{$owner->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="gender" value="{{$owner->gender}}">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Don't want to tell</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                    name="address">{{$owner->address}}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                    value="{{ $owner->email }}">
                                <small id="emailHelp" class="form-text text-muted">We will not
                                    share your email with anyone</small>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inlineFormInputGroup">Phone Number</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+62</div>
                                    </div>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="inlineFormInputGroup" name="phone_number" placeholder="821...."
                                        value="{{$owner->phone_number}}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    id="date_of_birth" name="date_of_birth" value="{{$owner->date_of_birth}}">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" value="{{$owner->position}}">
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                    id="validatedCustomFile" name="foto" value="{{ old('foto') }}">
                                <label class="custom-file-label" for="validatedCustomFile">Select Image</label>
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
