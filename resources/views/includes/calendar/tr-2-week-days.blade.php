<!-- +++++++++++++++ WEEK DAYS +++++++++++++++ -->
<tr class="week-days">
    <td class="button-show">
        @if( strpos(url()->current(),'/admin/')) Employee @endif
    </td>

    @for ($i = 0; $i < 7; $i++)
        @if((new DateTime())->format('d-m-Y') == $week[$i])
            <td class="today">
        @else
            <td>
                @endif
                {{ (new DateTime($week[$i]))->format('D') }}</td>
            @endfor
</tr>
