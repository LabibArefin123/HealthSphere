<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="padding-left: 30px; padding-right: 30px;">
    <div class="container-fluid">

        <!-- Left: Logo + Title -->
        <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('images/HealthSphere.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width:100px; height:70px;">
            <span class="brand-text font-weight-bold ml-2">HealthSphere</span>
        </a>

        <!-- Center: Navbar Menu -->
        <div class="collapse navbar-collapse justify-content-center order-2" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="#features" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Right: Buttons -->
        <div class="order-3 ml-auto d-flex align-items-center">
            <a href="{{ route('login') }}" class="btn btn-outline-primary" style="margin-right: 10px;">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
        </div>
        

    </div>
</nav>
