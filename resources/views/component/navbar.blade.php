@if ($user_role == "customer")
    <nav class="navbar navbar-expand-lg bg-gradients narvbar-dark px-2 py-3">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 mx-md-2">
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-semibold" href="#">Show Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-semibold" href="#">My Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-semibold" href="#">Transaction History</a>
                </li>
            </ul>
            <form class="d-flex flex-fill mx-md-2" role="search">
                <input class="form-control me-2" type="search" placeholder="Search product.." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mx-md-2 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Username</a></li>
                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                </ul>
                </li>
                <a href="" class="btn btn-outline-danger mx-2 fw-bold">Logout</a>
            </ul>
        </div>
        </div>
    </nav>
@elseif ($user_role == "admin")
    <nav class="navbar navbar-expand-lg bg-gradients narvbar-dark px-2 py-3">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 mx-md-2">
            <li class="nav-item">
                <a class="nav-link text-light fw-bold active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="#">Show Product</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Manage Item
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">View Item</a></li>
                <li><a class="dropdown-item" href="#">Add Item</a></li>
                </ul>
            </li>
            </ul>
            <form class="d-flex flex-fill mx-md-2" role="search">
            <input class="form-control me-2" type="search" placeholder="Search product.." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mx-md-2 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Username</a></li>
                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                </ul>
                </li>
                <a href="" class="btn btn-outline-danger mx-2 fw-bold">Logout</a>
            </ul>
        </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg bg-gradients navbar-dark">
        <div class="container-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-md-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-semibold" aria-current="page" href="#">Show Product</a>
                </li>
            </ul>
            <ul class="navbar-nav login-button">
                <a href="" class="btn btn-outline-success mx-2 fw-bold">Login</a>
                <a href="" class="btn btn-outline-primary mx-2 fw-bold">Register</a>
            </ul>
        </div>
        </div>
    </nav>
@endif

