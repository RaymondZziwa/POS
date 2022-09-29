@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <h4 style="text-align:center;margin-top:10px">INCOMINGS INVENTORY RECORDS</h4>
            <table class="table table-dark table-striped" style="margin-top:20px">
                <thead>
                    <tr>
                        <th>Merchandise Name</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($cartmerchs as $cartmerch)
                            <tr>
                                <td>{{$cartmerch->merchandise}}</td>
                                <td>{{$cartmerch->totalPrice}}</td>
                           </tr>
                         @endforeach
                </tbody>
            </table>
             
        </div>
    </div>
</div>
@endsection
