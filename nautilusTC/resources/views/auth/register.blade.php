<!DOCTYPE html>
<html lang="en">
<head>
    <title>NautilusTC | Registrar</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/bootstrtap.bundle.min.js"></script>
</head>
<body class="vh-100 gradient-custom">
  <form method="POST" action="/register" id="formRegister">
    @csrf
    <section >
        <div class="container py-3 ">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-uppercase text-center">Crear una cuenta</h2>
                    <div class="alert alert-warning text-center" role="alert" id="validationList"></div>
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
                      <form class="was-validated" method="POST">
                        <div class="was-validated">
                          <div class="mb-3">
                            <label for="name" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control"  minlength="1" maxlength="255" id="name" name="name" placeholder="Nombre completo" required/>
                            <div class="invalid-feedback" id="name_span">
                              Por favor ingresa tu nombre completo.
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="idNumber" class="form-label">Matrícula</label>
                            <input type="text" class="form-control" id="idNumber" name="idNumber" placeholder="Matrícula" required />
                            <div class="invalid-feedback">
                              Por favor ingresa tu matrícula.
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required />
                            <div class="invalid-feedback">
                              Por favor ingresa tu correo electrónico.
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required/>
                              <div class="invalid-feedback">
                                Por favor ingresa tu contraseña.
                              </div>
                          </div>
                          <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required/>
                              <div class="invalid-feedback">
                                Por favor confirma tu contraseña.
                              </div>
                          </div>
                          <div class="mb-3">
                            <label for="consent_information" class="fw-bold form-label">Consentimiento sobre uso de información </label>
                            <label for="consent_information" class="form-label consent">Doy mi autorización para que los datos recolectados de mi participación en este estudio, puedan ser usados para fines de investigación y publicados de manera no personalizada.</label>
                            <div class="form-check  mx-3">
                            <input type="checkbox" class="form-check-input" id="consent_information" name="consent_information">
                                <label class="form-check-label" for="consent_information">Acepto</label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="consent_practices" class="fw-bold form-label">Consentimiento sobre uso de prácticas de software </label>
                            <label for="consent_practices" class="form-label consent">Autorizo el uso de mi resultado sobre la practica "STC0204 Desarrollo de componentes de software" de la materia "TC2005B Construcción de Software" en este estudio sabiendo que mi resultado podra ser publicado de manera no personalizada y solo sera utilizado para fines de investigación. Si tengo más preguntas sobre el estudio o quiero más información, soy libre de contactar a los organizadores </label>             
                            <div class="form-check  mx-3">
                                <input type="checkbox" class="form-check-input" id="consent_practices" name="consent_practices" >
                                <label class="form-check-label" for="consent_practices">Acepto</label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="text-center">
                              <button class="btn btn-outline-light btn-lg px-5" type="submit">Registrarse </button>
                            </div>
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </form>
  <script src="js/registerUser.js"></script>    

</body>
</html>