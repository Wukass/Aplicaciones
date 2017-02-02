<html>
<head>
<style type="text/css">
body{background-color:gainsboro}
ul{list-style-type:none;margin-left:-40px}
ul li{display:flex;flex-direction:column;padding-top:20px;font-size:1.5em;color:white;padding-left:20px}
ul li a{color:white}

ul li:first-child{content:"Lista de los Productos"}
ul li:nth-child(2)e {content:"Nuevo Producto"}
ul li:nth-child(3) {content:"Modificación / Eliminación de un producto"}
ul:nth-child(2) li:last-child {content:"Hacer la compra"}
article ul:last-child li{display:flex;flex-direction:row;justify-content:space-around}

	a{text-decoration:none}
	header{width:100$;height:150px;background-color:lightgreen;text-align:center;vertical-align:middle;}
	header p:first-child{font-size:4em}
	header p:nth-child(2){margin-top:-50px}
	
	
	table td,table th{padding:10px;text-align:center;}
	table caption{text-decoration:overline;font-size:2em}
	table{}
	div #contenedor{margin-top:-50px}
	article{display:flex;flex-direction:row;justify-content:space-around;background-color:purple;}
	
	.paginas ul li:hover{color:red}
	.paginas{display:flex;flex-direction:row;justify-content:space-around}
	.paginas ul li{float:left;margin:20px;color:red}
	.paginas ul li a:visited{color:red}
	.paginas ul li a:active{color:red}
	.paginas ul li a:link{color:red}
</style>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded',EventoCantidadProductos);

function EventoCantidadProductos(){
	stock();
}
function stock(){
	var boton=document.getElementsByName('boton')[0];
	boton.addEventListener('click',precio);
	
	var inputCantidad=document.getElementsByName('cantidad[]');
	for(var i=0;i<inputCantidad.length;i++){
		inputCantidad[i].addEventListener('blur',function(e){
			aviso(e);
			})
	}
	
	var valor=0;
	function aviso(e){
		var precioTotal=document.getElementsByName('precio_total')[0];
		var stock=e.target.parentNode.previousElementSibling.firstElementChild.firstChild.nodeValue;
		console.log(e.target.value+" - "+stock);
		if(+(e.target.value) <= +(stock) ){
			console.log("valor: "+valor);
			if(valor==0){
				e.target.parentNode.nextElementSibling.style.visibility="visible";
			valor=0;
			}else{
				e.target.parentNode.nextElementSibling.firstElementChild.firstChild.nodeValue="OK";
				valor=0;
			}
		}else{
			e.target.parentNode.nextElementSibling.firstElementChild.firstChild.nodeValue="No hay tantos productos disponibles";
			e.target.parentNode.nextElementSibling.style.visibility="visible";
			valor=1;
			e.target.focus();
		}
	}
}

function precio(e){
	var inputCantidad=document.getElementsByName('cantidad[]');
	var total=0;
	for(var i=0;i<inputCantidad.length;i++){
		var precio = inputCantidad[i].parentNode.previousElementSibling.previousElementSibling.firstElementChild.textContent;
		var cantidad = inputCantidad[i].value;
		total+=(+(precio)*cantidad);
	}
	console.log("total: "+total);
	var precio_total=document.getElementsByName('precio_total')[0].value=total;
	var pagar=document.getElementsByName('total')[0].textContent=total;
	
}
</script>
	<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body align="center">
<header>
	<p>Aplicacion Laravel<p>
	<p> Desarrollo Web en Entorno Servidor<p>
	<p> Diego Vera Isabel<p>
</header>
<article>
<ul>
	<li><a href="/producto/create">Nuevo Producto</a></li>
	<li><a href="/proveedor/create">Nuevo Proveedor</a></li>	
	<li><a href="/venta">Ventas Realizadas</a></li>	
</ul>
<ul>
	<li><a href="/modificar">Eliminar / Modificar un Producto</a></li>
	<li><a href="/modificarP">Eliminar / Modificar un Proveedor</a></li>
	<li><a href="/comprar">Hacer la compra</a></li>
	
</ul>
<ul>
	<li><a href="/tienda">Lista de Productos</a></li>
	<li><a href="/proveedores">Lista de proveedores</a></li>
	<li><a href="/ProdProv">Productos por Proveedor</a></li>
</ul>
</article>
	@yield('central')
</body>
</html>
