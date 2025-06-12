@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div>

                            <h6 class="m-0 font-weight-bold text-primary mb-2">Function Area</h6>
                            <a href="/function-area-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-gear fa-sm text-white-50"></i>
                                Add Function Area</a>
                        </div>

                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @if (count($erp) < 1)
                            No erp yet, click the button below to add <br>
                            <a href="/erp-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-gear fa-sm text-white-50"></i>
                                Add Erp</a>
                        @else
                            @if (count($function_area) < 1)
                                No Function Area yet, click the button below to add <br>
                                <a href="/function-area-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                        class="fa-solid fa-gear fa-sm text-white-50"></i>
                                    Add Function Area</a>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Function Area Name</th>
                                                @foreach ($erp as $item)
                                                    <th>Bobot {{ $item->name }}</th>
                                                @endforeach
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $iteration = 0;
                                            @endphp
                                            @foreach ($function_area as $function_are)
                                                <tr>
                                                    <td>{{ $function_are->name }}</td>
                                                    @foreach ($erp as $item)
                                                        <td>{{ $item->functionarea[$iteration]->pivot->bobot }}</td>
                                                    @endforeach
                                                    @php
                                                        $iteration++;
                                                    @endphp
                                                    <td>
                                                        <a href="/function-area-update/{{ $function_are->id }}"
                                                            class=" btn btn-sm btn-primary shadow-sm"><i
                                                                class="fa-solid fa-gear fa-sm text-white-50"></i>
                                                            Update Function Area</a>
                                                        <a href="/function-area-delete/{{ $function_are->id }}"
                                                            class=" btn btn-sm btn-danger shadow-sm"><i
                                                                class="fa-solid fa-trash fa-sm text-white-50"></i>
                                                            Delete Function Area</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
