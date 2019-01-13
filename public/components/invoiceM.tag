<invoiceM>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-6">
                <input id="cliente_id" class="form-control" type="hidden" value="{cliente_id}"/>
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
            <input id="mecanica_id" class="form-control" type="hidden" value="{mecanica_id}"/>
            <input id="mecanica" class="form-control" type="text" placeholder="Nombre del diagnostico"/>
        </div>
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">S/.</span>
                <input id="price" class="form-control" type="text" placeholder="Precio" value="{total_costo}" readonly/>
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addMecanicaToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="icon-add"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Mecanica</th>
            <th class="text-right"></th>
            <th class="text-right">P.U</th>
            <th class="text-right">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeMecanicaFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{diagnostico}</td>
            <td class="text-right"></td>
            <td class="text-right">$ {precio_unitario.toFixed(2)}</td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ {iva.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">$ {subtotal.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tfoot>
    </table>


    <button if={detail.length > 0 && cliente_id > 0} onclick={__save} class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

<script>
        var self = this;

        self.client_id = 0;
        self.detail = [];
        self.iva = 0;
        self.subtotal = 0;
        self.total = 0;

        self.on('mount', function(){
            __clientAutocomplete();
            __mecanicaAutocomplete();
        })

        __removeMecanicaFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __addMecanicaToDetail(){
            self.detail.push({
                id: parseFloat($("#mecanica_id").val()),
                diagnostico: $("#mecanica").val(),
                precio_unitario:  parseFloat($("#price").val()),
                total:  parseFloat($("#price").val())
            });

            console.log(self.detail)
            $("#mecanica_id").val(0);
            $("#mecanica").val('');
            $("#price").val('');

            __calculate();
        }

        __save() {
            $.post(baseUrl('MfacturaAdd'), {
                cliente_id: self.cliente_id,
                iva: self.iva,
                subtotal: self.subtotal,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) {
                    window.location.href = baseUrl('Mfactura');
                } else {
                    alert('Ocurrio un error');
                }
            }, 'json')
        }

        function __calculate(){
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
            self.subtotal = parseFloat(total / 1.18);
            self.iva = parseFloat(total - self.subtotal);
        }

        function __clientAutocomplete(){
            var client = $("#client"),
                options = {
                url: function(q){
                    return baseUrl('Mfactura/findClient?q=' + q);
                },

                getValue: function(element) {
                    return element.nombres+' '+element.apellidos;
                },
                list: {
                    onClickEvent: function() {
                        var e = client.getSelectedItemData();
                        self.cliente_id = e.id;
                        self.telefono = e.telefono;
                        self.direccion= e.direccion;
                        
                        self.update();
                    }
                }

            };

            client.easyAutocomplete(options);
        }

        function __mecanicaAutocomplete(){
            var mecanica = $("#mecanica"),
                options = {
                url: function(q){
                    return baseUrl('Mfactura/findMecanica?q=' + q);
                },

                getValue: "diagnostico",
                list: {
                    onClickEvent: function() {
                        var e = mecanica.getSelectedItemData();
                        self.mecanica_id = e.id;
                        self.total_costo = parseFloat(e.total_repuesto + e.total_mano_obra);
                        
                        self.update();
                    }
                }

            };

            mecanica.easyAutocomplete(options);
        }
</script>

</invoiceM>
