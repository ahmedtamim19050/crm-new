<form method="POST" action="{{ url(route('deals.update',$deal->id)) }}">
    @csrf
    @method('PUT')
     

        @component('components.card')

        @component('components.card-body')
  
            @include('dashboard.deals.partials.fields')

        @endcomponent

        @component('components.card-footer')
    
            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
        @endcomponent
</form>