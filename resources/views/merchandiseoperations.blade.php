@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="md-10">
                        @if(Session::has('record_add'))
                            <span class="alert alert-success" style="margin:10px" role="alert">{{Session::get('record_add')}}</span>
                        @endif
                        @if(Session::has('record_error'))
                            <span class="alert alert-danger" style="margin:10px" role="alert">{{Session::get('record_error')}}</span>
                        @endif
                    <form method="post" action="{{route('merchandisesave')}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3" style="margin-top:10px">
                            <input type="text" class="form-control" id="floatingInput" name="merchandisecode" placeholder="Merchandise Code" style="text-transform:uppercase" required>
                            <label for="floatingInput">Merchandise Code</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="merchandisename" placeholder="Merchandise Name" required>
                            <label for="floatingInput">Merchandise Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="merchandiseprice" placeholder="Merchandise Price" required>
                            <label for="floatingInput">Merchandise Price</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Merchandise Data</button>
                    </form>



            <h4 style="text-align:center;margin-top:10px">MERCHANDISE RECORDS</h4>
            <table class="table table-dark table-striped" style="margin-top:20px">
                <thead>
                    <tr>
                        <th>Merchandise Code</th>
                        <th>Merchandise Name</th>
                        <th>Merchandise Price</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($merchandiserecords as $merchandiserecord)
                            <tr>
                                <td>{{$merchandiserecord->MerchandiseCode}}</td>
                                <td>{{$merchandiserecord->MerchandiseName}}</td>
                                <td>{{$merchandiserecord->MerchandisePrice}}</td>
                           </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
