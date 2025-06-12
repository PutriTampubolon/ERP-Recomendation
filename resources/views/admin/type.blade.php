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

                            <h6 class="m-0 font-weight-bold text-primary mb-2">Type</h6>
                            <a href="/type-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                class="fa-solid fa-gear fa-sm text-white-50"></i>
                            Add Type</a>
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
                            @if (count($type) < 1)
                                No Type yet, click the button below to add <br>
                                <a href="/type-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                        class="fa-solid fa-gear fa-sm text-white-50"></i>
                                    Add Type</a>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Type Name</th>
                                                <th>Value</th>
                                                {{-- <th>Bobot</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($type as $type)
                                                <tr>
                                                    <td>
                                                        {{$type->name}}
                                                    </td>
                                                    <td>
                                                        {{$type->erp->name}}
                                                    </td>
                                                    {{-- <td>
                                                        {{$type->bobot}}
                                                    </td> --}}
                                                    <td>
                                                        <a href="/type-update/{{$type->id}}"
                                                            class=" btn btn-sm btn-primary shadow-sm"><i
                                                                class="fa-solid fa-gear fa-sm text-white-50"></i>
                                                            Update Type</a>
                                                        <a href="/type-delete/{{$type->id}}" class=" btn btn-sm btn-danger shadow-sm"><i
                                                                class="fa-solid fa-trash fa-sm text-white-50"></i>
                                                            Delete Type</a>
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
