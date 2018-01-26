<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Eshop</title>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>


<section class="hero is-info is-large">
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            <img src="https://blog.idevaffiliate.com/wp-content/uploads/2015/11/eshop_joomla_logo.png" alt="Logo">
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroB">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroB" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item is-active" href="/ ">
              Home
            </a>
            <a class="navbar-item" href="/about">
              About
            </a>
            <a class="navbar-item" >
              Men
            </a>
            <a class="navbar-item">
              Woman
            </a>
            <span class="navbar-item">
              <a class="button is-info is-inverted" href="/login">
                <span class="icon">
                  <i class="fab fa-github" ></i>
                </span>
                <span>login</span>
              </a>
            </span>
            <span class="navbar-item">
              <a class="button is-info is-inverted">
                <span class="icon">
                  <i class="fab fa-github"></i>
                </span>
                <span>shop</span>
              </a>
            </span>
            <span class="navbar-item">
              <a class="button is-info is-inverted">
                <span class="icon">
                  <i class="fab fa-github"></i>
                </span>
                <span>cart</span>
              </a>
            </span>
          </div>
        </div>
    </div>
      </div>
    </nav>
  </div>

    </section>





{{-- temporary --}}
<div class="container">
    @yield('content')
</div>





<br><br><br><br><br><br>

<footer class="footer is- small">
  <div class="container">
    <div class="content has-text-centered">
      <p>
        <strong>Eshop</strong> by Pavel Koch & Hussein bahdon</a>.

      </p>
    </div>
  </div>
</footer>


</body>
</html>
