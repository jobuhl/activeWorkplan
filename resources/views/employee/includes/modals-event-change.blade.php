<!-- Button der Event aendert -->
<div id="change-button-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Event</h2>
                <br>

                <form type="form" method="POST" action="{{ url('/employee/alldayEventChange') }}"> {{ csrf_field() }}

                <!-- Modal body-->
                    <div class="modal-body change-event-modal">

                        <!-- Zeile 1 -->
                        <article class="row">
                            <h2 style="display: none">fakeheading</h2>

                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4"></aside>

                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><select id="select-js-on-change"
                                           class="selectpicker form-control to-right modal-input space-cap"
                                           name="category" type="text">
                                        <option>this-category-wird-ueberschrieben</option>
                                        @foreach($category as $cat )
                                            <option>{{ $cat->name }}</option>
                                        @endforeach
                                    </select></p>
                            </aside>

                        </article>

                        <!-- Zeile 2 -->
                        <article class="row">
                            <h2 style="display: none">fakeheading</h2>

                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">Time</aside>

                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input class="datepicker inputmodal form-control space-cap" type="date" name="date"
                                          placeholder="Date"/></p>
                            </aside>

                        </article>

                    </div>

                    <!-- Modal footer-->
                    <div>
                        <button type="submit" class="form-control to-right add-button"
                                data-toggle="modal"
                                name="thisDate"
                                value="{{ $week[0]->format('d-m-Y') }}"
                                data-target="#add-button-store">Add
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/event.js') }}"></script>
@endsection