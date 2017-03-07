<div class="modal-footer-2">
    <form method="POST" action="{{ url('/employee/login') }}"> {{ csrf_field() }}

        <input style="display: none;" type="email" class="overwrite-emp-email" name="email">

        <input style="display: none;" type="password" class="overwrite-emp-password" name="password">

        <input style="display: none;" type="checkbox" id="checkbox-emp-input" name="remember"/>

        <button type="submit" class="form-control green-button space-just-bottom">Login as Employee</button>

    </form>
</div>











