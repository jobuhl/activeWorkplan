<!-- +++++++++++++++ TIME EVENT +++++++++++++++ -->
<tr class="time-events">
    <td class="button-show">
        @if( strpos(url()->current(),'/employee/')) Time-Events @endif
    </td>

@for ($i = 0; $i < 7; $i++)


    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('Y-m-d') == $week[$i])
            <td class="today">@else
            <td>@endif


            <!-- +++++++++++++++ ALL TIME EVENT +++++++++++++++ -->
            @foreach($manyTimeEvent as $oneTimeEvent)
                @if( (new DateTime($oneTimeEvent->date))->format('Y-m-d') == $week[$i]
                    && $oneTimeEvent->name != 'Work Final'
                    && $oneTimeEvent->employee_id == $thisEmployee->id )


                    <!-- +++++++++++++++ ONE TIME EVENT +++++++++++++++ -->
                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                             onclick="openEventOptions('options-proposal-time-' + {{ $oneTimeEvent->id }} + '')"
                             draggable="true"
                             id="event-proposal-time-{{ $oneTimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p class="event-category">{{ $oneTimeEvent->name }}</p>
                            <p class="event-from">{{ $oneTimeEvent->from }}</p>
                            <p class="event-to">{{ $oneTimeEvent->to }}</p>


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
                                            <button onclick="openModalEvent('event-proposal-time-', '{{ $oneTimeEvent->id }}', 'modal-change-time-event-admin-add-final', 'NULL' )" class="green-button">+</button>
                                    @endif


                                    <!-- +++++++++++++++ OPTIONS VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name ==  "Vacation" || $oneTimeEvent->name =="Illness" ) && $oneTimeEvent->accepted == 0)
                                            <form method="POST" action="{{ url('admin/acceptTimeEvent') }}"> {{ csrf_field() }}
                                                <input style="display: none;" name="thisUrl" value="{{ url()->current() }}">
                                                <button class="green-button" name="eventId" value="{{ $oneTimeEvent->id }}">OK</button>
                                            </form>
                                        @endif


                                    <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name ==  "Vacation" || $oneTimeEvent->name =="Illness" ) && $oneTimeEvent->accepted == 1)
                                            <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
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
                                    <button onclick="openModalEvent('event-proposal-time-', '{{ $oneTimeEvent->id }}', 'modal-change-time-event-employee', 'NULL' )" class="yellow-button">⇄</button>

                                    <!-- JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                    <button class="red-button" onclick="deleteEventAJAX('event-proposal-time-', '{{ $oneTimeEvent->id }}', '{{ url('/deleteTimeEventAJAX') }}' )">-</button>
                                </div>
                            @endif

                        </div>

                    @endif
                @endforeach


            </td>
            @endfor
</tr>
