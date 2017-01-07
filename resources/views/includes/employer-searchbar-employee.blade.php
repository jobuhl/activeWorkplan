<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">


<!--Dropdown Menü bei change in account employee Suche über buchstabeneingabe möglich-->


<h5 class="select-ueberschrift">Search or select the Employee</h5>
<br>

<select id="select-emp" class="form-control to-right modal-input space-cap selectpicker col-xs-12"
        data-live-search="true"
        name="select-emp" onchange="test(this)">




    @foreach($allRetailStores as $retailStore)
        <optgroup label="{{ $retailStore->name }}">

            <option style="display: none">Search...</option>
            @foreach($allEmployees as $employee)
                @if($employee->retail_store_id == $retailStore->id)

                    <option value="{{ $employee->id }}">{{ $employee->surname }} {{ $employee->forename }}</option>

                @endif
            @endforeach

        </optgroup>
    @endforeach
</select>