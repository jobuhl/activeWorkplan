
<!-- +++++++++++++++ WEEK DAYS +++++++++++++++ -->
<tr class="week-days">
    <td class="button-show">Employee</td>

    @for ($i = 0; $i < 7; $i++)
        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
            <td class="today">
        @else
            <td>
                @endif
                {{ $week[$i]->format('D') }}</td>
            @endfor
</tr>
