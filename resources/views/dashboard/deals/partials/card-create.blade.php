<form method="POST" action="{{route('deals.store')}}">
    @csrf
     

        @component('components.card')

        @component('components.card-body')
  
            @include('dashboard.deals.partials.fields')

        @endcomponent

        @component('components.card-footer')

            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
        @endcomponent
</form>