
<div class="col-sm-12 col-md-10 col-lg-12">
    <div class="row g-3">
        <div class="col-12">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" id="role" name="role" required aria-label="select role">
                <option value="">Rol</option>
                <option value="2">Profesor</option>
                <option value="3">Estudiante</option>
            </select>
            <div class="invalid-feedback">
                    Example invalid select feedback</div>
            </div>
        <div class="col-sm-6">
            <label for="firstName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="firstName" placeholder="Nombre completo" value="" required>
            <div class="invalid-feedback">
                Escribe tu correo nombre completo
            </div>
        </div>
        <div class="col-sm-6">
              <label for="lastName" class="form-label">Matrícula</label>
              <input type="text" class="form-control" id="lastName" placeholder="Matricula" value="" required>
              <div class="invalid-feedback">
                Escribe tu correo matrícula
              </div>
        </div>
        <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" required>
              <div class="invalid-feedback">
                  Escribe tu correo electronico
                </div>
              </div>
        </div>
        <div class="col-sm-6">
            <label for="firstName" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
            Valid first name is required.
            </div>
        </div>
        <div class="col-sm-6">
              <label for="lastName" class="form-label">Confirmar contraseña</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
        </div>
        <div class="col-12">
            <label for="consent_information" class="fw-bold form-label">Consentimiento sobre uso de información </label>
            <label for="consent_information" class="form-label consent">Entiendo que todas las respuestas en este estudio pueden ser publicadas de manera no personalizada y solo seran usadas para fines de investigación. Si tengo más preguntas sobre el estudio o quiero más información, soy libre de contactar a los organizadores</label>
            <div class="form-check  mx-3">
                <input type="radio" class="form-check-input" id="consent_information" name="consent_information" value="true" required>
                <label class="form-check-label" for="consent_information">Sí</label>
            </div>
            <div class="form-check  mx-3">
                <input type="radio" class="form-check-input" id="consent_information" name="consent_information" value="false" required>
                <label class="form-check-label" for="consent_information">No</label>
            </div>
        </div>
        <div class="col-12">
        <label for="consent_practices" class="fw-bold form-label">Consentimiento sobre uso de prácticas de software </label>
        <label for="consent_practices" class="form-label consent">Autorizo el uso de mi resultado sobre la practica "STC0204 Desarrollo de componentes de software" de la materia "TC2005B Construcción de Software" en este estudio sabiendo que mi resultado podra ser publicado de manera no personalizada y solo sera utilizado para fines de investigación. Si tengo más preguntas sobre el estudio o quiero más información, soy libre de contactar a los organizadores </label>             
            <div class="form-check  mx-3">
                <input type="radio" class="form-check-input" id="consent_practices" name="consent_practices" value="true" required>
                <label class="form-check-label" for="consent_practices">Sí</label>
            </div>
            <div class="form-check  mx-3">
                <input type="radio" class="form-check-input" id="consent_practices" name="consent_practices" value="false" required>
                <label class="form-check-label" for="consent_practices">No</label>
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <button class="w-50 btn btn-primary btn-lg" type="submit">Cancelar</button>
        </div>
        <div class="col-sm-6  text-center ">
            <button class="w-50 btn btn-primary btn-lg" type="submit">Registrar</button>
        </div>
    </div>
</div>
