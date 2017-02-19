<!-- +++++++++++++++ ADD BUTTONS +++++++++++++++ -->
<tr class="add-buttons">
    <td class="button-show"></td>
    @for ($i = 0; $i < 7; $i++)
        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
            <td class="today">
        @else
            <td>
            @endif
            <!-- If calendar in Admin Planning or Single -->
                @if( strpos(url()->current(),'/employee/planning'))
                    <a class="round-button" onclick="openModalAddEvent('{{ $week[$i]->format('d-m-Y') }}')">+</a>
                @endif
            </td>
            @endfor
</tr>