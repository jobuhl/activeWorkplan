<!-- +++++++++++++++ TIME EVENT +++++++++++++++ -->
<tr class="time-events">
    <td class="button-show">
        @if( strpos(url()->current(),'/employee/'))  @endif
    </td>

    <td style="display: inline-table; width: 40px; float: right; padding-right: 5px; border-left: none;">

        <p style="margin-top: 15px;"></p>
    @for ($i = 0; $i < 24; $i++)

            <p style="height: 26px; margin: 0; padding: 0 5px 0 0; text-align: end; color: var(--grey-10);"><?php if ($i % 2 == 1) { echo $i + 1 . ":00"; } ?></p>
        @endfor

    </td>

@for ($i = 0; $i < 7; $i++)


    <!-- Abzaehlen wie viele Time Events am Tag insgesamt -->
    <?php $lastToTime = "0.0";

    $eventsPerDay = 0;
    foreach ($manyTimeEvent as $countOneEvent) {

        if ((new DateTime($countOneEvent->date))->format('Y-m-d') == $week[$i]
            && $countOneEvent->name != 'Work Final'
            && $countOneEvent->employee_id == $thisEmployee->id
        ) {

            $eventsPerDay++;
        }
    }
    $countEvent = 0;
    ?>

    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('Y-m-d') == $week[$i])
            <td class="today">@else
            <td>@endif

                @if ($eventsPerDay == 0)
                    <hr style="border: 0.1px solid var(--grey-30); margin: 0;">

                    @for($f = 0; $f < 24; $f++)
                        <hr style="border: 0.1px solid var(--grey-30); margin: 25px 0 0 0;">
                    @endfor
                @endif

            <!-- +++++++++++++++ ALL TIME EVENT +++++++++++++++ -->
                @foreach($manyTimeEvent as $oneTimeEvent)


                    @if( (new DateTime($oneTimeEvent->date))->format('Y-m-d') == $week[$i]
                        && $oneTimeEvent->name != 'Work Final'
                        && $oneTimeEvent->employee_id == $thisEmployee->id )

                        <?php
                        $from = (substr($oneTimeEvent->from, 0, 2) . '.' . (substr($oneTimeEvent->from, 3, 2) / 6 * 10));
                        $to = (substr($oneTimeEvent->to, 0, 2) . '.' . (substr($oneTimeEvent->to, 3, 2) / 6 * 10));

                        $fullMargin = $from - $lastToTime;

                        $firstMargin = fmod($lastToTime, 1);
                        if ($firstMargin != 0) {
                            $firstMargin -= 1;
                            $firstMargin = substr($firstMargin, 1);
                        }

                        $lastMargin = fmod($from, 1);
                        $middleMargin = $fullMargin - $firstMargin - $lastMargin;



                        ?>

                        @if ($fullMargin >= 1)
                            <hr style="border: 0.1px solid var(--grey-30); margin: <?= $firstMargin * 25 ?>px 0 0 0;">
                        @endif

                        @for($f = 0; $f < $middleMargin; $f++)
                            <hr style="border: 0.1px solid var(--grey-30); margin: 25px 0 0 0;">
                        @endfor

                    <!-- +++++++++++++++ ONE TIME EVENT +++++++++++++++ -->
                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                             onclick="openEventOptions('options-proposal-time-' + {{ $oneTimeEvent->id }} + '')"
                             draggable="true"
                             id="event-proposal-time-{{ $oneTimeEvent->id }}"
                             ondragstart="drag(event)"
                             style="min-height:

                             <?php
                             $morePixelHeight = 1 - $firstMargin + ($to - $from);
                             $new = 0;
                             if ($morePixelHeight >= 1) {
                                 $rest = $morePixelHeight % 1;
                                 $new = $morePixelHeight - $rest;
                             }

                             if ($from % 1 == 0) {
                                 $new -= 1.1;
                             }

                             if ($to % 1 == 0) {
                                 $new -= 1.1;
                             }

                             echo (($to - $from) * 25 + $new) . "px;" ?>;

                                     margin-top: <?php
                             if ($fullMargin >= 1) {
                                 echo max(($lastMargin * 25), 1) . "px;";
                             } else {
                                 echo max(($fullMargin * 25), 1) . "px;";
                             }
                             $lastToTime = $to;

                             ?>;">
                            <p class="event-category">{{ $oneTimeEvent->name }}</p>

                            <?php if ($to - $from >= 3) { ?>

                            <p class="event-from">{{ $oneTimeEvent->from }}</p>
                            <p class="event-to">{{ $oneTimeEvent->to }}</p>

                            <?php } ?>

                        <!-- +++++++++++++++ ACCEPTED LABEL +++++++++++++++ -->
                            @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                <p class="event-accepted">accepted</p>
                            @endif


                        <!-- +++++++++++++++ HIDDEN DATA  +++++++++++++++ -->
                            <p style="display: none;" class="event-date-hidden">{{ $oneTimeEvent->date }}</p>
                            <p style="display: none;" class="event-employee-hidden">{{ $thisEmployee->id }}</p>


                            <!-- If calendar in Admin Planning Store or Employee -->
                            @if( strpos(url()->current(),'/admin/planning'))


                            <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                @if ( $oneTimeEvent->name == "Work" || $oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness")
                                    <div class="event-dropdown-content options-proposal-time-{{ $oneTimeEvent->id }}">


                                        <!-- +++++++++++++++ OPTIONS PUT TO WORKTIME FIX +++++++++++++++ -->
                                    @if ( $oneTimeEvent->name == "Work")
                                        <!-- Add Button -->
                                            <button onclick="openModalEvent('event-proposal-time-', '{{ $oneTimeEvent->id }}', 'modal-event-admin-add-final', 'NULL' )" class="green-button">+</button>
                                    @endif


                                    <!-- +++++++++++++++ OPTIONS VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name ==  "Vacation" || $oneTimeEvent->name =="Illness" ) && $oneTimeEvent->accepted == 0)
                                            <form method="POST" action="{{ url('admin/acceptEvent') }}"> {{ csrf_field() }}
                                                <input style="display: none;" name="thisUrl" value="{{ url()->current() }}">
                                                <button class="green-button" name="eventId" value="{{ $oneTimeEvent->id }}">OK</button>
                                            </form>
                                        @endif


                                    <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name ==  "Vacation" || $oneTimeEvent->name =="Illness" ) && $oneTimeEvent->accepted == 1)
                                            <form method="POST" action="{{ url('admin/notAcceptEvent') }}"> {{ csrf_field() }}
                                                <input style="display: none;" name="thisUrl" value="{{ url()->current() }}">
                                                <button class="red-button" name="eventId" value="{{ $oneTimeEvent->id }}">-</button>
                                            </form>
                                        @endif

                                    </div>
                                @endif

                            @endif


                        <!-- If calendar in Employee Planning -->
                            @if( strpos(url()->current(),'/employee/planning') )

                            <!-- +++++++++++++++ OPTIONS CHANGE DELETE +++++++++++++++ -->
                                <div class="event-dropdown-content options-proposal-time-{{ $oneTimeEvent->id }}">

                                    <!-- Change Button -->
                                    <button onclick="openModalEvent('event-proposal-time-', '{{ $oneTimeEvent->id }}', 'modal-event-employee-change', 'NULL' )" class="yellow-button">⇄</button>

                                    <!-- JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                    <button class="red-button" onclick="deleteEventAJAX('event-proposal-time-', '{{ $oneTimeEvent->id }}', '{{ url('/deleteEventAJAX') }}' )">-</button>
                                </div>
                            @endif

                        </div>

                        <?php
                        $countEvent++;
                        if ($countEvent == $eventsPerDay) {

                        $fullMargin = "24.00" - $lastToTime;

                        $firstMargin = fmod($lastToTime, 1);
                        if ($firstMargin != 0) {
                            $firstMargin -= 1;
                            $firstMargin = substr($firstMargin, 1);
                        }

                        $middleMargin = $fullMargin - $firstMargin;

                        ?>
                        @if ($fullMargin >= 1)
                            <hr style="border: 0.1px solid var(--grey-30); margin: <?= $firstMargin * 25 ?>px 0 0 0;">
                        @endif

                        @for($f = 0; $f < $middleMargin; $f++)
                            <hr style="border: 0.1px solid var(--grey-30); margin: 25px 0 0 0;">
                        @endfor

                        <?php  } ?>








                    @endif
                @endforeach


            </td>
            @endfor
</tr>