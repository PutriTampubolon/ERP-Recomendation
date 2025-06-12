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

                            <h6 class="m-0 font-weight-bold text-primary mb-2">User Need</h6>
                            <a href="/user-need-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-gear fa-sm text-white-50"></i>
                                Add User Need</a>
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
                            @if (count($user_needs) < 1)
                                No User Need yet, click the button below to add <br>
                                <a href="/user-need-create" class=" btn btn-sm btn-primary shadow-sm"><i
                                        class="fa-solid fa-gear fa-sm text-white-50"></i>
                                    Add User Need</a>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>User Need Name</th>
                                                <th>Value</th>
                                                {{-- <th>Bobot</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user_needs as $user_need)
                                                <tr>
                                                    <td>
                                                        {{$user_need->name}}
                                                    </td>
                                                    <td>
                                                        {{$user_need->erp->name}}
                                                    </td>
                                                    {{-- <td>
                                                        {{$user_need->bobot}}
                                                    </td> --}}
                                                    <td>
                                                        <a href="/user-need-update/{{$user_need->id}}"
                                                            class=" btn btn-sm btn-primary shadow-sm"><i
                                                                class="fa-solid fa-gear fa-sm text-white-50"></i>
                                                            Update User Need</a>
                                                        <a href="/user-need-delete/{{$user_need->id}}" class=" btn btn-sm btn-danger shadow-sm"><i
                                                                class="fa-solid fa-trash fa-sm text-white-50"></i>
                                                            Delete User Need</a>
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
