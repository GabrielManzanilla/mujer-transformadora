<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top flex-grow-0">
  <div class="container-fluid container-md">
    <a class="navbar-brand fs-4" href="#">YÚCATAN</a>
    <!-- Button Colspan -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <!-- Responsive Sidebar -->
      <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Opciones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="sidebar offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index">Home</a>
          </li>
					<li class="nav-item">
            <a class="nav-link " href="news">Noticias</a>
          </li>
					<li class="nav-item">
						<a class="nav-link " href="register" >Registarse</a>
					</li>
          <li class="nav-item">
            <a class="nav-link" href="search">Buscar solicitud</a>
          </li>
      </div>
    </div>
  </div>
</nav>

<script>
	//Script para cambiar el estado de activo de los elementos en el navbar 
	document.addEventListener("DOMContentLoaded", function () {
		// Selecciona todos los enlaces del navbar
		const navLinks = document.querySelectorAll(".nav-link");

		const activePage=localStorage.getItem('activePage');
		if(activePage){
			navLinks.forEach((link) => link.classList.remove("active"));
			document.querySelector(`a[href="${activePage}"]`).classList.add("active");
		}

		navLinks.forEach((link) => {
			link.addEventListener("click", function () {
				// Remueve la clase "active" de todos los enlaces
				navLinks.forEach((nav) => nav.classList.remove("active"));

				// Agrega la clase "active" al enlace clicado
				this.classList.add("active");
				localStorage.setItem('activePage',this.getAttribute('href'));
			});
		});
  });
</script>

