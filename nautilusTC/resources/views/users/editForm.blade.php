<div class="col-sm-12 col-md-10 col-lg-12">
    <div class="row g-3">
        <div class="col-12">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required aria-label="select role">
                <option value="">-</option>
                <option value="Profesor" @if('Profesor' == $prevAnswers['rol']) selected @endif >Profesor</option>
                <option value="Estudiante" @if('Estudiante' == $prevAnswers['rol']) selected @endif>Estudiante</option>
            </select>
            <div class="invalid-feedback">
                    Elija un rol</div>
            </div>
        <div class="col-sm-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" placeholder="" name = "name"
            value="@if(!empty($prevAnswers['name'])) {{$prevAnswers['name']}} @endif" required>
            <div class="invalid-feedback">
                Escribe tu correo nombre completo
            </div>
        </div>
        <div class="col-sm-6">
              <label for="idNumber" class="form-label">Matrícula</label>
              <input type="text" class="form-control" id="idNumber" placeholder=""  name = "idNumber"
              value="@if(!empty($prevAnswers['idNumber'])) {{$prevAnswers['idNumber']}} @endif" required>
              <div class="invalid-feedback">
                Escribe tu correo matrícula
              </div>
        </div>
        <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" name = "email"
                value="@if(!empty($prevAnswers['email'])) {{$prevAnswers['email']}} @endif" required>
              <div class="invalid-feedback">
                  Escribe tu correo electronico
                </div>
              </div>
        </div>
        @if(empty($prevAnswers['password'])) 
        <div class="col-sm-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
            Ingresa tu contraseña.
            </div>
        </div>
        <div class="col-sm-6">
              <label for="confirmPassword" class="form-label">Confirmar contraseña</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Confirma tu contraseña.
              </div>
        </div>
        @endif
        <div class="col-12">
            <label for="consent_information" class="fw-bold form-label">Consentimiento sobre uso de información </label>
            <label for="consent_information" class="form-label consent">Entiendo que todas las respuestas en este estudio pueden ser publicadas de manera no personalizada y solo seran usadas para fines de investigación. Si tengo más preguntas sobre el estudio o quiero más información, soy libre de contactar a los organizadores</label>
            <div class="form-check  mx-3">
                <input type="checkbox" class="form-check-input" id="consent_information" name="consent_information" 
                @if($prevAnswers['consent_information']) checked 
                @endif>
                <label class="form-check-label" for="consent_information">Acepto</label>
            </div>
        </div>
        <div class="col-12">
        <label for="consent_practices" class="fw-bold form-label">Consentimiento sobre uso de prácticas de software </label>
        <label for="consent_practices" class="form-label consent">Autorizo el uso de mi resultado sobre la practica "STC0204 Desarrollo de componentes de software" de la materia "TC2005B Construcción de Software" en este estudio sabiendo que mi resultado podra ser publicado de manera no personalizada y solo sera utilizado para fines de investigación. Si tengo más preguntas sobre el estudio o quiero más información, soy libre de contactar a los organizadores </label>             
        <div class="form-check  mx-3">
                <input type="checkbox" class="form-check-input" id="consent_practices" name="consent_practices" 
                @if($prevAnswers['consent_practices'] )
                    checked 
                @endif>
                <label class="form-check-label" for="consent_practices">Acepto</label>
        </div>
        </div>
        <div class="col-sm-6 text-center">
            <button onclick="window.history.back()" type="button" class="w-50 btn btn-primary btn-lg">Cancelar</button>
        </div>
        <div class="col-sm-6  text-center ">
            <button class="w-50 btn btn-primary btn-lg" type="submit">
                @if(!empty($prevAnswers['name'])) Actualizar @else Registrar @endif    
            </button>
        </div>
    </div>
</div>
