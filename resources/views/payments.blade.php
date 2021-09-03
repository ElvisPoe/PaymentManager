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
                @foreach($payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->client()->id }}</th>
                        <td>{{ $payment->client()->name }}</td>
                        <td>{{ $payment->client()->surname }}</td>
                        <td>
                            <p><b>Amount: </b>{{ $payment->amount }} €</p>
                            <p><b>Date: </b>{{ $payment->created_at->format('d/m/Y h:m') }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
