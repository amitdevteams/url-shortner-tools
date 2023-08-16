<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<style>
    .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
    .btn-icon-detail {
    margin-right: 1rem;
    border-radius: 0.25rem;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    --tw-text-opacity: 1;
    color: rgb(39 49 68 / var(--tw-text-opacity));
    --tw-bg-opacity: 1;
    background-color: rgb(232 235 242 / var(--tw-bg-opacity));
}


</style>
@extends('layouts.index')

@section('css_class', 'frontend view_short')

@section('content')

    <div class="container" style="color: #e5e7eb;">
        <br>
        <b><span class="font-bold mt-5" style="margin-left: 37px; font-size: 32px; color: black;">Build software better,
                together</span></b>
        <ul>
            <li class="d-inline-block pr-4">
                <i class="far fa-calendar-alt" style="color: black;"></i>
                <i style="color: black;">{{ $url->created_at->toDayDateTimeString() }}</i>
            </li>
            <li class="d-inline-block pr-4 mt-4 mt-lg-0" style="color: black;">
                <i class="fas fa-signal"></i>
                <i>
                    <span title="{{ number_format($url->clicks) }}" style="color: black;" class="font-weight-bold">
                        {{ compactNumber($url->clicks) }}
                    </span>
                </i>
                {{ __('Total engagements') }}
            </li>
        </ul>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div>
                                        <img class="qrcode h-fit" src="{{ $qrCode->getDataUri() }}" alt="QR Code">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span><i class="far fa-copy btn-icon-detail" style="font-size: 34px; margin-top: -30px; margin-left: 32px;"></i></span>
                                                <br>
                                                <br>
                                                <span class="font-bold text-indigo-700 text-xl sm:text-2xl">
                                                    <a style="font-size: 20px; color:indigo;" href="{{ $url->short_url }}" target="_blank" id="copy">
                                                        {{urlDisplay($url->short_url, scheme: false)}}
                                                    </a>
                                                </span>
                                                <br>
                                                <br>
                                                <i class="far fa-level-down-alt" style="color: black;"></i>
                                                <div class="break-all max-w-2xl mt-2">
                                                   <a href="{{ $url->destination }}" target="_blank" rel="noopener noreferrer" class="redirect-anchor">{{ urlDisplay($url->destination, limit: 80) }}</a>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-5">
                                                <span class="font-bold text-indigo-700 text-xl sm:text-2xl">
                                                    <a href="{{ $url->short_url }}" target="_blank" id="copy">
                                                        {{urlDisplay($url->short_url, scheme: false)}}
                                                    </a>
                                                </span>
                                            </div> --}}
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br>
    </div>

@endsection
