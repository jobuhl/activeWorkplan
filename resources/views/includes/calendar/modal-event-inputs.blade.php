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
            <p>
                <input class="from-overwrite empty-overwrite inputmodal form-control" maxlength="5" type="text" onkeyup="validateTimeInput('from-overwrite')" name="time-from" placeholder="09:00">
            </p>
        </aside>
    </div>

    <!-- Zeile 4 To -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4 aside-left-add">To</aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <p>
                <input class="to-overwrite empty-overwrite inputmodal form-control" maxlength="5" type="text" onkeyup="validateTimeInput('to-overwrite')" name="time-to" placeholder="15:00">
            </p>
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
        <aside class="col-xs-6 col-xs-offset-3 col-sm-8 col-sm-offset-0 aside-right">
            <input class="id-overwrite" style="display: none;" name="thisEventId">
            <button type="button" class="time-button-overwrite form-control blue-light-button" onclick="toggleTime()">Show Time</button>
        </aside>
    </div>
@endif

