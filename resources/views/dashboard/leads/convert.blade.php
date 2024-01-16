@extends('layouts.default')

@section('content')
<form method="POST" action="{{ url(route('leads.convert.store',$lead)) }}">
    @csrf
     

        @component('components.card')

        @component('components.card-body')
  
            @include('dashboard.leads.partials.fields')

        @endcomponent

        @component('components.card-footer')
       
            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
        @endcomponent
</form>

@endsection