<!-- +++++++++++++++ MOBILE EMPLOYEE ROW +++++++++++++++ -->
<tr class="button-hide">
    <td class="button-show"></td>
    <td>{{ $thisEmployee->surname }} </td>
    <td class="no-border-bottom">&nbsp;{{ $thisEmployee->forename }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>


<!-- +++++++++++++++ ALL-DAY +++++++++++++++ -->
<tr class="all-day">

    <td class="button-show">{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</td>
@for ($i = 0; $i < 7; $i++)


    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
            <td class="today">@else
            <td>@endif

            <!-- +++++++++++++++ ALL ALL-DAY EVENT +++++++++++++++ -->
            @foreach($manyAlldayEvent as $oneAlldayEvent)
                @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                    && (( $oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness") && $oneAlldayEvent->accepted == 1)
                    && $oneAlldayEvent->employee_id == $thisEmployee->id)


                    <!-- +++++++++++++++ ONE ALL-DAY EVENT +++++++++++++++ -->
                        <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                             onclick="openEventDropdown('allday-admin-final' + {{ $oneAlldayEvent->id }} + '')"
                             draggable="true"
                             id="div-allday-admin{{ $oneAlldayEvent->id }}">
                            <p>{{ $oneAlldayEvent->name }}</p>


                        <!-- If calendar in Admin Planning or Single -->
                            @if( strpos(url()->current(),'/employer-planning') || strpos(url()->current(),'/employer-single'))


                            <!-- +++++++++++++++ OPTIONS VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                @if ( ($oneAlldayEvent->name == ("Vacation" || "Illness" )) && $oneAlldayEvent->accepted == 0)
                                    <div id="allday-admin-final{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
                                        <form method="POST" action="{{ url('admin/acceptAlldayEvent') }}"> {{ csrf_field() }}
                                            <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                            <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                            <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                            <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                            <button class="add-event-button" name="eventId" value="{{ $oneAlldayEvent->id }}">OK</button>
                                        </form>
                                    </div>
                                @endif


                            <!-- +++++++++++++++ OPTIONS VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                @if ( ($oneAlldayEvent->name == ( "Vacation" || "Illness" )) && $oneAlldayEvent->accepted == 1)
                                    <div id="allday-admin-final{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
                                        <form method="POST" action="{{ url('admin/notAcceptAlldayEvent') }}"> {{ csrf_field() }}
                                            <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                            <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                            <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                            <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                            <button class="delete-button" name="eventId" value="{{ $oneAlldayEvent->id }}">-</button>
                                        </form>
                                    </div>
                                @endif
                            @endif


                        </div>
                    @endif
                @endforeach


            </td>
            @endfor
</tr>