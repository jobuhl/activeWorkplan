<!-- +++++++++++++++ TIME EVENT +++++++++++++++ -->
<tr class="time-events">
    <td class="button-show"></td>

@for ($i = 0; $i < 7; $i++)


    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
            <td class="today">@else
            <td>@endif


            <!-- +++++++++++++++ ALL TIME EVENT +++++++++++++++ -->
            @foreach($manyTimeEvent as $oneTimeEvent)
                @if( (new DateTime($oneTimeEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y')
                    && $oneTimeEvent->employee_id == $thisEmployee->id )


                    <!-- +++++++++++++++ ONE TIME EVENT +++++++++++++++ -->
                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                             onclick="openEventDropdown('time-admin' + {{ $oneTimeEvent->id }} + '')"
                             draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}"
                             ondragstart="drag(event)">
                            <p>{{ $oneTimeEvent->name }}</p>
                            <p>{{ $oneTimeEvent->from }}</p>
                            <p>{{ $oneTimeEvent->to }}</p>


                            <!-- +++++++++++++++ ACCEPTED LABEL +++++++++++++++ -->
                            @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                <p class="event-accepted">accepted</p>
                            @endif


                        <!-- +++++++++++++++ HIDDEN DATA  +++++++++++++++ -->
                            <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                            <input style="display: none;" class="this-emp-id" value="{{ $thisEmployee->id }}">


                            <!-- If calendar in Admin Planning or Single -->
                            @if( strpos(url()->current(),'/employer-planning') || strpos(url()->current(),'/employer-single'))


                            <!-- +++++++++++++++ OPTIONS  +++++++++++++++ -->
                                @if ( $oneTimeEvent->name == "Work" || $oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness")
                                    <div id="time-admin{{ $oneTimeEvent->id }}" class="event-dropdown-content">

                                        <!-- +++++++++++++++ OPTIONS PUT TO WORKTIME FIX +++++++++++++++ -->
                                        @if ( $oneTimeEvent->name == "Work")
                                            <button onclick="openAddTimeModalAdmin({{ $oneTimeEvent->id }})" class="add-event-button">+</button>
                                            <button id="button-add-worktime-fix-event-admin{{ $oneTimeEvent->id }}" style="display: none;" data-toggle="modal" data-target="#change-button-event-time-admin">
                                                +
                                            </button>
                                        @endif


                                    <!-- +++++++++++++++ OPTIONS VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name ==  "Vacation" || $oneTimeEvent->name =="Illness" ) && $oneTimeEvent->accepted == 0)
                                            <form method="POST" action="{{ url('admin/acceptTimeEvent') }}"> {{ csrf_field() }}
                                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                                <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                <button class="add-event-button" name="eventId" value="{{ $oneTimeEvent->id }}">OK</button>
                                            </form>
                                        @endif


                                    <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                        @if ( ($oneTimeEvent->name ==  "Vacation" || $oneTimeEvent->name =="Illness" ) && $oneTimeEvent->accepted == 1)
                                            <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                                <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                <button class="delete-button" name="eventId" value="{{ $oneTimeEvent->id }}">-</button>
                                            </form>
                                        @endif

                                    </div>
                                @endif

                            @endif


                        <!-- If calendar in Employee Planning -->
                            @if( strpos(url()->current(),'/employee-planning') )



                            @endif

                        </div>

                    @endif
                @endforeach


            </td>
            @endfor
</tr>
