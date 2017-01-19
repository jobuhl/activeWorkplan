<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>


<body>
@include('admin.includes.header')

<noscript>
    <p class="no-script-message">
        This Website requires JavaScript. Please make sure to activate JavaScript in your Browser.
    </p>
</noscript>

@yield('content')

@include('admin.includes.footer')
</body>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('/js/general/header-footer.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script>
    $(document).ready(function () {
        $("#search-store-overview").keyup(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            <!-- AJAX -->
            var inputValue = $("#search-store-overview").val();
            var html = "<ul>";
            var tableHtml = "";
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/searchOverview') }}",
                data: {'inputValue': inputValue },
                dataType: "json",
                success: function (response) {
                    $.each(response.store, function () {
                        html += "<li><a >" + this['name'] + "</a></li>";
                    });
                    $("#search-store-response-overview").html(html);

                    {{--$.each(response.store, function () {--}}
                        {{--tableHtml += "<table class='calendar-days-all-emp'>";--}}
                        {{--tableHtml += "<div class='print-email table-head-store'>";--}}
                        {{--tableHtml += "<a class='table-head-a'>" + this['name'] + "</a>";--}}
                        {{--tableHtml += "</div>";--}}

                        {{--tableHtml += "<tr class='week-date'>";--}}
                        {{--tableHtml += "<td class='button-show'></td>";--}}
                        {{--for (var i = 0; i < 7; i++) {--}}
                            {{--tableHtml += "<td>" + {{(new DateTime())->format('d.m.')}} + "</td>"--}}
                        {{--}--}}
                        {{--tableHtml += "</tr>";--}}

                        {{--tableHtml += "</table>";--}}
                    {{--});--}}
//                    $('#overview-get-search-store-tables').html(tableHtml);


















                    {{--@foreach($allRetailStores as $retailStore)--}}



                        {{--<!------------------- WEEKDAY ----------------------->--}}
                        {{--<tr class='week-days'>--}}
                        {{--<td class='button-show'>Employees</td>--}}
                            {{--@for ($i = 0; $i < 7; $i++)--}}


                        {{--<!------------------- IF TODAY ----------------------->--}}
                            {{--@if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))--}}
                        {{--<td class='today'>--}}
                            {{--@else--}}
                        {{--<td>--}}
                            {{--@endif--}}
                            {{--{{ $week[$i]->format('D') }}</td>--}}
                            {{--@endfor--}}
                        {{--</tr>--}}


                        {{--<!------------------- EMPLOYEE ROW ----------------------->--}}
                            {{--@foreach($allEmployees as $employee)--}}
                            {{--@if($employee->retail_store_id == $retailStore->id)--}}
                        {{--<tr class='button-hide'>--}}
                        {{--<td>{{ $employee->surname }} </td>--}}

                        {{--<td>&nbsp;{{ $employee->forename }}</td>--}}
                    {{--</tr>--}}

                    {{--<tr class='all-day '>--}}
                        {{--<td class='button-show'>{{ $employee->surname }} {{ $employee->forename }}</td>--}}
                            {{--@for ($i = 0; $i < 7; $i++)--}}


                        {{--<!------------------- IF TODAY ----------------------->--}}
                            {{--@if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))--}}
                        {{--<td class='today'>--}}
                            {{--@else--}}
                        {{--<td>--}}
                            {{--@endif--}}


                        {{--<!------------------- ALLDAY EVENT ----------------------->--}}
                            {{--@foreach($manyAlldayEvent as $oneAlldayEvent)--}}
                            {{--@if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')--}}
                            {{--&& (( $oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness') && $oneAlldayEvent->accepted == 1)--}}
                            {{--&& $oneAlldayEvent->employee_id == $employee->id)--}}
                        {{--<div class='one-allday-event {{ $oneAlldayEvent->color }}'--}}
                    {{--draggable='true'>--}}
                        {{--<p>{{ $oneAlldayEvent->name }}</p>--}}
                        {{--</div>--}}
                            {{--@endif--}}
                            {{--@endforeach--}}

                        {{--</td>--}}
                            {{--@endfor--}}
                        {{--</tr>--}}


                        {{--<!------------------- TIME EVENT ----------------------->--}}
                        {{--<tr class='time-events'>--}}
                        {{--<td class='button-show'></td>--}}
                            {{--@for ($i = 0; $i < 7; $i++)--}}
                            {{--@if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))--}}
                        {{--<td class='today'>--}}
                            {{--@else--}}
                        {{--<td>--}}
                            {{--@endif--}}
                            {{--@foreach($manyWorktimeEvent as $oneWorktimeEvent)--}}
                            {{--@if( (new DateTime($oneWorktimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')--}}
                            {{--&& $oneWorktimeEvent->employee_id == $employee->id)--}}
                        {{--<div class='one-time-event {{ $oneWorktimeEvent->color }}'--}}
                    {{--draggable='true'>--}}
                        {{--<p>{{ $oneWorktimeEvent->name }}</p>--}}
                        {{--<p>{{ $oneWorktimeEvent->from }}</p>--}}
                        {{--<p>{{ $oneWorktimeEvent->to }}</p>--}}
                        {{--</div>--}}
                            {{--@endif--}}
                            {{--@endforeach--}}


                            {{--@foreach($manyTimeEvent as $oneTimeEvent)--}}
                            {{--@if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')--}}
                            {{--&& (( $oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness') && $oneTimeEvent->accepted == 1)--}}
                            {{--&& $oneTimeEvent->employee_id == $employee->id)--}}
                        {{--<div class='one-time-event {{ $oneTimeEvent->color }}'--}}
                    {{--draggable='true'>--}}
                        {{--<p>{{ $oneTimeEvent->name }}</p>--}}
                        {{--<p>{{ $oneTimeEvent->from }}</p>--}}
                        {{--<p>{{ $oneTimeEvent->to }}</p>--}}
                        {{--</div>--}}
                            {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</td>--}}
                            {{--@endfor--}}
                        {{--</tr>--}}
                            {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                        {{--<br>--}}
                    {{--@endforeach--}}














                }
            });
        });
    });
</script>


@yield('js')

</html>