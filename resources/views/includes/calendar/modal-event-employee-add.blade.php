<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-event-employee-add" data-toggle="modal" data-target="#modal-event-employee-add" style="display: none;"></button>


<!-- Button der Event hinzufügt -->
<div id="modal-event-employee-add" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Add Event</h2>

                <br>
            </div>


            <form method="POST" action="{{ url('/addEvent') }}" id="modal-body-event"> {{ csrf_field() }}

            <!-- Modal body-->
                <div class="modal-body">

                    <!-- Zeile 1 Category -->
                    <div class="row">
                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">

                            <div class="select-parent">
                                <div class="select-div form-control" draggable="true">
                                    <div class="select-text category-overwrite">Work</div>
                                    <input style="display: none;" class="select-text" name="category" value="Work"/>
                                    <div id="select-arrow" class="arrow-down"></div>
                                </div>

                                <div class="select-hidden">
                                    @foreach($category as $cat)
                                        @if ($cat->name != "Work Final")
                                            <p class="select-p">{{ $cat->name }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                        </aside>
                    </div>
                    @include('includes.calendar.modal-event-inputs')

                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <input style="display: none;" name="thisEmployeeId" value="{{ Auth::user()->id }}"/>
                    <button type="submit" class="form-control green-button" name="thisUrl" value="{{ url()->current() }}">Add</button>
                </div>

            </form>


        </div>

    </div>
</div>