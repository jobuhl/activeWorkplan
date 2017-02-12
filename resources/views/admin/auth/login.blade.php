<div class="modal-body">
    <form class="form-horizontal" method="POST" action="{{ url('/admin/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <div class="col-xs-12">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-xs-12">
                <input type="password" class="form-control" name="password" placeholder="Password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <button type="submit" class="form-control add-button">Login</button>
            </div>
        </div>

        <div class="form-group">

            <div class="col-xs-12 col-sm-6">
                <!-- hier war einmal ein div mit der kasse "checkbox" drum herum-->
                <div class="my-checkbox">
                    <input type="checkbox" id="checkbox-adm-input" name="remember"/>
                    <label for="checkbox-adm-input">Remember Me</label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <a class="form-control next-button" href="{{ url('/admin/password/reset') }}">Forgot Your Password?</a>
            </div>
        </div>
    </form>
</div>

