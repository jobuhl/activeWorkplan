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
                             onclick="openEventDropdown('worktime-fix-admin' + {{ $oneWorktimeEvent->id }} + '')"
                             draggable="true"
                             id="div-worktime-fix-admin{{ $oneWorktimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p>{{ $oneWorktimeEvent->name }}</p>
                            <p>{{ $oneWorktimeEvent->from }}</p>
                            <p>{{ $oneWorktimeEvent->to }}</p>

                            <!-- If calendar in Admin Planning or Single -->
                        @if( strpos(url()->current(),'/admin/planning') || strpos(url()->current(),'/admin/planning-single'))


                            <!-- +++++++++++++++ HIDDEN DATA  +++++++++++++++ -->
                                <input value="{{ $oneWorktimeEvent->date }}" style="display: none"/>
                                <input style="display: none;" class="this-emp-id" value="{{ $thisEmployee->id }}">
                                <input style="display: none;" class="this-event-id" value="{{ $oneWorktimeEvent->id }}">


                                <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                <div id="worktime-fix-admin{{ $oneWorktimeEvent->id }}" class="event-dropdown-content">

                                    <button onclick="openChangeWorktimeFixModal({{ $oneWorktimeEvent->id }})" class="change-event-button">⇄</button>
                                    <button id="button-change-worktime-fix-event-admin{{ $oneWorktimeEvent->id }}" style="display: none;" data-toggle="modal" data-target="#change-button-event-worktime-fix-admin"></button>

                                    <!-- JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                    <button class="delete-event-button" onclick="deleteEventAJAX('div-worktime-fix-admin', '{{ $oneWorktimeEvent->id }}', '{{ url('/deleteWorktimeEventAJAX') }}' )">
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
                             onclick="openEventDropdown('time-admin-final' + {{ $oneTimeEvent->id }} + '')"
                             draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p>{{ $oneTimeEvent->name }}</p>
                            <p>{{ $oneTimeEvent->from }}</p>
                            <p>{{ $oneTimeEvent->to }}</p>

                            <!-- If calendar in Admin Planning or Single -->
                        @if( strpos(url()->current(),'/admin/planning') || strpos(url()->current(),'/admin/planning-single'))


                            <!-- +++++++++++++++ HIDDEN DATA  +++++++++++++++ -->
                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                <input style="display: none;" class="this-emp-id" value="{{ $thisEmployee->id }}">


                                <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                @if ( $oneTimeEvent->name == ( "Work"  || "Vacation"  || "Illness"))
                                    <div id="time-admin-final{{ $oneTimeEvent->id }}" class="event-dropdown-content">


                                        <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name == ("Vacation" || "Illness" )) && $oneTimeEvent->accepted == 1)
                                            <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                <input style="display: none;" name="thisUrl" value="/admin/planning/"/>
                                                <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
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
