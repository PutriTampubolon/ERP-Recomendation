@extends('layouts.landing-page')
@section('content')
    <header class="py-5">
        <div class="container px-5 ">
            <div class="row gx-5">
                <div class="col-xxl-6">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
                        <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                            <div class="text-uppercase">Odoo &middot; Dolibarr &middot; SAP ERP</div>
                        </div>
                        <div class="fs-3 fw-light text-muted">Kami memberi saran</div>
                        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Penggunaan ERP
                                yang cocok untuk Perusahaan</span></h1>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
                                href="{{ route('login') }}">Bergabung
                                Sekarang!</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="#erd">Tentang ERD</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <!-- Header profile picture-->
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#odoo">
                                <img src="{{ asset('assets/image/odoo.jpg') }}" alt="" srcset=""
                                    style="max-height: 200px" class="rounded">
                            </a>

                        </div>
                        <div class="col-md-6">
                            <a href="#SAP ERP">
                                <img src="{{ asset('assets/image/Sap.jpg') }}" alt="" srcset=""
                                    style="max-height: 150px">
                            </a>

                        </div>
                    </div>

                    <div>
                        <a href="#Dolibarr">
                            <img src="{{ asset('assets/image/dolibarr.jpg') }}" alt="" srcset=""
                                style="max-width: 500px" class="mx-auto">
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-5 pb-5">
        <div class="text-center text-xxl-start">
            <div class="fs-3 fw-light text-muted" id="erd">Tentang ERD</div>

            @foreach ($erps as $erp)
                @if ($erp->id % 2 == 1)
                    <div class="row p-3 mb-5 py-5" id="{{ $erp->name }}">{{ $erp->nama }}

                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-image">
                                    <img class="rounded" src="{{ asset('assets/image/' . $erp->image) }}" alt=""
                                        srcset="" style="max-height: 300px">

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                <div class="text-uppercase">{{ $erp->name }}</div>
                            </div>
                            <p>
                                {{ $erp->description }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="row p-3 mb-3">
                        <div class="col-md-6">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                <div class="text-uppercase" id="{{ $erp->name }}">{{ $erp->name }}</div>
                            </div>
                            <p>
                                {{ $erp->description }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-image">
                                    <img class="rounded" src="{{ asset('assets/image/' . $erp->image) }}" alt=""
                                        srcset="" style="max-height: 300px">

                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        <section class=" py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Tentang Kami</span></h2>
                            <p class="lead fw-light mb-4">Penyedia layanan untuk menyarankan ERP</p>
                            <p class="text-muted">Kami menyediakan beberapa pertanyaan yang sudah kami siapkan untuk
                                dijawab. Dengan jawaban atas Pertanyaan itu, kami akan menyarankan ERP mana yang cocok untuk
                                perusahaan anda</p>
                            <div class="d-flex justify-content-center fs-2 gap-4">
                                <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
