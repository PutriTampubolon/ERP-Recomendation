@extends('user.layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-11">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Company Profile</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @if ($feedback != null)
                            @foreach ($feedback as $item)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $item }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        @if ($company == null)
                            <p>You have not filled in company data, click the button below to add</p>
                            <a href="/company/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-add mr-2"></i>Create Data</a>
                        @else
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mt-2">
                                        <label for="exampleInputEmail1">Name</label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="exampleInputPassword1">Email</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Address</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputEmail1">Last Update <span class="text-success">{{$company->updated_at}}</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $company->name }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $company->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $company->phone_number }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $company->address }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
