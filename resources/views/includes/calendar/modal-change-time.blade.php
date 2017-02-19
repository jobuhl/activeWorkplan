<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-change-time-event" style="display: none;" data-toggle="modal" data-target="#modal-change-time-event">⇄</button>

<!-- Button der Time Event aendert -->
<div id="modal-change-time-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form method="POST"
                  @if( strpos(url()->current(),'/admin/planning/')) action="{{ url('/admin/addWorktimeFix') }}"> @endif
                @if( strpos(url()->current(),'/admin/planning-single/')) action="{{ url('/admin/changeWorktimeFix') }}"> @endif
                @if( strpos(url()->current(),'/employee/planning')) action="{{ url('/employee/timeEventChange') }}"> @endif
            {{ csrf_field() }}


            <!-- Modal header-->
                <div class="modal-header">

                    <!-- Close Button oben rechts im Header -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <!-- Überschrift -->
                    <h2 class="modal-ueberschrift">Change Time Event</h2>
                    <br>

                </div>

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
                                    <option>Work</option>
                                @else
                                    <option class="category-overwrite">overwrite</option>
                                    <option disabled>----------</option>
                                    @foreach($category as $cat )
                                        <option>{{ $cat->name }}</option>
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

                <!-- Modal footer-->
                <div class="modal-footer">

                @if( strpos(url()->current(),'/employee/planning'))

                    <!-- important EventID wird reingeschrieben -->
                        <input style="display: none;" class="id-overwrite" name="thisEventId" value=""/>
                        <button type="submit" class="form-control to-right modal-change-button" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}">Change</button>
                @endif

                @if( strpos(url()->current(),'/admin/planning'))

                    <!-- Wegen Controller redirect -->
                        @if( strpos(url()->current(),'/admin/planning/'))
                            <input style="display: none;" name="thisUrl" value="/admin/planning/{{ $thisRetailStore->id }}/{{ $week[0]->format('d-m-Y') }}">
                        @endif
                        @if( strpos(url()->current(),'/admin/planning-single/'))
                            <input style="display: none;" name="thisUrl" value="/admin/planning-single/{{ $thisEmployee->id }}/{{ $week[0]->format('d-m-Y') }}">
                        @endif

                        <input style="display: none;" class="id-overwrite" name="thisEventId" value=""/>
                        <input style="display: none;" class="employee-overwrite" name="thisEmployeeId" value=""/>
                        <button type="submit" class="form-control to-right add-button">Add</button>

                    @endif
                </div>

            </form>
        </div>
    </div>
</div>