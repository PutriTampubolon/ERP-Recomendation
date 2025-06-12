@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a class="btn btn-primary btn-sm" href="/erp-create"><i class="fas fa-add fa-sm fa-fw text-gray-400"></i> Add
                Erp</a>

            <div class="d-none d-sm-inline-block">
                @foreach ($erps as $item)
                    <a href="/erp/{{ $item->id }}" class=" btn btn-sm btn-primary shadow-sm"><i
                            class="fa-solid fa-gear fa-sm text-white-50"></i>
                        {{ $item->name }}</a>
                @endforeach
            </div>

        </div>
        @if ($feedback != null)
            @if ($error != null)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>The data change was not successful, here is the error.</p>
                    @foreach ($feedback as $item)
                        <li>{{ $item }}</li>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    @endforeach
                </div>
            @else
                @foreach ($feedback as $item)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $item }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif

        @endif

        @if ($erp == null)
            <!-- Content Row -->

            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">ERP Detail</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">

                            No erp yet, click the button below to add <br>
                            <a href="/erp-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-gear fa-sm text-white-50"></i>
                                Add Erp</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Content Row -->
            {{-- <div class="container row mb-4"> --}}
            <h4 class="mr-3">ERP {{ $erp->name }}</h4>

            <a href="/erp-update/{{ $erp->id }}" class=" btn btn-sm btn-success shadow-sm mb-3"><i
                    class="fa-solid fa-gear fa-sm text-white-50"></i>
                Update this Erp</a>
            <a class=" btn btn-sm btn-danger shadow-sm mb-3" type="button" data-toggle="modal"
                data-target="#exampleModal"><i class="fa-solid fa-trash fa-sm text-white-50"></i>
                Delete this Erp</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Alert</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete {{ $erp->name }} ?
                        </div>
                        <div class="modal-footer">
                            <form action="/erp/delete/{{ $erp->id }}" method="post">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- </div> --}}
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Company Size</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $erp->size }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Budget</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $erp->budget }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Implementation date
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $erp->implementation }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-calendar-days fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Deployment</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $erp->deployment }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-cloud fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">ERP Detail</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <img src="{{ asset('assets/image/' . $erp->image) }}" alt="" srcset=""
                                style="max-height: 300px">
                            <h6 class="mt-3 mb-3">
                                {{ $erp->description }}
                            </h6>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <!-- Content Column -->
                    <div class="col-lg-12 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Moduls</h6>
                            </div>
                            <div class="card-body">
                                {{-- @foreach ($erp->moduls as $item)
                                    <h4 class="small font-weight-bold">{{ $item->deskripsi }} <span
                                            class="float-right"><i class="fa-solid fa-check"></i></span></h4>
                                @endforeach --}}
                            </div>
                        </div>



                    </div>

                    <div class="col-lg-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Company Types</h6>
                            </div>
                            <div class="card-body">
                                {{-- @foreach ($erp->types as $item)
                                    <h4 class="small font-weight-bold">{{ $item->deskripsi }} <span
                                            class="float-right"><i class="fa-solid fa-check"></i></span></h4>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
@endsection
