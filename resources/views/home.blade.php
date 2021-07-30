@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            <div class="card">
                <div class="card-body">
                    <passport-component></passport-component>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Car Price to Book</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($hardware as $car)
                            <tr>
                                <td>{{ $loop->iteration }}-{{ $car->name }}</td>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->description }}</td>
                                <td>{{ $car->price }}</td>
                                <td>
                                    {{-- <form action="{{ route('book:store', $car) }}">
                                        @csrf --}}
                                        <a href="{{ route('purchase:store', $car) }}" type="button" class="btn btn-primary">Buy</a>
                                    {{-- </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Car Price to Book</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Booking</th>
                                <th>Status</th>
                                <th>Payment</th>
                            </tr>
                            @foreach ($purchase as $book)
                            <tr>
                                <td>{{ $book->real_amount }}</td>
                                <td>
                                    @if ( $book->payment_status == 0)
                                        Not paid
                                    @else
                                        Paid
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $book->payment_link }}" type="button" class="btn btn-primary">Pay</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
