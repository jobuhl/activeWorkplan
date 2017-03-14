@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/guest/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/guest/guest.css')}}">
@endsection

@section('content')

    <div class="fake-body contact">

        <!-- sub-header -->
        <div class="sub-header">
            <div class="sub-header-div">
                <img class="sub-header-image" src="{{asset('img/guest/contact.gif')}}" alt="Bild">
                <h2 class="sub-header-text">Contact</h2>
            </div>
        </div>

        <div class="container">

            <article class="col-xs-12 subheader">
                <h2>Send us an email or just say Hello!</h2>
            </article>

            <!--  links -->
            <aside class="col-sm-4 col-xs-12 getheightleft">
                <form>

                    <div class="select-parent">
                        <div class="select-div form-control" draggable="true" name="title">
                            <div class="select-text">Title</div>
                            <div id="select-arrow" class="arrow-down"></div>
                        </div>

                        <div class="select-hidden">
                            <p class="select-p">Mr.</p>
                            <p class="select-p">Miss</p>
                            <p class="select-p">Misses</p>
                        </div>
                    </div>

                    <input class="margin form-control" type="text" placeholder="Name....">
                    <input class="margin form-control" type="text" placeholder="E-Mail....">
                    <input class="margin form-control" type="text" placeholder="Subject....">

                    <input class="margin filestyle form-control" type="file">
                </form>
            </aside>

            <!-- rechts -->
            <aside class=" test col-sm-8 col-xs-12 setheightright">
                <textarea class="form-control sendtextfeld" placeholder="Message...."></textarea>
                <p></p>
                <button class="form-control buttonbottom green-button" onclick="alert('Missing SMTP-Server');">Send</button>
            </aside>

        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/guest/contact.js') }}"></script>
@endsection

