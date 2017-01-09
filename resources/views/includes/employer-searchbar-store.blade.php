<!--Dropdown Menü bei change in account employee Suche über buchstabeneingabe möglich-->

<h5 class="select-ueberschrift">Search or select the Retail Store</h5>

<select class="selectpicker col-xs-12" data-live-search="true">

    <option style="display: none">Search...</option>
    @foreach($allRetailStores as $retailStore)
        <option>{{ $retailStore->id }} {{ $retailStore->name }}</option>
    @endforeach

</select>