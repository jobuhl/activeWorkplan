<!-- +++++++++++++++ TIME EVENTS +++++++++++++++ -->
<tr class="time-events">
    <td class="button-show">
        @if( strpos(url()->current(),'/employee/')) Time-Events @endif
    </td>
@for ($i = 0; $i < 7; $i++)


    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('Y-m-d') == $week[$i])
            <td class="today">
        @else
            <td>
            @endif


            <!-- +++++++++++++++ ALL TIME EVENT +++++++++++++++ -->
            @foreach($manyTimeEvent as $oneTimeEvent)
                @if( (new DateTime($oneTimeEvent->date))->format('Y-m-d') == $week[$i]
                    && ($oneTimeEvent->name == 'Work Final' || (( $oneTimeEvent->name == ("Vacation" || "Illness")) && $oneTimeEvent->accepted == 1) )
                    && $oneTimeEvent->employee_id == $thisEmployee->id)

                    <!-- +++++++++++++++ ONE TIME EVENT +++++++++++++++ -->
                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                             onclick="openEventOptions('options-final-time-' + {{ $oneTimeEvent->id }} + '')"
                             draggable="true"
                             id="event-final-time-{{ $oneTimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p class="event-category">{{ $oneTimeEvent->name }}</p>
                            <p class="event-from">{{ $oneTimeEvent->from }}</p>
                            <p class="event-to">{{ $oneTimeEvent->to }}</p>

                            <!-- If calendar in Admin Planning or Single -->
                        @if( strpos(url()->current(),'/admin/planning'))

                            <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                @if ( $oneTimeEvent->name == "Vacation"  || $oneTimeEvent->name == "Illness")
                                    <div class="event-dropdown-content options-final-time-{{ $oneTimeEvent->id }}">


                                        <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name == ("Vacation" || "Illness" )) && $oneTimeEvent->accepted == 1)
                                            <form method="POST" action="{{ url('admin/notAcceptEvent') }}"> {{ csrf_field() }}
                                                <input style="display: none;" name="thisUrl" value="{{ url()->current() }}">
                                                <button class="red-button" name="eventId" value="{{ $oneTimeEvent->id }}">-</button>
                                            </form>
                                        @endif

                                    </div>
                                @endif

                                @if ( $oneTimeEvent->name == "Work Final")

                                <!-- +++++++++++++++ HIDDEN DATA  +++++++++++++++ -->
                                    <p style="display: none;" class="event-date-hidden">{{ $oneTimeEvent->date }}</p>
                                    <p style="display: none;" class="event-employee-hidden">{{ $thisEmployee->id }}</p>


                                    <!-- +++++++++++++++ OPTIONS WORK FINAL CHANGE DELETE +++++++++++++++ -->
                                    <div class="event-dropdown-content options-final-time-{{ $oneTimeEvent->id }}">

                                        <!-- Change Button -->
                                        <button onclick="openModalEvent('event-final-time-', '{{ $oneTimeEvent->id }}', 'modal-event-admin-change-final', 'NULL' )" class="yellow-button">⇄</button>

                                        <!-- Delete-Button JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                        <button class="red-button" onclick="deleteEventAJAX('event-final-time-', '{{ $oneTimeEvent->id }}', '{{ url('/deleteEventAJAX') }}' )">
                                            -
                                        </button>


                                    </div>
                                @endif



                            @endif

                        </div>

                    @endif
                @endforeach


            </td>
            @endfor
</tr>
