<form class="form-horizontal" method="POST" action="{{ url('/admin/login') }}"> {{ csrf_field() }}

    <div class="modal-body">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <div class="col-xs-12">
                <input id="sign-in-email" onkeyup="copyInputSignIn()" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-xs-12">
                <input id="sign-in-password" onkeyup="copyInputSignIn()" type="password" class="form-control" name="password" placeholder="Password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    </div>

    <div class="modal-footer">

        <div class="form-group">

            <div class="col-xs-12 col-sm-6">
                <div class="my-checkbox">
                    <input onclick="markCheckbox()" type="checkbox" id="checkbox-adm-input" name="remember"/>
                    <label for="checkbox-adm-input">Remember Me</label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <a class="form-control blue-light-button" href="{{ url('/admin/password/reset') }}">Forgot Your Password?</a>
            </div>
        </div>

        <button type="submit" class="form-control green-button">Login as Admin</button>
    </div>
</form>


