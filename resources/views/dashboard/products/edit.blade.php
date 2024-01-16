@extends('layouts.default')

@section('content')
    <form method="POST" action="{{ route('products.update',$product) }}">
        @csrf
        @method('put')
        <div class=" mb-4">
            <div class="card-body">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
            
                            @include('dashboard.products.partials.fields')
                 

            </div>
            @component('components.card-footer')

                <button type="submit" class="btn btn-primary">Save</button>
            @endcomponent

        </div>
    </form>
@endsection