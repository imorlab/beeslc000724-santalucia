@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 ">

                <img src="{{ asset('assets/img/despegamos.png') }}" style="max-width: 450px;"
                    class="img-fluid ms-auto me-auto d-block mb-5" />
            </div>


            <div class="col-lg-10">

                <div class="row">

                    @livewire('live-component')

                </div>

                <div class="col-12 text-center text-success mt-4">
                    #Convención2024
                </div>

            </div>


        </div>
    </div>
@endsection

@push('scripts')
@endpush
