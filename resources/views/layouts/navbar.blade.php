
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
<div class="menu-application flexbox">
    <div class="auth flex">
        <div class="menu-icon"></div>
            <div class="menu-text flexbox">
                Bienvenido: {{ auth()->user()->name }}
            </div>
        </div>
        <div class="options flex">
            <a href="{{ route('menu') }}"><i class="icon-build"></i> Menu</a>

            <form action="{{ route('logout') }}" method="POST" id="form_nav">
                {{ csrf_field() }}
        
            <button type="submit" class="logout-nav"><i class="icon-settings"></i> Logout</button>
            </form>
        </div>
</div>

<script type="text/javascript">  
        (function () {
        var form_nav = document.getElementById('form_nav');
        form_nav.addEventListener('submit',SweetAlert_nav);
        
        function SweetAlert_nav(event) {
        // Evitando que el evento "Submit" ocurra
            event.preventDefault();

            swal({
                title: "¿Estas de acuerdo?",
                text: "Aceptar te direccionara al login.",
                icon: "warning",
                buttons: [
                    'Cancelar',
                    'Aceptar'
                ],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Good bye!",
                        text: "Tu sessión ya ha sido cerrada.",
                        icon: "success",
                        buttons: false,
                    });
                
                // Realizando la redireccion "Logout"
                    form_nav.submit();
                } 
                else {
                    swal("Cancelled", "Gracias por seguir interactuando :)", "error");
                }
            });
        }
    })();
</script>