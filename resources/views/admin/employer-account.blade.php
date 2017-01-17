@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    <section class="fake-body">

        {{-- Meldung für den Fall das ein Error Auftritt --}}
        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>
                    @foreach($errors -> all() as $error)
                        <li style="margin-left: 10px">{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif


        {{-- Meldung für den Fall das Erfolgreich geändert wurde --}}
    @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        <section class="container">

            <div class="row -col-12">
                <h2 class="modal-ueberschrift">Admin Details</h2>

                <button class="form-control yellow my-account-button button-hide" type="submit" data-toggle="modal"
                        data-target="#change-button">
                    Change
                </button>

                <button class="form-control set-right yellow my-account-button button-show" type="submit" data-toggle="modal"
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


                <button class="form-control set-right red my-account-button button-show" data-toggle="modal"
                        data-target="#delete-button-admin">Delete
                </button>

                <button class="form-control red my-account-button button-hide" data-toggle="modal"
                        data-target="#delete-button-admin">Delete
                </button>


            </div>

        </section>
    </section>

    @include('admin.includes.change-admin')
    @include('admin.includes.delete-admin')


@endsection

