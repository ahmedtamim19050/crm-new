@extends('layouts.default')

@section('content')
<button type="button" class="btn btn-dark mb-2 me-2" id="toastr-success-top-right">Top
    Right</button>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <p class="mb-0">Products Table</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Products</a></li>
            </ol>
        </div>
        <div class="col-md-3 mt-3">
            <a href="{{route('products.create')}}" class="btn btn-primary">Create a Product</a>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Products Queue</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Code</strong></th>
                                    <th><strong>Category</strong></th>
                                    <th><strong>Unit</strong></th>
                                    <th><strong>Price</strong></th>
                                    <th> <strong> Tax </strong></th>
                                    <th> <strong>Active </strong></th>
                                    <th> <strong>Owner </strong></th>
                                    {{-- <th><strong>PRICE</strong></th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
               
                         
                                <tr>
                                    <td><strong>{{$loop->index +1}}</strong></td>
                                    <td>{{ $product->name }}</td>
                                  
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->productCategory->name ?? null }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>
                                 
                               
                                        {{$product->unit_price}}
                            
                             
                                    </td>
                                    <td>{{ $product->taxRate->name ?? null }}</td>
                                    {{-- <td>{{ $product->tax_rate ?? $product->taxRate->rate ?? 0 }}%</td> --}}
                                    <td>{{ ($product->active == 1) ? 'YES' : 'NO' }}</td>
                                    <td>{{ $product->ownerUser->name ?? null }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                
                                                <a class="dropdown-item" href="{{route('products.show',$product)}}">Show</a>
                                                <a class="dropdown-item" href="{{route('products.edit',$product)}}">Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
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