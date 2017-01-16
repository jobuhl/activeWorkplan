@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    <!-- body -->
    <div class="fake-body container">

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>
                    @foreach($errors -> all() as $error)
                        <li style="margin-left: 10px">{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <div class="container">

            <div class="row-col-12">

                <h2 class="col-xs-12 header">Account Details</h2>


                <div class="set-right button-show">
                    <button class="form-control  yellow my-account-button" type="submit" data-toggle="modal"
                            data-target="#change-button">
                        Change
                    </button>
                </div>

                <div class="button-hide">
                    <button class="form-control yellow my-account-button" type="submit" data-toggle="modal"
                            data-target="#change-button">
                        Change
                    </button>
                </div>


                <table class="table-account">
                    <tr>
                        <td>Employer ID</td>
                        <td>{{ $thisEmployee->id }}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>******</td>
                    </tr>

                    <tr class="table-space">
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Surname</td>
                        <td>{{ $thisEmployee->surname }}</td>
                    </tr>
                    <tr>
                        <td>Forename</td>
                        <td>{{ $thisEmployee->forename }}</td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>{{ $thisEmployee->email }}</td>
                    </tr>

                    <tr class="table-space">
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Company name</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>Preferred Retail Store</td>
                        <td>{{ $thisRetailStore->name }}</td>
                    </tr>
                    <tr>
                        <td>Address of Retail Store</td>
                        <td><p>{{ $address->street }} {{ $address->street_nr }}</p>
                            {{ $address->postcode }} {{ $address->city }}
                               {{ $address->country }}
                        </td>
                    </tr>
                    <tr>
                        <td>Agreement working hours</td>
                        <td>{{ $thisEmployee->working_hours }}</td>
                    </tr>


                </table>

            </div>

            <div class="space-cap"></div>

        </div>
    </div>


    @include('employee.includes.change-emp')

@endsection

