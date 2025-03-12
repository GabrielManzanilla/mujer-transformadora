export class FormNavigator {
  constructor(form, progressBarSelector) {
    this.form = form;
    this.sections = form.querySelectorAll('fieldset');
    this.progressBar = document.querySelector(progressBarSelector);
    this.activeSection = 0;

    localStorage.setItem("activeSection", this.activeSection);
    this.initNavigation();
    this.showSection(this.activeSection);
  }

  showSection(index) {
    this.sections.forEach((section, i) => {
      section.classList.toggle("active", i === index);
    });
    this.updateProgress();
  }

  updateProgress() {
    const percentage = (this.activeSection / this.sections.length) * 100;
    this.progressBar.style.width = percentage + "%";
    this.progressBar.setAttribute("aria-valuenow", percentage);
  }

  initNavigation() {
    this.form.querySelectorAll(".next").forEach((button) => {
      button.addEventListener("click", () => {
        if (this.activeSection < this.sections.length - 1) {
          this.activeSection++;
          localStorage.setItem("activeSection", this.activeSection);
          this.showSection(this.activeSection);
        }
      });
    });

    this.form.querySelectorAll(".previous").forEach((button) => {
      button.addEventListener("click", () => {
        if (this.activeSection > 0) {
          this.activeSection--;
          localStorage.setItem("activeSection", this.activeSection);
          this.showSection(this.activeSection);
        }
      });
    });
  }
}
