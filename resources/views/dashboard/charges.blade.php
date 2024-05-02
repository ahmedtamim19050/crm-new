@extends('layouts.default')

@section('content')
<div class="container-fluid">
      <!-- Add Project -->
      <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Charges</a></li>
            </ol>
        </div>
     
    </div>
  
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All charges</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>#</strong></th>
          
                                <th><strong>Payment date</strong></th>
                                <th><strong>Payment method</strong></th>
                                <th><strong>Bill to</strong></th>
                                <th><strong>Billing Reason</strong></th>
                                <th><strong>Total</strong></th>
                                <th><strong>Action</strong></th>
                   
                     
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($charges as $charge)
                        
                                <tr>
                                    <td><strong>{{$loop->index + 1}}</strong></td>
                                    <td>
                                        {{ date('Y-m-d H:i:s', $charge->created) }}
                                    </td>
                                    <td>
                                        {{ auth()->user()->pm_type}}***{{  auth()->user()->pm_last_four }}
                                    </td>
                                    <td>
                                       {{$charge->account_name}} <br>
                                       {{$charge->customer_name}} <br>
                                       {{$charge->customer_email}} <br>
                                    </td>
                                    <td>
                                        {{ $charge->billing_reason }}
                                    </td>
                                    

                                    <td>$ {{$charge->total / 100}}</td>
                                    <td>
                                        <a href="{{$charge->hosted_invoice_url}}" target="_blank" class="btn btn-primary btn-sm">Invoice</a>
                                    </td>
                                
          
                                </tr>
         
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection