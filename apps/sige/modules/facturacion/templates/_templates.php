<script id="template-contenedor" type="text/template">
  <div class="control-group">
    <a class="btn" href="<?php echo url_for('facturacion/index') ?>"><span class='icon-th-list'></span>  Listar</a>
    <a href="#" class="btn add-item"><span class="icon-plus-sign"></span> Añadir Item</a>
  </div>
  <div id="contenedor-tabla"></div>
</script>

<script id="template-item" type="text/template">
  <td class="accion-eliminar"><a href="#" class="btn eliminar" title="Eliminar"><i class="icon-trash"></i></a></td>
  <td><%= producto_id %></td>
  <td><input type="text" class="descripcion" name="descripcion" value="<%= descripcion %>"></td>
  <td><input type="text" class="cantidad" data-field="entero" name="cantidad" value="<%= cantidad %>"></td>
  <td class="campo-numero"><input type="text" class="precio" name="precio" data-field="flotante" value="<%= precio %>"></td>
  <td><%= alias_impuesto %></td>
  <td class="campo-numero">
    <%= App.Helpers.FormatearNumero( _total_renglon ) %>
    <input type="hidden" name="id_items[]" value="<%= producto_id %>">
    <input type="hidden" name="descripcion[]" value="<%= descripcion %>">
    <input type="hidden" name="cantidad[]" value="<%= cantidad %>">
    <input type="hidden" name="precio[]" value="<%= precio %>">
    <input type="hidden" name="costo[]" value="<%= costo %>">
    <input type="hidden" name="monto_impuesto[]" value="<%= monto_impuesto %>">
    <input type="hidden" name="alias_impuesto[]" value="<%= alias_impuesto %>">
  </td>
</script>

<script id="template-tabla" type="text/template">
  <table class="table table-striped table-bordered tabla-items-factura">
    <thead>
      <tr>
        <th class="btn-info" colspan="7"><span class='icon-list-alt'></span> Detalle de Items</th>
      </tr>
      <tr class="btn-inverse">
        <th></th>
        <th class="codigo">ID</th>
        <th class="descripcion">Descripción</th>
        <th class="cantidad">Cantidad</th>
        <th class="precio">Precio</th>
        <th class="impuesto">Impuesto</th>
        <th class="total-renglon">Total Renglón</th>
      </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
      <tr>
        <th colspan="6">Sub-Total</th>
        <td class="campo-numero"><span class="sub-total">0.00</span></td>
      </tr>
      <tr>        
        <th colspan="6">Total Impuesto</th>
        <td class="campo-numero"><span class="monto-impuestos">0.00</span></td>
      </tr>
      <tr>                  
        <th colspan="6">Total</th>
        <td class="campo-numero"><span class="monto-total">0.00</span></td>
      </tr>     
    </tfoot>
  </table>
</script>