@section('css')
<link rel="stylesheet" type="text/css"  href="{{asset('css/global/general.css')}}">
<link rel="stylesheet" type="text/css"  href="{{asset('css/guest/contact.css')}}">
@endsection

@section('content')

    <div class="fake-body contact">

        <!-- oben -->
        <div class="col-xs-12 mainsection">
            <div class="main-article">
                <aside>
                    <img src="{{asset('img/contact.gif')}}" alt="Bild">
                </aside>
                <aside class="display-none-heading">
                    <h2>Contact</h2>
                </aside>
            </div>
        </div>

        <div class="container">

            <article class="col-xs-12 subheader">
                <h2>Send us an email or just say Hello!</h2>
            </article>

            <!--  links -->
            <aside class="col-sm-3 col-xs-12 getheightleft">
                <form>
                    <p>
                        <select class="form-control">
                            <option value="" disabled selected>Title....</option>
                            <option>Mr</option>
                            <option>Miss</option>
                            <option>Misses</option>
                        </select>
                    </p>
                    <p><input class=" form-control" type="text" placeholder="Name...."></p>
                    <p><input class=" form-control" type="text" placeholder="E-Mail...."></p>
                    <p><input class=" form-control" type="text" placeholder="Subject....">
                    </p>
                    <p><input class="filestyle form-control" type="file"></p>
                </form>
            </aside>

            <!-- rechts -->
            <aside class=" test col-sm-9 col-xs-12 setheightright">
                <textarea class="form-control sendtextfeld" placeholder="Message...." ></textarea>
                <p></p>
                <button class="form-control buttonbottom add-button"  onclick="alert('Missing SMTP-Server');">Send</button>
            </aside>

        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/general/contact.js') }}"></script>
@endsection

