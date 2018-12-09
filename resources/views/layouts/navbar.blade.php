<div class="menu-application flexbox">
    <div class="auth flex">
        <div class="menu-icon"></div>
            <div class="menu-text flexbox">
                Bienvenido: {{ auth()->user()->name }}
            </div>
        </div>
        <div class="options">
            <a href="{{ route('menu') }}"><i class="icon-build"></i> Menu</a>
        </div>
</div>
