@extends('voyager::master')

@section('page_title', __('voyager::generic.view') . ' ' . $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }}
        {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.' . $dataType->slug . '.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span
                    class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if ($isSoftDeleted)
                <a href="{{ route('voyager.' . $dataType->slug . '.restore', $dataTypeContent->getKey()) }}"
                    title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore"
                    data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete"
                    data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
            <a href="{{ route('voyager.' . $dataType->slug . '.index') }}" class="btn btn-warning">
                <i class="glyphicon glyphicon-list"></i> <span
                    class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
            </a>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-6" style="height: 55vh" >

                <div class="panel panel-bordered" style="padding-bottom:5px;height:100%">
                    <div class="panel-body">
                        <div class="" style="display:flex;justify-content: center">

                            <img src="{{ voyager::image($dataTypeContent->avatar) }}" alt="" height="100">
                        </div>

                        <div class="row ">
                            <div class="col-md-6" style="margin-top: 40px; border-right:1px solid #888">
                                <p style="font-size: 18px">Name : <span
                                        style="font-weight: 800">{{ $dataTypeContent->name }}</span></p>
                                <p style="font-size: 18px">Email : <span
                                        style="font-weight: 800">{{ $dataTypeContent->email }}</span></p>
                                <p style="font-size: 18px">Created at : <span
                                        style="font-weight: 800">{{ $dataTypeContent->created_at->format('M d/y') }}</span>
                                </p>
                                <p style="font-size: 18px">Package : <span
                                        style="font-weight: 800">{{ $dataTypeContent->package->title ?? null }}</span></p>

                            </div>
                            <div class="col-md-6" style="margin-top: 40px">
                                <p style="font-size: 18px">Organization Limit : <span
                                        style="font-weight: 800">{{ $dataTypeContent->organization_limit }}</span></p>
                                <p style="font-size: 18px">Deal Limit : <span
                                        style="font-weight: 800">{{ $dataTypeContent->deal_limit }}</span></p>
                                <p style="font-size: 18px">Lead Limit : <span
                                        style="font-weight: 800">{{ $dataTypeContent->lead_limit }}</span></p>
                                <p style="font-size: 18px">Client Limit : <span
                                        style="font-weight: 800">{{ $dataTypeContent->client_limit }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6" style="height: 55vh;overflow:hidden">
                <div class="panel panel-bordered" style="height: 100%;overflow-y: auto;">
                    <div class="panen-title" style="display: flex;justify-content:space-between;padding:0 20px">
                        <h3 class="">Oranizations ({{$dataTypeContent->organisations->count()}})</h3>
                        <h3 class="">Due ({{$dataTypeContent->organization_limit - $dataTypeContent->organisations->count()}})</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTypeContent->organisations as $organisation)
                                    
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$organisation->name}}</td>
                                    <td>
                                        <span class="badge light badge-success text-white"
                                        style="background-color:{{ $organisation->labelName->color ?? null }}">{{ $organisation->labelName->name ?? null }}</span>

                                    </td>
                                    <td>{{$organisation->created_at->format('M d/Y')}}</td>
                                </tr>
                          
                                @endforeach
                             
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6" style="height: 55vh;overflow:hidden;padding-left: 16px">
                <div class="panel panel-bordered" style="height: 100%;overflow-y: auto;">
                    <div class="panen-title" style="display: flex;justify-content:space-between;padding:0 20px">
                        <h3 class="">Clients ({{$dataTypeContent->clients->count()}})</h3>
                        <h3 class="">Due ({{$dataTypeContent->client_limit - $dataTypeContent->clients->count()}})</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTypeContent->clients as $client)
                                    
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$client->name}}</td>
                                    <td>
                                       {{$client->phone}}
                                    </td>
                                    <td>{{$client->organisation->name ?? null}}</td>
                                    <td>{{$client->created_at->format('M d/Y')}}</td>
                                </tr>
                                @endforeach
                             
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="height: 55vh;overflow:hidden;">
                <div class="panel panel-bordered" style="height: 100%;overflow-y: auto;">
                    <div class="panen-title" style="display: flex;justify-content:space-between;padding:0 20px">
                        <h3 class="">Leads ({{$dataTypeContent->leads->count()}})</h3>
                        <h3 class="">Due ({{$dataTypeContent->lead_limit - $dataTypeContent->leads->count()}})</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Close date</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTypeContent->leads as $lead)
                                    
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$lead->title}}</td>
                                    <td>
                                        <span class="badge light badge-success text-white"
                                        style="background-color:{{ $lead->labelName->color ?? null }}">{{ $lead->labelName->name ?? null }}</span>
                                    </td>
                                    <td>{{$lead->organisation->name}}</td>
                                    <td>{{$lead->organisation->close_date}}</td>
                                    <td>{{$lead->created_at->format('M d/Y')}}</td>
                                </tr>
                                @endforeach
                             
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="height: 55vh;overflow:hidden;">
                <div class="panel panel-bordered" style="height: 100%;overflow-y: auto;">
                    <div class="panen-title" style="display: flex;justify-content:space-between;padding:0 20px">
                        <h3 class="">Deals ({{$dataTypeContent->deals->count()}})</h3>
                        <h3 class="">Due ({{$dataTypeContent->deal_limit - $dataTypeContent->deals->count()}})</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($dataTypeContent->deals as $deal)
                                    
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$deal->title}}</td>
                                    <td>
                                        <span class="badge light badge-success text-white"
                                        style="background-color:{{ $deal->labelName->color ?? null }}">{{ $deal->labelName->name ?? null }}</span>
                                    </td>
                                    <td>{{$deal->organisation->name}}</td>
                                    <td>{{$deal->created_at->format('M d/Y')}}</td>
                                </tr>
                                @endforeach
                             
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}
                        {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.' . $dataType->slug . '.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                            value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function() {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function(e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/) ?
                deleteFormAction.replace(/([0-9]+$)/, $(this).data('id')) :
                deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });
    </script>
@stop
