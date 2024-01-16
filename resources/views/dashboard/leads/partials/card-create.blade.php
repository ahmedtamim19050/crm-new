<form method="POST" action="{{ url(route('leads.store')) }}">
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