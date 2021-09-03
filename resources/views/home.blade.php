@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-bordered my-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Last Payment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->surname }}</td>
                        <td>
                            @if($client->lastPayment->count() > 0)
                                @foreach($client->lastPayment as $payment)
                                    <p><b>Amount: </b>{{ $payment->amount }} €</p>
                                    <p><b>Date: </b>{{ $payment->created_at->format('d/m/Y h:m') }}</p>
                                @endforeach
                            @else
                                <p>No Payments</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="/filter-payments" method="GET">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="date_from">Date from</label>
                        <input type="date" class="form-control form-control-lg" name="date_from" id="date_from">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="date_to">Date to</label>
                        <input type="date" class="form-control form-control-lg" name="date_to" id="date_to">
                    </div>
                </div>
                <div class="col-2 offset-5 my-5">
                    <div class="form-group">
                        <input type="submit" class="form-control form-control-lg btn-danger" id="submit" value="FILTER">
                    </div>
                </div>
            </div>
        </form>

    </div>

{{--    {{ $clients }}--}}

@endsection
