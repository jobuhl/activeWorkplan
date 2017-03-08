<!-- Modal body-->
<div class="modal-body">

    <!-- Zeile 1 -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <select class="selectpicker form-control modal-input space-cap" name="category">

                @if( strpos(url()->current(),'/admin/planning'))
                    <option>Work Final</option>
                @else
                    <option class="category-overwrite">overwrite</option>
                    <option disabled>----------</option>
                    @foreach($category as $cat )
                        @if ($cat->name != 'Work Final')
                            <option>{{ $cat->name }}</option>
                        @endif
                    @endforeach
                @endif

            </select>
        </aside>
    </div>

    <!-- Zeile 2 -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4 aside-left-add">Time</aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <input class="date-overwrite datepicker inputmodal form-control space-cap" type="date" name="date"/>
        </aside>
    </div>

    <!-- Zeile 3 -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4"></aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <input class="from-overwrite inputmodal form-control space-cap" type="text" name="time-from" placeholder="From"/>
        </aside>
    </div>

    <!-- Zeile 4 -->
    <div class="row">
        <!-- links -->
        <aside class="col-xs-12 col-sm-4"></aside>
        <!-- rechts -->
        <aside class="col-xs-12 col-sm-8 aside-right">
            <input class="to-overwrite inputmodal form-control space-cap" type="text" name="time-to" placeholder="To"/>
        </aside>
    </div>

</div>