var reproductor = reproductor || {};
reproductor = (function(){
	var idIntervalo,idSonido,idOcultarse;
	var completa=false;
	document.addEventListener('DOMContentLoaded',organizar);

	
	function organizar(){
		eventos();
	}
	
	function eventos(){
		var audio=document.getElementById('audio');				
		var vol0=document.getElementsByName('vol')[0];
		var vol_rango=document.getElementsByName('rango_vol')[0];
		var vol100=document.getElementsByName('vol_total')[0];
		var atras=document.getElementsByName('atras')[0];
		var play=document.getElementsByName('play')[0];
		var adelante=document.getElementsByName('adelante')[0];
		var maximizar=document.getElementsByName('maximizar')[0];
		var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
		var video=document.getElementsByTagName('video')[0];
		
		vol0.addEventListener('click',eventoVolumen);
		vol_rango.addEventListener('click',volumen);
		vol100.addEventListener('click',eventoVolumen);
		
		atras.addEventListener('click',controles);
		play.addEventListener('click',controles);
		adelante.addEventListener('click',controles);
		
		maximizar.addEventListener('click',agrandar);
		
		tiempo_rango.addEventListener('click',tiempos);
		
		video.addEventListener('loadedmetadata',duracion);
		
		audio.addEventListener('mouseover',mostrarSonido);
		audio.addEventListener('mouseout',quitarSonido);
						/*Extra 2*/
		document.addEventListener('keyup',pulsarEspacio);
		igualar();
	}
	
	/* Funcion para colocar los controles de rango del tiempo y del volumen en las posiciones del video*/
	function igualar(){
	var video=document.getElementsByTagName('video')[0];
	var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
	var vol_rango=document.getElementsByName('rango_vol')[0];
		vol_rango.value=video.volume*100;
		tiempo_rango.value=video.currentTime;
	}
	
	/* Funcion para controlar los eventos sobre las imagenes del volumen*/
	function eventoVolumen(ElementoDomImgVolumen){
	var video=document.getElementsByTagName('video')[0];
	var vol0=document.getElementsByName('vol')[0];
	var vol_rango=document.getElementsByName('rango_vol')[0];
	var audio;
		if(ElementoDomImgVolumen.name=="vol_total"){
			if(video.volume<1){
				if(video.volume==0){
						audio=1;
						audio=audio*0.1;
						
				}else{
					console.log("Se puede subir");
					audio=video.volume;
					audio=audio+(audio*0.1);
				}
				video.volume=audio;
				vol_rango.value=video.volume*100;
				vol0.src="imgs/lv.svg";
			}
		}else{
			if(ElementoDomImgVolumen.name=="vol"){
				if(video.volume.toFixed(1)>0.1){
					console.log("Se puede bajar");
					audio=video.volume;
					audio=audio-(audio*0.1);
					video.volume=audio;
					vol_rango.value=audio*100;
				}else{
					ElementoDomImgVolumen.src="imgs/volumeoff.svg";
					video.volume=0.;
					vol_rango.value=0.01;
					console.log("Esta en Mute");
				}
			}
		}
		console.log("volumen video eventoVolumen: "+video.volume);
		console.log(ElementoDomImgVolumen.name);
	}
	
	/* Funcion para el rango de volumen y quitar el mute si se pulsa por encima del nivel del mute en el rango*/
	function volumen(ElementoDomRangoVolumen){
	var video=document.getElementsByTagName('video')[0];
	var vol0=document.getElementsByName('vol')[0];
	var volumen=ElementoDomRangoVolumen.value;
		if(video.volume<volumen){
			vol0.src="imgs/lv.svg";
		}
		video.volume=volumen/100;
		console.log(ElementoDomRangoVolumen.value);
	}
	
	/* Funcion para mostrar el volumen pasados 3 segundos con el raton encima*/
	function mostrarSonido(){
	var sonido=document.getElementById('Sonido');
	var vol_rango=document.getElementsByName('rango_vol')[0];
		idSonido=setTimeout(function(){
			sonido.textContent=vol_rango.value;
			sonido.style.color="red";
			sonido.style.textAlign="center";
			//console.log("Id Sonido: "+idSonido);
		},3*1000);
	}
	
	/* Funcion para quitar la muestra del sonido*/
	function quitarSonido(){
	var sonido=document.getElementById('Sonido');
			sonido.textContent="";
			//console.log("Limpio Id Sonido: "+idSonido);
			clearTimeout(idSonido);
	}
	
	/* Funcion para los controles de Play/Pause y velocidad de la reproduccion*/
	function controles(ElementoDomControles){
	var video=document.getElementsByTagName('video')[0];
	var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
	var velocidad;
		console.log(ElementoDomControles.name);
		if(ElementoDomControles.name=="play"){
			//console.log(video.paused);
			if(video.paused==true){
				video.play();
				console.log("video: "+video.paused);
				ElementoDomControles.src="imgs/pause.svg";
				cambiartiempo();
			}else{
				video.pause();
				console.log("video: "+video.paused);
				ElementoDomControles.src="imgs/play.svg";
				clearInterval(idIntervalo);
			}
			
		}
		console.log("Momento del video: "+video.currentTime);
		tiempo_rango.value=video.currentTime;
		
		if(ElementoDomControles.name=="adelante"){
			console.log(video.playbackRate);
			velocidad=video.playbackRate;
			velocidad=(0.2*velocidad)+velocidad;
			video.playbackRate=velocidad.toFixed(1);
		}
		
		if(ElementoDomControles.name=="atras"){
			console.log(video.playbackRate);
			velocidad=video.playbackRate;
			velocidad=velocidad-(0.2*velocidad);
			video.playbackRate=velocidad.toFixed(1);
		}
	}
	
	/* Funcion al pulsar el rango del tiempo*/
	function tiempos(){
	var video=document.getElementsByTagName('video')[0];
	var tiempo0=document.getElementsByName('tiempo')[0];
	var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
		console.log("Momento del video: "+video.currentTime);
		video.currentTime=tiempo_rango.value;
		var horas   = Math.floor(video.duration / 3600);
		var minutos = Math.floor(video.duration / 60);
		tiempo0.textContent = horas+":"+minutos+":"+video.currentTime.toFixed();
	}
	
	/* Funcion al pulsar el icono de pantalla completa*/
	function agrandar(ElementoDomAgrandar){
	
	var docElm = document.documentElement;
	var video=document.getElementsByTagName('video')[0];
	var caja=document.getElementById('caja-contenedor');
	var contenido=document.getElementById('contenido');
	var audio=document.getElementById('audio');
	var control=document.getElementById('control');
	var maximo=document.getElementById('agrandar');
			if(completa==false){
				console.log(ElementoDomAgrandar.name);
				maximo.firstElementChild.src="imgs/nocompleta.svg";
				video.style.width="100%";
				video.style.height="100%";
				caja.style.width="100%";
				caja.style.position="relative";
				caja.style.bottom="0px";
				caja.style.right="0px";
				caja.style.left="0px";
				caja.style.marginLeft="0px";
				audio.style.flex="0 1 40%";
				maximo.style.flex="0 1 5%";
				control.style.flex="1 1 50%";
				completa=true;
				if (docElm.requestFullscreen) {
					docElm.requestFullscreen();
				}
				else if (docElm.msRequestFullscreen) {
					docElm.msRequestFullscreen();
				}
				else if (docElm.mozRequestFullScreen) {
					docElm.mozRequestFullScreen();
				}
				else if (docElm.webkitRequestFullScreen) {
					docElm.webkitRequestFullScreen();
				}
				ocultar();
			}else{
				maximo.firstElementChild.src="imgs/fs.svg";
				video.style.width="800px";
				video.style.height="500px";
				video.style.position="relative";
				caja.style.width="800px";
				completa=false;
				
				if (document.exitFullscreen) {
                document.exitFullscreen();
				}
				else if (document.msExitFullscreen) {
					document.msExitFullscreen();
				}
				else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				}
				else if (document.webkitCancelFullScreen) {
					document.webkitCancelFullScreen();
				}
				caja.style.opacity="1";
			}
		console.log("Pantalla completa: "+completa);
	}

	/* Funcion al cargar la pagina para poner la duracion del video*/
	function duracion(){
	var video=document.getElementsByTagName('video')[0];
	var tiempo0=document.getElementsByName('tiempo')[0];
	var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
	var tiempo100=document.getElementsByName('tiempo_total')[0];
		var horas   = Math.floor(video.duration / 3600);
		var minutos = Math.floor(video.duration / 60);
		tiempo100.textContent = horas+":"+minutos+":"+video.duration.toFixed();
		tiempo0.textContent ="0:0:0";
		console.log("Duracion del video: "+horas+" horas, "+minutos+" minutos, "+video.duration.toFixed()+" segundos.");
		//console.log(video.volume);
		tiempo_rango.max=video.duration;
	}
	
	/* Funcion para cambiar el tiempo y el rango del tiempo cuando se esta reproduciendo el video*/
	function cambiartiempo(){
	var video=document.getElementsByTagName('video')[0];
	var tiempo0=document.getElementsByName('tiempo')[0];
	var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
	var tiempo100=document.getElementsByName('tiempo_total')[0];
	var play=document.getElementsByName('play')[0];
		idIntervalo=setInterval(function(){
		var horas   = Math.floor(video.duration / 3600);
		var minutos = Math.floor(video.duration / 60);
		tiempo0.textContent = horas+":"+minutos+":"+video.currentTime.toFixed();
		//tiempo0.textContent="0 : "+video.currentTime.toFixed();
		tiempo_rango.value=video.currentTime;
		if(tiempo0.textContent==tiempo100.textContent){
			console.log("Entro cuando se acaba");
			//console.log("video: "+video.currentTime);
			video.pause();
			play.src="imgs/play.svg";
			clearInterval(idIntervalo);
			reiniciarPosicion();
		}
		console.log("Id Intervalo: "+idIntervalo);
		},
		100);
	}
	/* Funcion para cuando acaba el Video*/
	function reiniciarPosicion(){
	var video=document.getElementsByTagName('video')[0];
	var tiempo0=document.getElementsByName('tiempo')[0];
	var tiempo_rango=document.getElementsByName('rango_tiempo')[0];
		console.log("Reinicio")
		video.playbackRate=1;
		video.currentTime=0;
		tiempo_rango.value=video.currentTime;
		tiempo0.textContent ="0 : 0 : 0";
	}
	
	/*Extra 1*/	
	function ocultar(){
	var caja=document.getElementById('caja-contenedor');
		if(completa==true){
			idOcultarse=setTimeout(function(){
				//console.log("Id ocultarse: "+idOcultarse);
				caja.addEventListener('mouseenter',mostrarse);
				caja.addEventListener('mouseleave',ocultarse);
						caja.style.opacity="0.3";
				function mostrarse(){
						caja.style.opacity="1";
						//console.log("mostrar");

				}
				function ocultarse(){
						caja.style.opacity="0.3";
						//console.log("ocultarse");
				}
				console.log(idOcultarse);
			},2*1000)
		}else{
			if(idOcultarse){
				caja.style.opacity="1";
				console.log("limpio ocultarse");
				clearTimeout(idOcultarse);
			}
		}
	}
	
	/*Extra 2*/
	function pulsarEspacio(CadenaEspacioKeyCode){
		var video=document.getElementsByTagName('video')[0];
		var play=document.getElementsByName('play')[0];
		if(CadenaEspacioKeyCode==32){
			console.log("video: "+video.paused);
			if(video.paused==true){
				video.play();
				console.log(video.paused);
				play.src="imgs/pause.svg";
				cambiartiempo();
			}else{
				video.pause();
				console.log("video: "+video.paused);
				play.src="imgs/play.svg";
				clearInterval(idIntervalo);
			}
		}
	}
			var reproductor =
						{
						ids:{
								Intervalo:idIntervalo,
								Sonido:idSonido,
								Ocultarse:idOcultarse
							},
							CreacionEventos:eventos,
							IgualarInicios:igualar,
							EventosImagenesVolumen:eventoVolumen,
							PulsarRangoVolumen:volumen,
							Controles:controles,
							VerSonido:mostrarSonido,
							QuitarSonido:quitarSonido,
							PulsarRangoTiempo:tiempos,
							PantallaCompleta:agrandar,
							VerDuracion:duracion,
							ActualizarTiempos:cambiartiempo,
							VolverInicio:reiniciarPosicion,
							Ocultar:ocultar,
							PulsarEspacio:pulsarEspacio
						}
						
			return reproductor;
})();