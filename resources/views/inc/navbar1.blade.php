<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <a class="p-2 text-dark" href="/shop">Shop</a>
              <a class="p-2 text-dark" href="/donor/login">Login</a>
              <a class="p-2 text-dark" href="/createDonor">Register</a>
            </ul>
        </div>
    </div>
</nav>
