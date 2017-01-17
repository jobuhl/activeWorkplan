@extends('admin.layout.employer-start')

@section('css')

    <style type="text/css">

        .fake-body {
            margin: auto;
            display: table;
            height: 400px;
            overflow: hidden;
        }

        .horizontal {
            display: table-cell;
            vertical-align: middle;
            margin: auto;
        }

        h2 {
            text-align: center;
            font-weight: 500;
            font-family: Helvetica;
            color: var(--main-text-black);
        }

    </style>
@endsection

@section('content')

    <div class="fake-body">

        <section class="container horizontal">

            <div class="row">

                <h2 class="modal-ueberschrift">At the moment your Company has no Stores.</h2>
                <br>
                <br>
                <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                    <button class="form-control add-button" type="submit" data-toggle="modal" data-target="#add-button-store">
                        Add Store
                    </button>
                </div>

            </div>


        </section>

    </div>

@endsection