@extends('admin.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    <div class="container fake-body">

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

        <div class="row">
            <h2 class="modal-ueberschrift">Admin Details</h2>

            <button class="form-control set-right yellow-button space-to-top-bottom" type="submit" data-toggle="modal" data-target="#change-button">Change</button>

            <table class="col-xs-12 table-account">
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
                    <td>{{ $address->street . ' ' . $address->street_nr . ', ' . $address->postcode . ' ' . $address->city  . ', ' . $address->country }}
                    </td>
                </tr>
            </table>

            <button class="form-control set-right red-button space-to-top-bottom" data-toggle="modal" data-target="#delete-button-admin">Delete</button>

        </div>
    </div>

    @include('admin.includes.change-admin')
    @include('admin.includes.delete-admin')


@endsection

