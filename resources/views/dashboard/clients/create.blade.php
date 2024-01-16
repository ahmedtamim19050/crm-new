@extends('layouts.default')

@section('content')

<form method="POST" action="{{route('clients.store')}}">
    @csrf
     

        @component('components.card')

        @component('components.card-body')
  
            @include('dashboard.clients.partials.fields')

        @endcomponent

        @component('components.card-footer')
       
            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
        @endcomponent
</form>

@endsection