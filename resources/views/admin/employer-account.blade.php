@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    <section class="fake-body">

        <section class="container">

            <div class="row -col-12">
                <h2 class="modal-ueberschrift">Admin Details</h2>

                <button class="form-control set-right yellow my-account-button" type="submit" data-toggle="modal"
                        data-target="#change-button">
                    Change
                </button>

                <table class="table-account">
                    <tr>
                        <td>Admin ID</td>
                        <td>{{ $admin->id }}</td>
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
                        <td>{{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <td>Forename</td>
                        <td>{{ $admin->forename }}</td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>{{ $admin->email }}</td>
                    </tr>

                    <tr class="table-space">
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="table-space-above">
                        <td>Company name</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>Headquarter Address</td>
                        <td>{{ $address->street }} {{ $address->street_nr }}
                            , {{ $address->postcode }} {{ $address->city }}
                            , {{ $address->country }}
                        </td>
                    </tr>
                </table>


                <button class="form-control set-right red my-account-button" data-toggle="modal"
                        data-target="#delete-button-admin">Delete
                </button>


            </div>

        </section>
    </section>

    @include('admin.includes.change-admin')
    @include('admin.includes.delete-admin')


@endsection

