function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{10})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
	//alert regexp;
    return amount_parts.join('.');
}

function actualiza(i)
{
	cantidad=document.getElementById('cantidad'+ i).value;
	precio=document.getElementById('precio'+ i).value;
	document.getElementById('subtotal'+ i).setAttribute("value", number_format(precio*cantidad,2));
	actGranTotal();
}
function actGranTotal()
{

	tabla=document.getElementById('tabla');
	monto=0;
	for (var i=1; i < tabla.rows.length-3; i++)
	{

		monto=parseFloat(monto)+parseFloat(document.getElementById('subtotal'+ i).value);
	}
	document.getElementById('subtotal').setAttribute("value", number_format(monto,2));
	subtotal=document.getElementById('subtotal').value;
	impuestos=parseFloat(subtotal)*0.16;
	document.getElementById('impuesto').setAttribute("value", number_format(impuestos,2));
	granTotal=parseFloat(impuestos)+parseFloat(subtotal);
	document.getElementById('total').setAttribute("value", number_format(granTotal,2));
}

function actualizaRfc()
{

	mySelect=document.getElementById('proveedor');
	mi_nuevo_rfc=mySelect.options[mySelect.selectedIndex].getAttribute("mi_rfc");
	document.getElementById('rfc').value=mi_nuevo_rfc;
}


function inicializaFecha()
{
  var f = new Date(); //Fecha actual
  var mes = f.getMonth()+1; //obteniendo mes
  var dia = f.getDate(); //obteniendo dia
  var ano = f.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes; //agrega cero si el menor de 10

  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;

//document.getElementById('fecha').setAttribute("value", ano+"-"+mes+"-"+dia);
}

function actualizaPrecio(i)
{
	mySelect=document.getElementById('producto'+i);
	mi_nuevo_precio=mySelect.options[mySelect.selectedIndex].getAttribute("mi_precio");
	document.getElementById('precio'+i).value=number_format(mi_nuevo_precio,2);
	actualiza(i);
}

function actualizaUsuario() {
  mySelect=document.getElementById('usuario');
  mi_nuevo_usuario= mySelect.options[mySelect.selectedIndex].getAttribute("mi_user");
  document.getElementById('no_usuario').value=mi_nuevo_usuario;
}

function actualizaCliente() {
  mySelect=document.getElementById('cliente');
  mi_nuevo_cliente= mySelect.options[mySelect.selectedIndex].getAttribute("mi_user");
  document.getElementById('no_cliente').value=mi_nuevo_cliente;
}


window.onload=inicializaFecha;
