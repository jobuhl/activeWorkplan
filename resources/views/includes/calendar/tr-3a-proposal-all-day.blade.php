<!-- +++++++++++++++ MOBILE EMPLOYEE ROW +++++++++++++++ -->
<tr class="button-hide">
    <td class="button-show"></td>
    <td>{{ $thisEmployee->surname }}</td>
    <td class="no-border-bottom">{{ $thisEmployee->forename }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>


<!-- +++++++++++++++ ALL-DAY +++++++++++++++ -->
<tr class="all-day">

    <td class="button-show">
        @if( strpos(url()->current(),'/admin/')) {{ $thisEmployee->surname . ' ' . $thisEmployee->forename }} @endif
        @if( strpos(url()->current(),'/employee/')) Allday-Events @endif
    </td>
@for ($i = 0; $i < 7; $i++)


    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('d-m-Y') == $week[$i])
            <td class="today">@else
            <td>@endif


            <!-- +++++++++++++++ ALL ALL-DAY EVENT +++++++++++++++ -->
            @foreach($manyAlldayEvent as $oneAlldayEvent)
                @if( (new DateTime($oneAlldayEvent->date))->format('d-m-Y') == $week[$i]
                && $oneAlldayEvent->employee_id == $thisEmployee->id)


                    <!-- +++++++++++++++ ONE ALL-DAY EVENT +++++++++++++++ -->
                        <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                             onclick="openEventOptions('options-proposal-allday-' + {{ $oneAlldayEvent->id }} + '')"
                             draggable="true"
                             id="event-proposal-allday-{{ $oneAlldayEvent->id }}">
                            <p class="event-category">{{ $oneAlldayEvent->name }}</p>

                            <!-- +++++++++++++++ ACCEPTED LABEL +++++++++++++++ -->
                            @if ( ($oneAlldayEvent->name == ('Vacation' || 'Illness' )) && $oneAlldayEvent->accepted == 1)
                                <p class="event-accepted">accepted</p>
                            @endif


                        <!-- +++++++++++++++ HIDDEN DATA +++++++++++++++ -->
                            <p class="event-date-hidden" style="display: none">{{ $oneAlldayEvent->date }}</p>

                            <!-- If calendar in Admin Planning or Single -->
                            @if( strpos(url()->current(),'/admin/planning'))

                            <!-- +++++++++++++++ OPTIONS VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                @if ( ($oneAlldayEvent->name ==  "Vacation" || $oneAlldayEvent->name =="Illness" ) && $oneAlldayEvent->accepted == 0)
                                    <div class="event-dropdown-content options-proposal-allday-{{ $oneAlldayEvent->id }}">
                                        <form method="POST" action="{{ url('admin/acceptAlldayEvent') }}"> {{ csrf_field() }}
                                            @include('includes.calendar.thisUrl')
                                            <button class="green-button" name="eventId" value="{{ $oneAlldayEvent->id }}">OK</button>
                                        </form>
                                    </div>
                                @endif


                            <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                @if ( ($oneAlldayEvent->name ==  "Vacation" || $oneAlldayEvent->name =="Illness" ) && $oneAlldayEvent->accepted == 1)
                                    <div class="event-dropdown-content options-proposal-allday-{{ $oneAlldayEvent->id }}">
                                        <form method="POST" action="{{ url('admin/notAcceptAlldayEvent') }}"> {{ csrf_field() }}
                                            @include('includes.calendar.thisUrl')
                                            <button class="red-button" name="eventId" value="{{ $oneAlldayEvent->id }}">-</button>
                                        </form>
                                    </div>
                                @endif

                            @endif


                        <!-- If calendar in Employee Planning -->
                            @if( strpos(url()->current(),'/employee/planning') )

                            <!-- +++++++++++++++ OPTIONS CHANGE DELETE +++++++++++++++ -->
                                <div class="event-dropdown-content options-proposal-allday-{{ $oneAlldayEvent->id }}">

                                    <!-- Change Button -->
                                    <button onclick="openModalEvent('event-proposal-allday-', '{{ $oneAlldayEvent->id }}', 'modal-change-allday-event','NULL' )" class="yellow-button">⇄</button>

                                    <!-- JS Aufruf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                    <button class="red-button" onclick="deleteEventAJAX('event-proposal-allday', '{{ $oneAlldayEvent->id }}', '{{ url('/deleteAlldayEventAJAX') }}' )">-</button>

                                </div>

                            @endif


                        </div>
                    @endif
                @endforeach


            </td>
            @endfor
</tr>