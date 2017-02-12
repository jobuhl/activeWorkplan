<div class="modal-body">
    <form class="form-horizontal" method="POST" action="{{ url('/employee/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-xs-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="E-Mail">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-xs-12">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" >
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12 col-sm-8">
                <button type="submit" class="form-control add-button space-just-bottom">Login</button>
            </div>

            <div class="col-xs-12 col-sm-4">
                <!-- hier war einmal ein div mit der kasse "checkbox" drum herum-->
                {{--<label>--}}
                    {{--<input type="checkbox" name="remember"> Remember Me--}}
                {{--</label>--}}
                <div class="my-checkbox">
                    <input type="checkbox" id="checkbox-emp-input" name="remember" />
                    <label for="checkbox-emp-input">Remember Me</label>
                </div>
            </div>

        </div>
    </form>
</div>




