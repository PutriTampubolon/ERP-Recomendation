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

                            <h6 class="m-0 font-weight-bold text-primary mb-2">Moduls</h6>
                            <a href="/modul-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-gear fa-sm text-white-50"></i>
                                Add Modul</a>
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
                            @if (count($moduls) < 1)
                                No Moduls yet, click the button below to add <br>
                                <a href="/modul-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                        class="fa-solid fa-gear fa-sm text-white-50"></i>
                                    Add Modul</a>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Modul Name</th>
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
                                            @foreach ($moduls as $modul)
                                                <tr>
                                                    <td>{{ $modul->name }}</td>
                                                    @foreach ($erp as $item)
                                                        @if (count($item->modul) < 1)
                                                            <td>None</td>
                                                        @else
                                                            <td>{{ $item->modul[$iteration]->pivot->bobot }}</td>
                                                        @endif
                                                    @endforeach
                                                    @php
                                                        $iteration++;
                                                    @endphp
                                                    <td>
                                                        <a href="/modul-update/{{ $modul->id }}"
                                                            class=" btn btn-sm btn-primary shadow-sm"><i
                                                                class="fa-solid fa-gear fa-sm text-white-50"></i>
                                                            Update Modul</a>
                                                        <a href="/modul-delete/{{ $modul->id }}"
                                                            class=" btn btn-sm btn-danger shadow-sm"><i
                                                                class="fa-solid fa-trash fa-sm text-white-50"></i>
                                                            Delete Modul</a>
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
