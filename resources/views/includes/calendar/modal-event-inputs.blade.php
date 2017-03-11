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
                    <option class="category-overwrite">Work Final</option>
                @endif

                @if( strpos(url()->current(),'/employee/planning') )
                    <option class="category-overwrite">Work</option>
                    {{--<option disabled>------------</option>--}}
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
                <p>
                    <input class="from-overwrite empty-overwrite inputmodal form-control" maxlength="5" type="text" onkeyup="validateTimeInput(this.value, 'from-overwrite')" name="time-from" placeholder="09:00">
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
                    <input class="to-overwrite empty-overwrite inputmodal form-control" maxlength="5" type="text" onkeyup="validateTimeInput(this.value, 'to-overwrite')" name="time-to" placeholder="15:00">
                </p>
            </aside>
        </div>

    </div>

    <script>

        // Fuer jede InputLaenge eine RegExp
        var regex = [
            new RegExp("[0-2]"),
            new RegExp("([01][0-9]|2[0-3])"),
            new RegExp("([01][0-9]|2[0-3]):"),
            new RegExp("([01][0-9]|2[0-3]):[0-5]"),
            new RegExp("([01][0-9]|2[0-3]):[0-5][05]")
        ];

        function validateTimeInput(inputValueOld, inputClass) {

            var inputValue = inputValueOld;
            var from = $(".from-overwrite").val();
            var to = $(".to-overwrite").val();
            var current = $("." + inputClass);

            // Schnellschreibweise, wenn erste Zahl 3,...,9
            if (inputValue.length == 1 && (new RegExp("[3-9]")).test(inputValue)) {
                inputValue = "0" + inputValue + ":";

                if (inputClass == "from-overwrite") {
                    from = inputValue;
                }
                if (inputClass == "to-overwrite") {

                    to = inputValue;
                }
            }

            // Vergleich der aktuellen inputLaenge mit entsprechender RegExp
            if (!regex[Math.min(inputValue.length - 1, 4)].test(inputValue) || isFromLowerTo(from, to)) {

                // Den letzten Character loeschen
                if (inputValue.length == 3) {
                    inputValue = "";
                } else {
                    inputValue = inputValue.substring(0, inputValue.length - 1);
                }
            }

            // Wenn beide Inputs komplett befuellt sind, darf die Uhrzeit nicht gleich sein
            if (from.length == 5 && to.length == 5 && from >= to) {
                inputValue = inputValue.substring(0, 4);
            }

            current.val(inputValue);
        }

        function isFromLowerTo(from, to) {

            // Min Length of both Inputs
            var shorterInput = Math.min(from.length, to.length);

            // Substring of both Inputs
            var shortFrom = from.substring(0, shorterInput);
            var shortTo = to.substring(0, shorterInput);

//            alert(shortFrom + " " + shortTo);

            return shortFrom > shortTo;
        }

    </script>


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

