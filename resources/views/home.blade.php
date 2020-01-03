@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Declined</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">A1C</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Product</th>
                        <th scope="col">Face Amount</th>
                        <th scope="col">Premium</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Diagnosed Months Ago</th>
                        <th scope="col">Smoker</th>
                        <th scope="col">Height In Inches</th>
                        <th scope="col">Weight In Pounds</th>
                        <th scope="col">Has Complications</th>
                        <th scope="col">BMI</th>
                        <th scope="col">Declined Reason</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($leads as $lead)
                    <tr>
                        <th>{{ $lead->id }}</th>
                        <th>{{ $lead->declined }}</th>
                        <td>{{ $lead->first_name }}</td>
                        <td>{{ $lead->last_name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->a1c }}</td>
                        <td>{{ $lead->rating }}</td>
                        <td>{{ $lead->product }}</td>
                        <td>{{ $lead->faceAmount }}</td>
                        <td>{{ $lead->monthlyPremium }}</td>
                        <td>{{ $lead->age }}</td>
                        <td>{{ $lead->gender }}</td>
                        <td>{{ $lead->diagnosedMonthsAgo }}</td>
                        <td>{{ $lead->smoker }}</td>
                        <td>{{ $lead->heightInInches }}</td>
                        <td>{{ $lead->weightInPounds }}</td>
                        <td>{{ $lead->hasComplications }}</td>
                        <td>{{ $lead->bmi }}</td>
                        <td>{{ $lead->declineReason }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
