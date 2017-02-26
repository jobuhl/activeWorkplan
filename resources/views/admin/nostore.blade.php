@extends('admin.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/admin/no-store.css')}}">
@endsection

@section('content')

    <div class="fake-body">

        <section class="container horizontal">

            <div class="row">

                <h2 class="modal-ueberschrift">At the moment your Company has no Stores.</h2>

                <br>
                <br>

                <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                    <button class="form-control green-button" type="submit" data-toggle="modal" data-target="#add-button-store">Add Store</button>
                </div>

            </div>


        </section>

        @include('admin.includes.add-store')
    </div>

@endsection