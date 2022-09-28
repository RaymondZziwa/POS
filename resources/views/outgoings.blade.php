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

            <h4 style="text-align:center;margin-top:10px">OUTGOINGS INVENTORY RECORDS</h4>
            <table class="table table-dark table-striped" style="margin-top:20px">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Merchandise Name</th>
                        <th>Reason</th>
                        <th>Additional Comments</th>
                        <th>Authorized By</th>
                        <th>Taken Out By</th>
                        <th>Branch</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($outrecords as $outrecord)
                            <tr>
                                <td>{{$outrecord->Date}}</td>
                                <td>{{$outrecord->MerchandiseOut}}</td>
                                <td>{{$outrecord->Reason}}</td>
                                <td>{{$outrecord->AdditionalComments}}</td>
                                <td>{{$outrecord->AuthorizedBy}}</td>
                                <td>{{$outrecord->TakenOutBy}}</td>
                                <td>{{$outrecord->Branch}}</td>
                           </tr>
                        @endforeach
                </tbody>
            </table>
             
        </div>
    </div>
</div>
@endsection
