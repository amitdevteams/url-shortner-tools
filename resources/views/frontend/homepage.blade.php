@extends('layouts.index')

@section('css_class', 'frontend home')
@section('content')
    <div class="pt-16 sm:pt-28">
        @if (! auth()->check() and ! Config::get('urlhub.public_site'))
            <div class="flex flex-wrap md:justify-center">
                <div class="w-full md:w-8/12 font-thin text-5xl text-slate-600 text-center welcome-msg">
                    {{__('Please login to shorten URLs')}}</div>
            </div>
            <div class="flex flex-wrap md:justify-center mt-12">
                <div class="w-full md:w-7/12">
                    @include('partials/messages')</div>
            </div>
        @else
            <div class="flex flex-wrap md:justify-center">
                <br><br>
                <h1 class="text-center" style="color: blue; font-weight: 700;">Simple URL shortener Tools</h1>
                </h1>
            </div>
            <div class="flex flex-wrap justify-center mt-12 px-4 lg:px-0">
                <div class="w-full max-w-4xl">
                    <form method="post" action="{{ route('su_create')}}" class="mb-4 mt-12" id="formUrl">
                    @csrf
                    <div class="input-group col-md-6 mt-5" style="margin-left: 352px;">
                        <input type="text" name="long_url" required class="form-control form-control-lg" placeholder="Shorten your link" autofocus style="height:66px;">
                        <span class="input-group-btn"><button type="submit" style="height: 66px;" class="btn btn-primary input-lg g-recaptcha"><strong><i class="fa fa-cloud-download" aria-hidden="true"></i> submit</strong></button></span>
                    </div>
                    <br />
                        <br>
                    </form>
                    @include('partials/messages')
                </div>
            </div>
        @endif
    </div>
@endsection
