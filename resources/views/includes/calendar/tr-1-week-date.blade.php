
<!-- +++++++++++++++ WEEK DATE +++++++++++++++ -->
<tr class="week-date">
    <td class="button-show"></td>

    @for ($i = 0; $i < 7; $i++)
        <td>
            {{ (new DateTime($week[$i]))->format('d.m.') }}
        </td>
    @endfor
</tr>
