<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Tasks') }}
        </a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        @yield('content')
    </div>
    <!-- /.login-box-body -->
</div>