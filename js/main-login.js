// Animação do input e do icon

const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

// Digitalizador do Titulo

const titulo = document.querySelector('.title');
typeWrite(titulo);

function typeWrite(elemento){
	const textoArray = elemento.innerText.split('');
	elemento.innerText = '';
	textoArray.forEach((letra, i) => {
		setTimeout(() => elemento.innerHTML += letra, 95 *i)
		if(textoArray.length-1 == i){
			setTimeout(() => typeWrite(elemento), 95 * i + 2000);
		 }
		 
	});
}
