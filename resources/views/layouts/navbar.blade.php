
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('ligthbox/lightbox.js') }}"></script>
<link rel="stylesheet" href="{{ asset('ligthbox/lightbox.css') }}">

<div class="menu-application flexbox">
        <div class="auth flex">
            <a href="img/icon.png" data-lightbox="icon" data-title="photo-perfil">
                <div class="menu-icon"></div>
            </a>
            <div class="menu-text flexbox">
                Bienvenido: {{ auth()->user()->name }}
            </div>
        </div>
        
        <div class="options flex">
            <a href="{{ route('menu') }}"><i class="icon-build"></i> Menu</a>

            <form action="{{ route('logout') }}" method="POST" id="form_nav">
                {{ csrf_field() }}
        
            <button type="submit" class="btn-none logout-nav"><i class="icon-settings"></i> Logout</button>
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