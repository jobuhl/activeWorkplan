<!-- +++++++++++++++ TIME EVENTS +++++++++++++++ -->
<tr class="time-events">
    <td class="button-show"></td>
@for ($i = 0; $i < 7; $i++)


    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
            <td class="today">
        @else
            <td>
            @endif

            <!-- +++++++++++++++ ALL WORKTIME EVENT +++++++++++++++ -->
            @foreach($manyWorktimeEvent as $oneWorktimeEvent)
                @if( (new DateTime($oneWorktimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                && $oneWorktimeEvent->employee_id == $thisEmployee->id)


                    <!-- +++++++++++++++ ONE WORKTIME EVENT +++++++++++++++ -->
                        <div class="drop-btn one-time-event {{ $oneWorktimeEvent->color }}"
                             onclick="openEventOptions('options-final-time-' + {{ $oneWorktimeEvent->id }} + '')"
                             draggable="true"
                             id="event-final-time-{{ $oneWorktimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p class="event-category">{{ $oneWorktimeEvent->name }}</p>
                            <p class="event-from">{{ $oneWorktimeEvent->from }}</p>
                            <p class="event-to">{{ $oneWorktimeEvent->to }}</p>


                            <!-- If calendar in Admin Planning or Single -->
                        @if( strpos(url()->current(),'/admin/planning'))


                            <!-- +++++++++++++++ HIDDEN DATA  +++++++++++++++ -->
                                <p style="display: none;" class="event-date-hidden">{{ $oneWorktimeEvent->date }}</p>
                                <p style="display: none;" class="event-employee-hidden">{{ $thisEmployee->id }}</p>


                                <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                <div class="event-dropdown-content options-final-time-{{ $oneWorktimeEvent->id }}">

                                    <!-- Change Button -->
                                    <button onclick="openModalChangeTime('event-final-time-', '{{ $oneWorktimeEvent->id }}' )" class="change-event-button">⇄</button>

                                    <!-- JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                    <button class="delete-event-button" onclick="deleteEventAJAX('event-final-time-', '{{ $oneWorktimeEvent->id }}', '{{ url('/deleteWorktimeEventAJAX') }}' )">
                                        -
                                    </button>


                                </div>

                            @endif
                        </div>
                @endif
            @endforeach


            <!-- +++++++++++++++ ALL TIME EVENT +++++++++++++++ -->
            @foreach($manyTimeEvent as $oneTimeEvent)
                @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                    && (( $oneTimeEvent->name == ("Vacation" || "Illness")) && $oneTimeEvent->accepted == 1)
                    && $oneTimeEvent->employee_id == $thisEmployee->id)

                    <!-- +++++++++++++++ ONE TIME EVENT +++++++++++++++ -->
                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                             onclick="openEventOptions('options-final-time-2-' + {{ $oneTimeEvent->id }} + '')"
                             draggable="true"
                             id="event-final-time-2-{{ $oneTimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p class="event-category">{{ $oneTimeEvent->name }}</p>
                            <p class="event-from">{{ $oneTimeEvent->from }}</p>
                            <p class="event-to">{{ $oneTimeEvent->to }}</p>

                            <!-- If calendar in Admin Planning or Single -->
                        @if( strpos(url()->current(),'/admin/planning') || strpos(url()->current(),'/admin/planning-single'))

                                <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                @if ( $oneTimeEvent->name == ( "Work"  || "Vacation"  || "Illness"))
                                    <div class="event-dropdown-content options-final-time-2-{{ $oneTimeEvent->id }}">


                                        <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name == ("Vacation" || "Illness" )) && $oneTimeEvent->accepted == 1)
                                            <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                @include('includes.calendar.thisUrlId')
                                                <button class="delete-button" name="eventId" value="{{ $oneTimeEvent->id }}">-</button>
                                            </form>
                                        @endif

                                    </div>
                                @endif
                            @endif

                        </div>

                    @endif
                @endforeach


            </td>
            @endfor
</tr>
