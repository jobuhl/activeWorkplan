

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">



<!--Dropdown Menü bei change in account employee Suche über buchstabeneingabe möglich-->


 <h5 class="select-ueberschrift">Search or select the Employee</h5>
<br>

    <select class="form-control to-right modal-input space-cap selectpicker col-xs-12"  data-live-search="true"
            name="retail_store_name">

        @foreach($retailStores as $retailStore)
            <optgroup label="{{ $retailStore->name }}">

                <option style="display: none">Search...</option>
                @foreach($employees as $employee)
                    @if($employee->retail_store_id == $retailStore->id)

                    <option>{{ $employee->name }} {{ $employee->forename }}</option>

                    @endif
                    @endforeach

            </optgroup>
        @endforeach
    </select>