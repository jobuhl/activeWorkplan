<!-- Wegen Controller redirect -->
@if( strpos(url()->current(),'/admin/planning/'))
    <input style="display: none;" name="thisUrl" value="/admin/planning/{{ $thisRetailStore->id }}/{{ $week[0]->format('d-m-Y') }}">
@endif

@if( strpos(url()->current(),'/admin/planning-single/'))
    <input style="display: none;" name="thisUrl" value="/admin/planning-single/{{ $thisEmployee->id }}/{{ $week[0]->format('d-m-Y') }}">
@endif