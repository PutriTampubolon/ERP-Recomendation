@extends('user.layout.layout')

@section('content')
    <div class="container-fluid">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button"
                    role="tab" aria-controls="pills-home" aria-selected="true">Owner Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Company
                    Profile</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!-- Owner Profile -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">

                    <h1 class="h3 mb-0 text-gray-800">Owner Profile</h1>
                    <div class="d-none d-sm-inline-block ">
                        @if (Auth::user()->owner == null)
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                type="button" data-toggle="modal" data-target="#ubahmodalaasdas"><i
                                    class="fa-solid fa-pen mr-2"></i>Update Data</a>
                        @else
                            <a href="/owner/edit/{{ $owner->id }}"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-pen mr-2"></i>Update Data</a>
                        @endif


                        @if (Auth::user()->owner == null)
                            <a href="#" class="btn btn-sm btn-danger shadow-sm"><i
                                    class="fa-solid fa-trash mr-2"></i>Delete Data</a>
                        @else
                            <a href="#" class="btn btn-sm btn-danger shadow-sm" type="button" data-toggle="modal"
                                data-target="#deleteModalProfile"><i class="fa-solid fa-trash mr-2"></i>Delete Data</a>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModalProfile" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/owner/destroy/{{ $owner->id }}" method="post">
                                                @csrf
                                                <h5>Are you sure you want to delete the data?</h5>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
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
                                @if ($feedback != null)
                                    @if ($error != null)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <p>The data change was not successful, here is the error.</p>
                                            @foreach ($feedback as $item)
                                                <li>{{ $item }}</li>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            @endforeach
                                        </div>
                                    @else
                                        @foreach ($feedback as $item)
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ $item }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif

                                @endif
                                @if (Auth::user()->owner == null)
                                    <p>You have not filled in the data owner, click the button below to add</p>
                                    <a href="/owner/create"
                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fa-solid fa-add mr-2"></i>Create Datas</a>
                                @else
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
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $owner->gender }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $owner->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled value="{{ $owner->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $owner->phone_number }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $owner->date_of_birth }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $owner->position }}">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{ asset('assets/image/' . $owner->image) }}" class="rounded"
                                                alt="" srcset="" style="max-width:280px">

                                            <form action="/owner/update/profile/{{ $owner->id }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @if ($owner->image == null)
                                                    <p class="mt-2">Add Profile Image</p>
                                                    <div class="custom-file mb-3">
                                                        <input type="file" class="custom-file-input"
                                                            id="validatedCustomFile" required name="foto">
                                                        <label class="custom-file-label" for="validatedCustomFile">Select
                                                            Image</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Add
                                                        Image</button>
                                                @else
                                                    <p class="mt-2">Update Profile Image</p>
                                                    <div class="custom-file mb-3">
                                                        <input type="file" class="custom-file-input"
                                                            id="validatedCustomFile" required name="foto">
                                                        <label class="custom-file-label" for="validatedCustomFile">Select
                                                            Image</label>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">Update</button>
                                                @endif

                                            </form>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- Company -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Company Profile</h1>
                    <div class="d-none d-sm-inline-block ">
                        @if ($company == null)
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                type="button" data-toggle="modal" data-target="#ubahmodalaasdas"><i
                                    class="fa-solid fa-pen mr-2"></i>Update Data</a>
                        @else
                            <a href="/company/edit/{{$company->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                ><i
                                    class="fa-solid fa-pen mr-2"></i>Update Data</a>
                        @endif


                        @if ($company == null)
                            <a href="#" class="btn btn-sm btn-danger shadow-sm"><i
                                    class="fa-solid fa-trash mr-2"></i>Delete Data</a>
                        @else
                            <a href="#" class="btn btn-sm btn-danger shadow-sm" type="button" data-toggle="modal"
                                data-target="#deleteModal"><i class="fa-solid fa-trash mr-2"></i>Delete Data</a>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/company/destroy/{{ $company->id }}" method="post">
                                                @csrf
                                                <h5>Are you sure you want to clear data?</h5>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
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
                                    @if ($error != null)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <p>The data change was not successful, here is the error.</p>
                                            @foreach ($feedback as $item)
                                                <li>{{ $item }}</li>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            @foreach ($feedback as $item)
                                                {{ $item }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                                @if ($company == null)
                                    <p>You have not filled in company data, click the button below to add</p>
                                    <a href="/company/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                        ><i
                                            class="fa-solid fa-add mr-2"></i>Create Data</a>
                                    <!-- Modal -->
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
                                                <label for="exampleInputEmail1">Last Update <span
                                                        class="text-success">{{ $company->updated_at }}</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <form>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $company->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $company->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="+62{{ $company->phone_number }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" disabled
                                                        value="{{ $company->address }}">
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
        </div>

    </div>

    <script>
        var formTambahData = document.getElementById("formTambahData");
        var errorNama = document.getElementById("errorNama");
        var nama = document.getElementById("nama");

        function validasiNama() {
            if (nama.value == '') {
                nama.setCustomValidity('Nama harus diisi');
                errorNama.textContent = 'Nama harus diisi';
            }
        }

        nama.addEventListener('input', validasiNama);
        // emailInput.addEventListener('input', validateEmail);

        // Menambahkan event listener pada peristiwa "submit" form
        formTambahData.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault(); // Mencegah pengiriman form jika tidak valid
                // Anda dapat menambahkan logika lain di sini, misalnya menampilkan pesan kesalahan secara keseluruhan
            }
        });
    </script>
@endsection
