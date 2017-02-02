var objetofuncion = objetofuncion || {};
(function(){
'use strict';
var E_empezar=0,E_acabar_perdido=2,E_acabar_ganado=4,E_apuestatodo=6;
var jugador={estado:E_empezar, monedas:0, dinero:50, rondas:0, 
dineromaximo:50, rondamax:0, veces:0, arrayapuesta:[], 
arraydados:[]};
var apuestas={pez:0,gallo:0,gamba:0,tigre:0,calabaza:0,cangrejo:0};
var todos=['tigre','calabaza','gallo','gamba','pez','cangrejo'];
var elecciones=['Una Apuesta','Dos Apuestas','Apuesta a Todos'];
var adicionales=['Dinero','Ronda','Primera Apuesta','Segunda Apuesta','Apuesta','Dados'];
var empezar=0,numeroapuestas=0,activo=false;


function aleatorio(min,max){
 var numero=Math.floor((Math.random()*(max-min))+min);
 return numero;
}

function tirardados(){
 jugador.arraydados.push(todos[aleatorio(0,6)],todos[aleatorio(0,6)],todos[aleatorio(0,6)]);
 console.log("Dados: "+jugador.arraydados);
}

document.addEventListener('DOMContentLoaded',hacerApuestaGrafica);

function hacerApuestaGrafica(){
	if(empezar==0){
	HTML();
	crearCSSAnimales();
	empezar=1;
	}else{
		reemplazar();
	}

	function reemplazar(){
	empezar=0;
	document.getElementsByTagName('body')[0].
	removeChild(document.getElementsByTagName('div')[0]);
	hacerApuestaGrafica();
	}
}

function HTML(){
	
	var div=document.createElement('div');
	div.appendChild(Botones());
	div.appendChild(Eleccion());
	div.appendChild(Jugar());
	div.appendChild(Adicionales());
	
	document.getElementsByTagName('body')[0].appendChild(div);
}

function Botones(){
	var divBotones=document.createElement('div');
		var p=document.createElement('p');
		var textop=document.createTextNode('Paso 1: Elija el numero de apuestas');
		p.appendChild(textop);
		p.style.textAlign='center';
		p.style.fontSize='2em';
		p.style.fontWeight='bold';
		p.style.color='red';
		divBotones.appendChild(p);
		for(var i=0;i<todos.length;i++){
			var boton=document.createElement('button');
			//var texto=document.createTextNode(todos[i]);
			//boton.appendChild(texto);
			boton.id=todos[i];
			boton.style.boxShadow='5px 5px 10px black';
			divBotones.appendChild(boton);
		}
		return divBotones;
}
function Eleccion(){
	var divEleccion=document.createElement('div');
		for(var j=0;j<elecciones.length;j++){
			var boton=document.createElement('button');
			var texto=document.createTextNode(elecciones[j]);
			boton.id=elecciones[j];
			boton.dataset.num=(j+1);
			boton.style.width='200px';
			boton.style.height='100px';
			boton.style.margin='20px';
			boton.style.display='block';
			boton.style.fontSize='2em';
			boton.style.backgroundColor='slategray';
			boton.style.color='white';
			boton.style.borderRadius='20px';
			boton.style.boxShadow='0px 10px 10px black';
			boton.appendChild(texto);
			divEleccion.appendChild(boton);
		}
		return divEleccion;
}

function Jugar(){
	var divJugar=document.createElement('div');
		var boton=document.createElement('button');
		var texto=document.createTextNode('TIRAR LOS DADOS');
		boton.appendChild(texto);
		boton.id='tirar';
		boton.style.width='200px';
		boton.style.height='100px';
		boton.style.margin='20px';
		boton.style.backgroundColor='gray';
		boton.style.color='yellow';
		boton.style.visibility='hidden';
		boton.style.borderRadius='50%';
		divJugar.appendChild(boton);
		for(var i=0;i<adicionales.length;i++){
			if(adicionales[i]=='Apuesta' || adicionales[i]=='Dados'){
				var p=document.createElement('p');
				var arrays=document.createElement('article');
						if(adicionales[i]=='Apuesta'){
							var texto=document.createTextNode(adicionales[i]);
							var textoa=document.createTextNode(jugador.arrayapuesta);
						}else{
							var texto=document.createTextNode(adicionales[i]);
							var textoa=document.createTextNode(jugador.arraydados);
						}
						//p.style.visibility='hidden';
						arrays.id=adicionales[i];
						arrays.style.color='greenyellow';
						p.style.color='white';
						p.style.width='80%';
						p.style.height='70px';
						p.style.margin='10px';
						arrays.style.margin='5px';
						p.style.padding='10px';
						p.style.textAlign='center';
						p.style.cssFloat='left';
						p.style.backgroundColor='darkgoldenrod';
						p.style.borderRadius='25%';
						p.appendChild(texto);
						arrays.appendChild(textoa);
						p.appendChild(arrays);
						divJugar.appendChild(p);
						
					}
				
		}
		return divJugar;
}

function Adicionales(){
	var divAdicional=document.createElement('div');
		for(var i=0;i<adicionales.length;i++){
			if(adicionales[i]=='Dinero' || adicionales[i]=='Ronda'){
				var p=document.createElement('p');
					if(adicionales[i]=='Dinero'){
						var texto=document.createTextNode(adicionales[i]+': '+jugador.dinero);
					}else{
						var texto=document.createTextNode(adicionales[i]+': '+jugador.rondas);
					}
					p.style.width='15%';
					p.id=adicionales[i];
			}else{
				if(adicionales[i]=='Primera Apuesta' || adicionales[i]=='Segunda Apuesta'){
				var divApuesta=document.createElement('div');
				var titulo=document.createElement('article');
				var contenidoApuesta=document.createElement('input');
				var boton=document.createElement('button');
				var textoTitulo=document.createTextNode(adicionales[i]+'  Limite: '+jugador.dinero);
				var textoBoton=document.createTextNode('Realizar Apuesta');
				titulo.appendChild(textoTitulo);
				boton.appendChild(textoBoton);
				contenidoApuesta.type='text';
				if(adicionales[i]=='Primera Apuesta'){
					contenidoApuesta.name='Apuesta1';
				}else{
					contenidoApuesta.name='Apuesta2';
				}
				divApuesta.appendChild(titulo);
				divApuesta.appendChild(contenidoApuesta);
				divApuesta.appendChild(boton);
				divApuesta.style.visibility='hidden';
				divApuesta.style.width='21%';
				divApuesta.style.height='70px';
				divApuesta.style.margin='5px';
				divApuesta.style.padding='10px';
				divApuesta.style.textAlign='center';
				divApuesta.style.cssFloat='left';
				divApuesta.style.backgroundColor='purple';
				divApuesta.style.color='yellow';
				divApuesta.style.borderRadius='10px';
				divAdicional.appendChild(divApuesta);
				}
			}
			p.appendChild(texto);
			
			
			p.style.height='50px';
			p.style.margin='10px';
			p.style.fontSize='1.5em';
			p.style.padding='10px';
			p.style.paddingTop='20px';
			p.style.textAlign='center';
			p.style.backgroundColor='purple';
			p.style.cssFloat='left';
			p.style.color='yellow';
			p.style.borderRadius='10px';
			divAdicional.appendChild(p);
		}
		
		divAdicional.style.clear='left';
		return divAdicional;
}



function crearCSSAnimales(){
	var divBotones=document.getElementsByTagName('div')[1];
	var divEleccion=document.getElementsByTagName('div')[2];
	var divJugar=document.getElementsByTagName('div')[3];
	var botones=document.getElementsByTagName('button');
	
	for(var i=0;i<6;i++){
		//console.log(botones[i]);
		botones[i].style.backgroundImage="url('img/"+todos[i]+".jpg')";
		botones[i].style.backgroundRepeat="no-repeat";
		botones[i].style.backgroundSize="cover";
		//botones[i].style.backgroundColor='lightgreen';
		botones[i].style.margin='20px';
		botones[i].style.color='red';
		botones[i].style.width='200px';
		botones[i].style.height='200px';
		botones[i].style.borderRadius='20px';
		botones[i].disable='true';
	}
	
	divBotones.style.cssFloat='left';
	divBotones.style.width='70%';
	//divBotones.style.visibility='hidden';
	
	divEleccion.style.cssFloat='right';
	divEleccion.style.width='30%';
	divJugar.style.width='30%';
	divJugar.style.cssFloat='right';
	
	
	divEleccion.addEventListener('click',apostar);
}

function apostar(e){
	var divBotones=document.getElementsByTagName('div')[1];
	var divEleccion=document.getElementsByTagName('div')[2];
	var botones=document.getElementsByTagName('button');
	divBotones.addEventListener('click',calcularApuesta);
	//console.log(e.target.dataset.num);
	//console.log(jugador.dinero);
	jugador.veces=e.target.dataset.num;
	if(jugador.veces==1){
		divBotones.firstElementChild.firstChild.nodeValue='Paso 2: Pulse 1 Boton';
		divEleccion.children[0].style.border='blue dashed 3pt';
	}else{
		if(jugador.veces==2){
			divBotones.firstElementChild.firstChild.nodeValue='Paso 2: Pulse 2 Botones';
			divEleccion.children[1].style.border='blue dashed 3pt';
		}else{
			if(jugador.veces==3){
				divBotones.firstElementChild.firstChild.nodeValue='Has decidido apostar a todos los Animales';
				divEleccion.children[2].style.border='blue dashed 3pt';
				for(var i=0;i<6;i++){
				divBotones.children[i].disabled='true';
				}
				jugador.arrayapuesta=todos;
				jugador.monedas=6;
				jugador.estado=E_apuestatodo;
				aceptarApuesta();
			}
		}
	}
	for(var i=0;i<divEleccion.length;i++){
		divEleccion.children[i].disabled='true';
	}
	
	for(var i=0;i<6;i++){
		//console.log(botones[i]);
		divBotones.children[i].enabled='true';
	}
}

function calcularApuesta(e){
	//apuestamonedas();
	var divBotones=document.getElementsByTagName('div')[1];
	console.log(e.target.id);
	if(e.target.id!=""){
		//console.log('numeroapuestas: '+numeroapuestas);
		//console.log('veces: '+jugador.veces);
		if(jugador.veces==1 || jugador.veces==2){
			if(jugador.veces==1){
				//console.log('caso 1');
				jugador.arrayapuesta.push(e.target.id);
				apuestas[e.target.id]=jugador.monedas;
				//console.log(e.target.id);
				pedirMonedas();
			}else{
				//console.log('caso 2');
				jugador.arrayapuesta.push(e.target.id);
				var apuesta1=Math.floor(jugador.monedas/2);
				if(numeroapuestas==1){
				apuestas[e.target.id]=apuesta1;
				}
				numeroapuestas++;
				if(numeroapuestas==2){
				apuestas[e.target.id]=jugador.monedas-apuesta1;
				numeroapuestas=0;
					for(var i=0;i<6;i++){
						divBotones.children[i].disabled='true';
					}
					pedirMonedas();
				}
			}
			
		}
	}
}

function pedirMonedas(){
	var divAdicional=document.getElementsByTagName('div')[4];
	document.getElementsByTagName('div')[1].firstElementChild.firstChild.nodeValue='Paso 3: Introduce las cantidades a apostar';
	var Apuesta1,Apuesta2;
	
	if(jugador.veces==1){
		Apuesta1=divAdicional.children[1].children[2].addEventListener('click',cogerApuesta);
		divAdicional.children[1].style.visibility='visible';
	}else{
		Apuesta2=divAdicional.children[2].children[2].addEventListener('click',cogerApuesta);
		divAdicional.children[1].children[2].style.visibility='hidden';
		divAdicional.children[1].style.visibility='visible';
		divAdicional.children[2].style.visibility='visible';
	}
}

function cogerApuesta(){
	var apuesta,apuesta2;
		if(jugador.veces==1){
			apuesta=+(document.getElementsByTagName('input')[0].value);
			if(jugador.dinero<apuesta){
				document.getElementsByTagName('div')[1].firstElementChild.firstChild.nodeValue='La apuesta es superior al dinero.\n Se apostará '+jugador.dinero;
				apuesta=jugador.dinero;
			}
			//console.log('Apuesta 1: '+apuesta);
			jugador.monedas=apuesta;
			//console.log('Acertaste');
			apuestas[jugador.arrayapuesta[0]]=apuesta;			
		}else{
			apuesta=+(document.getElementsByTagName('input')[0].value);
			apuesta2=+(document.getElementsByTagName('input')[1].value);
			//console.log('Apuesta 1: '+apuesta);
			//console.log('Apuesta 2: '+apuesta2);
			jugador.monedas=apuesta+apuesta2;
			//console.log('Acertaste 2');
			apuestas[jugador.arrayapuesta[0]]=apuesta;
			apuestas[jugador.arrayapuesta[1]]=apuesta2;
		}
		mostrarapuesta();
		aceptarApuesta();
}

function aceptarApuesta(){
	var divAdicional=document.getElementsByTagName('div')[4];
	if(jugador.veces==1){
		divAdicional.children[1].style.visibility='hidden';
	}else{
		divAdicional.children[1].style.visibility='hidden';
		divAdicional.children[2].style.visibility='hidden';
	}
	
	var divBotones=document.getElementsByTagName('div')[1];
	tirardados();
	console.log('¿aceptar?');
	divBotones.firstElementChild.firstChild.nodeValue='Pulse Tirar los dados para probar suerte';
	//console.log(jugador.arrayapuesta);
	//console.log(jugador.arraydados);
	
	var divJugar=document.getElementsByTagName('div')[3];
	divJugar.firstElementChild.style.visibility='visible';
	divJugar.firstElementChild.addEventListener('click',empezarjuego);
	
}

function verApuesta(){
	//console.log('++++++++++++++++++++++++++');
	ponerCadena();
	ponerCadena2();
	//divJugar.children[1].style.visibility='visible';
	//divJugar.children[2].style.visibility='visible';
	//divJugar.children[1].lastElementChild.textContent=cadena;
	//divJugar.children[2].lastElementChild.firstChild.nodeValue=cadena2;	
}

function ponerCadena(){
	var cadena="",articleApuesta;
	articleApuesta=document.getElementById('Apuesta')
	/*jugador.arrayapuesta.forEach(function(animal){
		cadena+=animal+" ";
	});
	console.log(cadena);*/
	articleApuesta.textContent=jugador.arrayapuesta.join(" ");
}

function ponerCadena2(){
	var cadena2="",articleDados;
	articleDados=document.getElementById('Apuesta')
	jugador.arraydados.forEach(function(dado){
		cadena2+=dado+" ";
	});
	//console.log(cadena2);
	articleDados.textContent=cadena2;
}

function mostrarapuesta(){
	for(var opciones in apuestas){
		(apuestas[opciones]!=0) ? console.log(opciones+": "+apuestas[opciones]+" monedas"): "";
	}
}


function comprobartirada(){
	if(jugador.estado!=E_apuestatodo){
	 var contador=0;
		var contado=jugador.arrayapuesta.reduce(function(acc,v,i,a){
			function contar(v,arraydados,contador){
				for(var i=0;i<arraydados.length;i++){
					(jugador.arraydados[i]==v)?contador++:contador;
				}
					return contador;
			}
			var repeticiones=contar(v,jugador.arraydados,contador);
			acc[v]=repeticiones;
			//console.log('contado de animales: '+v+'-'+repeticiones);
			return acc;
		},{});
		
		return contado;
	}
}

function saldarapuestas(contado){
//console.log("dinero1 "+jugador.dinero);
	if(jugador.estado!=E_apuestatodo){
		jugador.dinero-=jugador.monedas;
		//console.log("dinero2 "+jugador.dinero);
		for(var cantidad in contado){
			if(contado[cantidad]!=0){
				jugador.dinero+=apuestas[cantidad]*contado[cantidad];
				console.log("La apuesta "+cantidad+" coincide y gana "
				+(apuestas[cantidad]*contado[cantidad]));
				
			}else{
				console.log("No coindice la apuesta "+cantidad);
			}
		}
	}else{
		console.log("Ha apostado a Todos(6) y gana 3")
		jugador.dinero-=3;
	}
	if(jugador.dinero>=jugador.dineromaximo){
		jugador.dineromaximo=jugador.dinero;
		jugador.rondamax=jugador.rondas+1;
	}
}

function limpiar(){
	for(var opciones in apuestas){
		apuestas[opciones]=0;
	}
}

function comprobarestado(){
	if(jugador.dinero<=0){
			jugador.estado=E_acabar_perdido;
	}else{
		if(jugador.dinero<100){
		jugador.estado=E_empezar;
		}else{
		jugador.estado=E_acabar_ganado;
		}
	}
}

function decision(){
	switch(jugador.estado){
		case E_acabar_perdido:
			console.log("+++++++++++++++++++++++++++++++++++++++++++");
			console.log("Te has quedado sin dinero para jugar");
			console.log("Dinero actual: "+jugador.dinero);
			console.log("Rondas jugadas: "+jugador.rondas);
			console.log("Maximo de Dinero acumulado: "+jugador.dineromaximo);
			console.log("¡¡GAME OVER!!");
			final();
			break;
		case E_acabar_ganado:
			console.log("+++++++++++++++++++++++++++++++++++++++++++");
			console.log("Has ganado al menos 1€");
			console.log("Dinero actual:	"+jugador.dinero);
			console.log("Rondas jugadas: "+jugador.rondas);
			console.log("Dinero ganado: "+jugador.dineromaximo);
			console.log("¡¡FELICIDADES!!");
			final();
				break;
		default:
			jugador.rondas+=1;
		break;
	}
}
var idT;
function final(){
	if(jugador.dinero<=0){
		idT=setTimeout(finalMalo,2000);
	
	}else{
		idT=setTimeout(finalBueno,2000);
	}
}
function finalMalo(){
	var cadena;
	cadena="<header>++++++++++++++++++++GAME OVER+++++++++++++++++++++++</header>"+
			"<section>"+
			"<article>Te has quedado sin dinero para jugar</article>"+
			"<article>Rondas jugadas: "+jugador.rondas+"</article>"+
			"<article>Maximo de Dinero acumulado: "+jugador.dineromaximo+" centimos</article>"+
			"</section>"+
			"<footer>++++++++++++++++++++GAME OVER+++++++++++++++++++++++</footer>";
			document.getElementsByTagName('body')[0].innerHTML=cadena;
			document.getElementsByTagName('body')[0].style.textAlign="center";
			empezar=0;
			clearTimeout(idT);
}

function finalBueno(){
	var cadena;
	cadena="<header>++++++++++++++++++++FELICIDADES+++++++++++++++++++++++</header>"+
			"<section>"+
			"<article>Has llegado a ganar 1€</article>"+
			"<article>Rondas jugadas: "+jugador.rondas+"</article>"+
			"<article>Maximo de Dinero acumulado: "+jugador.dineromaximo+" centimos</article>"+
			"</section>"+
			"<footer>++++++++++++++++++++FELICIDADES+++++++++++++++++++++++</footer>";
			document.getElementsByTagName('body')[0].innerHTML=cadena;
			document.getElementsByTagName('body')[0].style.textAlign="center";
			empezar=0;
			clearTimeout(idT);
}

function limpiarjugador(){
	for (var tipo in jugador){
		if(tipo!="estado"){
			if(tipo!="dinero"  && typeof(jugador[tipo])=="number"){
				if(tipo=="monedas" || tipo=="veces"){
					jugador[tipo]=0;
				}
			}else{
				if(tipo=="arrayapuesta"){
					jugador.arrayapuesta=[];
				}
				if(tipo=="arraydados"){
					jugador.arraydados=[];
				}
				if(tipo=="arraydados"){
					jugador.arraydados=[];
				}
				
			} 
		}else{
			if(jugador[tipo]="E_apuestatodo"){
				jugador.estado=E_empezar;
			}
		}
	}
}

function empezarjuego(){


	
	saldarapuestas(comprobartirada());
	verApuesta();
	limpiar();
	comprobarestado();
	decision();
	console.log('+ --------------------- +');
	hacerApuestaGrafica();
	limpiarjugador();
	
	
	
}

return		objetofuncion={
			empezarP : empezarjuego,
			numeroaleatorio : aleatorio,
			jugador : jugador,
			ApuestaGrafica: hacerApuestaGrafica,
			_apostar:{
				contenido:{
					html:HTML,
					Botones:Botones,
					Eleccion:Eleccion,
					Jugar:Jugar,
					Adicionales:Adicionales,
					Css_animales:crearCSSAnimales
				},
				juego:{
					Apostar:apostar,
					Apuesta:calcularApuesta,
					Monedas:pedirMonedas,
					Confirmar_monedas:cogerApuesta,
					Tirar: aceptarApuesta,
					Mostrar_suerte:verApuesta,
					Mostrar_apuesta:ponerCadena,
					Mostrar_dados:ponerCadena2
				}
			},
			tirar_los_dados : tirardados,
			comprobar_jugada : comprobartirada,
			pagar_apuestas :  saldarapuestas,
			reestablecer_apuestas : limpiar,
			estado : comprobarestado,
			decision_final : decision
			}

})();