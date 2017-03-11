<!-- +++++++++++++++ ADD BUTTONS +++++++++++++++ -->
<tr class="add-buttons">
    <td class="button-show"></td>
    @for ($i = 0; $i < 7; $i++)
        @if((new DateTime())->format('Y-m-d') == $week[$i])
            <td class="today">
        @else
            <td>
            @endif
            <!-- If calendar in Admin Planning or Single -->
                @if( strpos(url()->current(),'/employee/planning'))
                    <a class="round-button green-button" onclick="openModalEvent('NULL', 'NULL', 'modal-event-employee-add', '{{ $week[$i] }}')">+</a>
                @endif
            </td>
            @endfor
</tr>