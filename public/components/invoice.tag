<invoice>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-6">
                <input id="client" class="form-control typeahead" type="text" placeholder="Cliente" />
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="text" placeholder="Teléfono" readonly value="{telefono}" />
            </div>
            <div class="col-xs-4">
                <input class="form-control" type="text" placeholder="Dirección" readonly value="{direccion}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="text" placeholder="Cantidad" />
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">S/.</span>
                <input id="price" class="form-control" type="text" placeholder="Precio" />
            </div>
        </div>
        <div class="col-xs-1">
            <button class="btn btn-primary form-control" id="btn-agregar">
                <i class="icon-add"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th class="text-right">Cantidad</th>
            <th class="text-right">P.U</th>
            <th class="text-right">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <button class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>Producto A</td>
            <td class="text-right">10</td>
            <td class="text-right">$ 1200.00</td>
            <td class="text-right">$ 1200.00</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ 1200.00</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">$ 1200.00</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ 1200.00</td>
        </tr>
        </tfoot>
    </table>

<script type="text/javascript">
        var self = this;

        self.on('mount', function(){
            __clientAutocomplete();
        })

        function __clientAutocomplete(){
            var options = {
                url: function(q){
                    return baseUrl('factura/findClient?q=' + q);
                },

                getValue: function(element) {
                    return element.nombres+' '+element.apellidos;
                },
                list: {
                    onClickEvent: function() {
                        var e = $("#client").getSelectedItemData();
                        self.telefono = e.telefono;
                        self.direccion= e.direccion;
                        
                        self.update();
                    }
                }

            };

            $("#client").easyAutocomplete(options);
        }
</script>

</invoice>
