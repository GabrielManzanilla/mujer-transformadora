export class MultiStepForm {
  constructor() {
    this.form = document.getElementById('registerForm');
    this.steps = document.querySelectorAll('.step');
    this.prevBtn = document.getElementById('prevBtn'); // Cambiado a clase
    console.log(this.prevBtn.textContent);
    this.nextBtn = document.getElementById('nextBtn'); // Cambiado a clase
    this.stepIndicators = document.getElementById('indicatorsSection');
    this.currentStep = 1;
    this.totalSteps = this.steps.length;

    this.init();
  }

  init() {
    this.createIndicators();
    this.showStep(this.currentStep);
    this.setupEventListeners();
    
    // Actualizar barra de progreso
    this.updateProgressBar();
  }

  createIndicators() {
    this.steps.forEach((step, index) => {
      const stepNumber = index + 1;
      const stepTitle = step.querySelector('legend').textContent;
      
      const indicator = document.createElement('li');
      indicator.className = `font-bold  pl-5 p-2 rounded-l-lg cursor-pointer hover: ${stepNumber === 1 ? 'bg-opacity-100 bg-[#6D1528] text-[#c2995c] ' : 'bg-opacity-10 bg-gray-300 text-[#6D1528]'}`;
      indicator.dataset.step = stepNumber;
      indicator.innerHTML = `
        <span class="flex items-center">
          <span class="w-6 h-6 flex items-center justify-center rounded-full mr-2 ${
            stepNumber === 1 ? 'bg-[#c2995c] text-[#6D1528]' : 'bg-gray-200 text-gray-600'
          }">${stepNumber}</span>
          <div class="ml-2 hidden md:inline">${stepTitle}</div>
        </span>
      `;
      
      indicator.addEventListener('click', () => this.goToStep(stepNumber));
      
      this.stepIndicators.appendChild(indicator);
    });
  }

  showStep(stepNumber) {
    // Ocultar todos los pasos
    this.steps.forEach(step => {
      step.classList.add('hidden');
    });
    
    // Mostrar el paso actual
    const currentStepElement = document.querySelector(`.step[data-step="${stepNumber}"]`);
    currentStepElement.classList.remove('hidden');
    
    this.updateIndicators(stepNumber);
    this.updateButtons(stepNumber);
    this.updateProgressBar();
  }

  updateIndicators(stepNumber) {
    const indicators = document.querySelectorAll('#indicatorsSection li');
    indicators.forEach((indicator, index) => {
      const indicatorStep = index + 1;
      const numberSpan = indicator.querySelector('span > span');
      
      if (indicatorStep === stepNumber) {
        indicator.classList.add('bg-opacity-100','bg-[#6D1528]','text-[#c2995c]');
        indicator.classList.remove('bg-opacity-10','bg-gray-300','text-[#6D1528]');

        numberSpan.classList.add('bg-[#c2995c]', 'text-[#6D1528]');
        numberSpan.classList.remove('bg-gray-200', 'text-gray-600');
      } else {
        indicator.classList.remove('bg-opacity-100','bg-[#6D1528]','text-[#c2995c]');
        indicator.classList.add('bg-opacity-10','bg-gray-300','text-[#6D1528]');
        numberSpan.classList.remove('bg-[#c2995c]', 'text-[#6D1528]');
        numberSpan.classList.add('bg-gray-200', 'text-gray-600');
      }
    });
  }

  updateProgressBar() {
    const progressPercentage = (this.currentStep / this.totalSteps) * 100;
    const progressBar = document.querySelector('#progress_bar');
    progressBar.style.width = `${progressPercentage}`+'%';
    progressBar.textContent = `${Math.round(progressPercentage)}%`;
  }

  updateButtons(stepNumber) {
    if (stepNumber === 1) {
      this.prevBtn.classList.add('hidden');
    } else {
      this.prevBtn.classList.remove('hidden');
    }
    
    if (stepNumber === this.totalSteps) {
      this.nextBtn.textContent = 'Enviar';
      this.nextBtn.setAttribute('type', 'submit');
    } else {
      this.nextBtn.textContent = 'Continuar';
      this.nextBtn.setAttribute('type', 'button');
    }
  }

  nextStep() {
    if (this.currentStep < this.totalSteps) {
      this.currentStep++;
      this.showStep(this.currentStep);
    } else {
      this.form.submit();
    }
  }

  prevStep() {
    if (this.currentStep > 1) {
      this.currentStep--;
      this.showStep(this.currentStep);
    }
  }

  goToStep(stepNumber) {
    if (stepNumber >= 1 && stepNumber <= this.totalSteps) {
      this.currentStep = stepNumber;
      this.showStep(this.currentStep);
    }
  }

  setupEventListeners() {
    this.prevBtn.addEventListener('click', () => this.prevStep());
    this.nextBtn.addEventListener('click', () => this.nextStep());
  }
}