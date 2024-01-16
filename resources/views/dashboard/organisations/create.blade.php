@extends('layouts.default')

@section('content')

    <form method="POST" action="{{ route('organisations.store') }}">
        @csrf


        @component('components.card')
            @component('components.card-body')
                @include('dashboard.organisations.partials.fields')
            @endcomponent

            @component('components.card-footer')

                <button type="submit" class="btn btn-primary">Save</button>
            @endcomponent
        @endcomponent
    </form>

@endsection
