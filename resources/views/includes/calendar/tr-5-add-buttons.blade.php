<!-- +++++++++++++++ ADD BUTTONS +++++++++++++++ -->
<tr class="add-buttons">
    <td class="button-show"></td>
    @for ($i = 0; $i < 7; $i++)
        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
            <td class="today">
        @else
            <td>
                @endif
            </td>
            @endfor
</tr>