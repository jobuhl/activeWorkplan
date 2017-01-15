@section('css')
<link rel="stylesheet" type="text/css"  href="{{asset('css/global/general.css')}}">
<link rel="stylesheet" type="text/css"  href="{{asset('css/general/contact.css')}}">
@endsection

@section('content')

    <section class="fake-body contact">
        <h2 style="display: none">fakeheading</h2>

        <!-- oben -->
        <section class="col-xs-12 mainsection">
            <h2 style="display: none">fakeheading</h2>
            <article>
                <h2 style="display: none">fakeheading</h2>
                <aside>
                    <img src="{{asset('img/contact.gif')}}" alt="Bild">
                </aside>
                <aside>
                    <h2>Contact</h2>
                </aside>
            </article>
        </section>

        <section class="container">
            <h2 style="display: none">fakeheading</h2>

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
                <textarea class="form-control sendtextfeld" type="text" placeholder="Message...." ></textarea>
                <p></p>
                <button class="form-control buttonbottom add-button" type="submit">Send</button>
            </aside>

        </section>

    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/general/contact.js') }}"></script>
@endsection

