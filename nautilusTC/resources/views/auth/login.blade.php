<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>NautilusTC | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/bootstrtap.bundle.min.js"></script>    
</head>
<body>
<form class="was-validated" method="POST" action="/login">
@csrf
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesión</h2>
                    <p class="text-white-50 mb-5">Ingresar correo y contraseña!</p>
                    <!-- Show errors -->
                    @if ($errors->any())
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    <small>{{ $error }}</small>
                                </li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="form-outline form-white mb-4">
                      <input type="text" id="email" name="email" class="form-control form-control-lg" required />
                      <label class="form-label" for="typeEmailX">Correo</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                      <label class="form-label" for="typePasswordX">Contraseña</label>
                    </div>
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Olvidaste tu contraseña?</a></p>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar </button>
                  </div>
                  <div>
                    @if (Route::has('register'))
                      <p class="mb-0">No tienes una cuenta?</p><a href="{{ route('register') }}" class="text-white-50 fw-bold">Registrarse</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </form>
</body>
</html>