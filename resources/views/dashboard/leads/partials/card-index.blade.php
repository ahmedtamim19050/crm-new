<table class="table mb-0 card-table table-hover">
    <thead>
    <tr>
        <th scope="col">Created</th>
        <th scope="col">Title</th>
        <th scope="col">Label</th>
        <th scope="col">Value</th>
        <th scope="col">Customer</th>
        <th scope="col">Organisation</th>
        <th scope="col">Contact Person</th>
        <th scope="col">Owner</th>
        <th scope="col" width="210"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr class="has-link" data-url="{{ url(route('laravel-crm.leads.show',$lead)) }}">
            <td>{{ $lead->created_at->diffForHumans() }}</td>
            <td>{{ $lead->title }}</td>
            <td>@include('laravel-crm::partials.labels',[
                    'labels' => $lead->labels,
                    'limit' => 3
                ])</td>
            <td>{{ money($lead->amount, $lead->currency) }}</td>
            <td>{{ $lead->client->name ?? null}}</td>
            <td>{{ $lead->organisation->name ?? null}}</td>
            <td>{{ $lead->person->name ??  null }}</td>
            <td>{{ $lead->ownerUser->name ?? null }}</td>
            <td class="disable-link text-right">
                @hasdealsenabled
                    @can('edit crm leads')
                    <a href="{{ route('laravel-crm.leads.convert-to-deal',$lead) }}" class="btn btn-success btn-sm"> {{ ucfirst(__('laravel-crm::lang.convert')) }}</a>
                    @endcan
                @endhasdealsenabled
                @can('view crm leads')
                <a href="{{ route('laravel-crm.leads.show',$lead) }}" class="btn btn-outline-secondary btn-sm"><span class="fa fa-eye" aria-hidden="true"></span></a>
                @endcan
                @can('edit crm leads')
                <a href="{{ route('laravel-crm.leads.edit',$lead) }}" class="btn btn-outline-secondary btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a>
                @endcan
                @can('delete crm leads')
                <form action="{{ route('laravel-crm.leads.destroy',$lead) }}" method="POST" class="form-check-inline mr-0 form-delete-button">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                    <button class="btn btn-danger btn-sm" type="submit" data-model="{{ __('laravel-crm::lang.lead') }}"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>