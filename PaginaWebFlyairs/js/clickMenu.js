(function(){
		document.addEventListener('DOMContentLoaded', agregarEvento);
			function agregarEvento(){
				var icono=document.getElementsByClassName('iconomenu')[0];
				icono.addEventListener('click',mostrarMenu);
			}
			function mostrarMenu(e){
				if(e.target.nextElementSibling.style.display=="none"){
					e.target.nextElementSibling.style.display="flex";
				}else{
					e.target.nextElementSibling.style.display="none";
				}
			}
		})();