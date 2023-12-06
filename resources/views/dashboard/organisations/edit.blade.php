@extends('layouts.default')

@section('content')

    <form method="POST" action="{{ route('organisations.update',$organisation) }}">
        @csrf
        @method('put')


        @component('components.card')
            @component('components.card-body')
                @include('dashboard.organisations.partials.fields')
            @endcomponent

            @component('components.card-footer')
                <a href="" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            @endcomponent
        @endcomponent
    </form>

@endsection
