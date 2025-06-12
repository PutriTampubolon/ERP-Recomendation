@extends('user.layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-11">
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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mt-2">
                                    <label for="exampleInputEmail1">Name</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Gender</label>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="exampleInputPassword1">Address</label>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="exampleInputPassword1">Email</label>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Phone Number</label>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="exampleInputPassword1">Date of Birth</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Posistion</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Last Update <span
                                            class="text-success">{{ $owner->updated_at }}</span> </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->name }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->gender }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->address }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->email }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->phone_number }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->date_of_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" disabled value="{{ $owner->position }}">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <img src="{{ asset('assets/image/'.$owner->image) }}" class="rounded" alt=""
                                    srcset="" style="max-width:280px">

                                <form action="/owner/update/profile/{{ $owner->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($owner->image == null)
                                        <p class="mt-2">Add Profile Image</p>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                required name="foto">
                                            <label class="custom-file-label" for="validatedCustomFile">Select
                                                Image</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Add Image</button>
                                    @else
                                        <p class="mt-2">Update Profile Image</p>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                required name="foto">
                                            <label class="custom-file-label" for="validatedCustomFile">Select
                                                Image</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
