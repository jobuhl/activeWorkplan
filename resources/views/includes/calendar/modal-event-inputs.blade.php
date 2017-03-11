<!-- Modal body-->
<div class="modal-body">

    <!-- Zeile 1 Category -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <select class="selectpicker form-control modal-input space-cap" name="category">

                @if( strpos(url()->current(),'/admin/planning') )
                    <option>Work Final</option>
                @endif

                @if( strpos(url()->current(),'/employee/planning') )
                    <option class="category-overwrite">Work</option>
                    <option disabled>------------</option>
                    @foreach($category as $cat)
                        @if ($cat->name != "Work Final")
                            <option>{{ $cat->name }}</option>
                        @endif
                    @endforeach
                @endif

            </select>
        </aside>
    </div>

    <!-- Zeile 2 Date -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4 aside-left-add">Date</aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <p><input class="date-overwrite datepicker inputmodal form-control space-cap" type="date" name="date" placeholder="dd-mm-yyyy"/></p>
        </aside>
    </div>

    <div class="hide-time-input">

        <!-- Zeile 3 From -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">From</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="from-overwrite empty-overwrite inputmodal form-control" type="text" name="time-from" placeholder="9:00"></p>
            </aside>
        </div>

        <!-- Zeile 4 To -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">To</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="to-overwrite empty-overwrite inputmodal form-control" type="text" name="time-to" placeholder="15:00"></p>
            </aside>
        </div>

    </div>


    <!-- If calendar in Employee Planning -->
@if( strpos(url()->current(),'/employee/planning') )

    <!-- Zeile 5 Show Time -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add"></aside>
            <!-- rechts -->
            <aside class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-0 aside-right">
                <input class="id-overwrite" style="display: none;" name="thisEventId">
                <button type="button" class="time-button-overwrite form-control blue-light-button" onclick="toggleTime()">Show Time</button>
            </aside>
        </div>
    @endif

</div>

