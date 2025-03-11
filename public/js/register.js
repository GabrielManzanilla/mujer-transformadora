//Script para modificar la visibilidad de las etapas del formulario de registro
document.addEventListener("DOMContentLoaded", function () {
	// Selecciona todos los enlaces del navbar
	const form = document.querySelector("form");
	const sectionsForm = document.querySelectorAll("fieldset");
	let activeSection= 0;
	localStorage.setItem('activeSection',activeSection);

	function updateProgress() {
		const progress = document.getElementById('progressBar');
		const percentage = ((activeSection) / sectionsForm.length) * 100;
		progress.style.width = percentage + '%';
		progress.setAttribute('aria-valuenow', percentage);
	}

	//funcion para mostrar la seccion activa
	function showSection(index){
		sectionsForm.forEach((section, i)=> {
			section.classList.toggle('active', i===index);
		});
		updateProgress();
	}
	//avanzar a la sig seccion
	form.querySelectorAll('.next').forEach(button => {
		
		button.addEventListener('click', () => {
			const currentInputs = sectionsForm[activeSection].querySelectorAll('input, select');
			let isValid=true;
			// currentInputs.forEach(input => {
			// 	if(!input.checkValidity()){
			// 		isValid=false;
			// 	}
			// 	else{
			// 		input.classList.remove('is-invalid');
			// 	}
			// });

			if(isValid && activeSection<sectionsForm.length-1){
				activeSection++;
				localStorage.setItem('activeSection',activeSection);
				showSection(activeSection);
			}
			else{
				currentInputs.forEach(input => {
					if(!input.checkValidity()){
						input.classList.add('is-invalid');
					}
				});
			}
		})
	});

	//retroceder a la seccion anterior
	form.querySelectorAll('.previous').forEach(button => {
		button.addEventListener('click', () => {
			if(activeSection>0){
				activeSection--;
				localStorage.setItem('activeSection',activeSection);
				showSection(activeSection);
			}
		})
	});
});