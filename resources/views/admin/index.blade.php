@extends('admin.layout.layout')

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
                <div class="col-xl-3 col-md-6 mb-4" onclick="window.location.href='/erp/{{ $erp->id }}'">
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
                        <h6 class="m-0 font-weight-bold text-primary">User Report</h6>
                        <div class="dropdown no-arrow">
                            <a href="/user-report" class="btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-eye mr-2"></i>Selengkapnya</a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @if (count($users) < 1)
                            No users yet, click the button below to add <br>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Phone Number</th>
                                            <th>Company Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $user->owner->name }}
                                                </td>
                                                <td>
                                                    {{ $user->owner->email }}
                                                </td>
                                                <td>
                                                    {{ $user->owner->phone_number }}
                                                </td>
                                                <td>
                                                    {{ $user->company->phone_number }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
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
                        <h6 class="m-0 font-weight-bold text-primary">Faq</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    @foreach ($faqs as $faq)
                        <div class="card-body">
                            <div class="card shadow">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">{{$faq->question}}</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    {{$faq->answer}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection
