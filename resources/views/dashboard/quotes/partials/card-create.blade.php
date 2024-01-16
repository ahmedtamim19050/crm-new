<form method="POST" action="{{ url(route('quotes.store')) }}">
    @csrf
     

        @component('components.card')

        @component('components.card-body')
  
            @include('dashboard.quotes.partials.fields')

        @endcomponent

        @component('components.card-footer')

            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
        @endcomponent
</form>