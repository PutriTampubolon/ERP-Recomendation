@extends('user.layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Erp</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">3 Erp</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            @foreach ($erps as $erp)
                <div class="col-xl-3 col-md-6 mb-4" onclick="window.location.href='/erp_user/{{$erp->id}}'">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        {{ $erp->name }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $erp->implementation }}</div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('assets/image/' . $erp->image) }}" alt="" srcset=""
                                        style="max-height: 50px" class="rounded">
                                    {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            {{-- erps_result --}}
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penggunaan ERP</h6>
                        <div class="dropdown no-arrow">
                            <a href="/erp_report" class="btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-eye mr-2"></i>Selengkapnya</a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @if (count($erps_result) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Created Date</th>
                                            <th>Erp</th>
                                            <th>Erp Image</th>
                                            <th>Erp Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($erps_result as $erp)
                                            <tr>
                                                <td>{{ $erp->created_at }}</td>
                                                <td>{{ $erp->erp->name }}</td>
                                                <td>
                                                    <p>{{ $erp->erp->nama }}</p>
                                                    <img src="{{ asset('assets/image/' . $erp->erp->image) }}"
                                                        alt="" srcset="" style="max-height: 100px">
                                                </td>
                                                <td>
                                                    <a href="{{ $erp->erp->link }}">{{ $erp->erp->link }}</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h6>You have never used the recommended ERP, follow the steps below to do so.</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    @if ($owner == null || $owner->phone_number == 0)
                                        <div class="card bg-warning">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-light">Owner Profile</h5>
                                                <p class="card-text text-light">Profile data is incomplete, complete it
                                                    first by
                                                    clicking the button below</p>
                                                <a href="/owner/create" class="btn btn-outline-primary">Complete Data</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card bg-success">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-light">Owner Profile</h5>
                                                <p class="card-text text-light">Profile data is complet, to update or delete
                                                    profile data
                                                    clic the button below</p>
                                                <a href="/owner" class="btn btn-outline-primary">See Profile</a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-4">
                                    @if ($company == null)
                                        <div class="card bg-warning">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-light">Company Profile</h5>
                                                <p class="card-text text-light">Company data is incomplete, complete it
                                                    first by
                                                    clicking the button below</p>
                                                <a href="/company/create" class="btn btn-outline-primary">Complete Data</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card bg-success">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-light">Company Profile</h5>
                                                <p class="card-text text-light">Company data is complete, to update or
                                                    delete profile data
                                                    clic the button below</p>
                                                <a href="/company" class="btn btn-outline-primary">See Profile</a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-4">
                                    @if ($company != null && $owner != null && $owner->phone_number != 0)
                                        <div class="card bg-success">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-light">ERP Recomendation</h5>
                                                <p class="card-text text-light">You can use ERP Recomendation by clicking
                                                    button below</p>
                                                <a href="/erp_recomendation" class="btn btn-outline-primary">ERP
                                                    Recomendation</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card bg-secondary">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-light">ERP Recomendation</h5>
                                                <p class="card-text text-light">You cannot use erp-recommendation before you
                                                    complete the data profile</p>
                                                <a href="" class="btn btn-outline-primary">ERP
                                                    Recomendation</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kelengkapan Profile</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card shadow">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Company profile</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if ($company == null)
                                            <i class="fa-solid fa-xmark fa-sm fa-fw text-danger"></i>
                                        @else
                                            <i class="fas fa-check fa-sm fa-fw text-success"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                @if ($company == null)
                                    <span>The Company profile has not been filled in, click the button below to fill
                                        in</span> <br>
                                    <a href="/company" class="btn btn-sm btn-primary shadow-sm"><i
                                            class="fa-solid fa-add mr-2"></i>Profile</a>
                                @else
                                    <p>Nama : {{ $company->name }}</p>
                                    <p>Email : {{ $company->email }}</p>
                                    <p>Phone : {{ $company->phone_number }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Owner profile</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (Auth::user()->owner == null)
                                            <i class="fa-solid fa-xmark fa-sm fa-fw text-danger"></i>
                                        @else
                                            <i class="fas fa-check fa-sm fa-fw text-success"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                @if (Auth::user()->owner == null)
                                    <span>The owner profile has not been filled in, click the button below to fill in</span>
                                    <br>
                                    <a href="/owner" class="btn btn-sm btn-primary shadow-sm"><i
                                            class="fa-solid fa-add mr-2"></i>Profile</a>
                                @else
                                    <p>Nama : {{ Auth::user()->owner->name }}</p>
                                    <p>Email : {{ Auth::user()->owner->email }}</p>
                                    <p>Phone : {{ Auth::user()->owner->phone_number }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
