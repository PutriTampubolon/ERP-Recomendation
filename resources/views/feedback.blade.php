@extends('layouts.landing-page')

@section('content')
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <!-- Experience Section-->
            <section>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-0">Feedback User</h2>

                </div>
                @foreach ($feedbacks as $feedback)
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                    <div class="bg-light p-4 rounded-4">
                                        <div class="text-primary fw-bolder mb-2">{{ $feedback->created_at }}</div>
                                        <div class="small fw-bolder">{{ $feedback->user->name }}</div>
                                        <div class="small text-muted">
                                            @for ($i = 0; $i < $feedback->rate; $i++)
                                                <i class="fa-solid fa-star" style="color: #f9e510;"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div>{{$feedback->feedback}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </section>
        </div>
    </div>
@endsection
