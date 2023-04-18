
<div class="col-sm-12 col-md-10 col-lg-12">
    <div class="alert alert-warning text-center" role="alert" id="validationList"></div>
    <div class="row g-3">
        <div class="col-sm-6">
            <label for="format" class="form-label">Modalidad de la sesión</label>
            <select class="form-select" id="format" name="format" required aria-label="select format" onchange="choose_format(this)">
                <option value="">-</option>
                <option value="Remoto">Remoto</option>
                <option value="Prescencial">Prescencial</option>
            </select>
            <div class="invalid-feedback">
                    Elija un formato
            </div>
        </div>
        <div class="col-sm-6">
            <label for="selectRegisterSession" class="form-label">¿Tú vas a dar de alta la sesión?</label>
            <select class="form-select" id="selectRegisterSession" name="selectRegisterSession" required aria-label="select selectRegisterSession" onchange="choose_register(this)">
                <option value="">-</option>
                <option id="selectRegisterSession_1" value="Sí">Sí</option>
                <option id="selectRegisterSession_2" value="No">No</option>
            </select>
            <div class="invalid-feedback">
                    Elija una opción
            </div>
        </div>
        <div class="col-12">
              <label for="idNumber" class="form-label">Matrícula de tu compañero (Si tu compañero no participa en el experimento coloca tu propia matrícula.)</label>
              <input type="text" list="idNumbersList" class="form-control" id="idNumber" placeholder="Selecciona una matricula" name = "idNumber" required>
              <div class="invalid-feedback">
                Por favor ingresa la matrícula de tu compañero.
              </div>
              <datalist id="idNumbersList">
                @foreach($idNumbers as $idNumber)
                <option value="{{$idNumber['idNumber']}}">
                @endforeach
              </datalist>  
        </div>
        <div>
            <p class="fs-3">Grabación de la sesión</p>
            <div class="alert alert-primary text-center" role="alert">Asegúrate de llenar todos los campos de la grabación.</div>
            <div>
                <div class="row justify-content-center my-2">
                    <div class="mb-3 col-lg-auto col-md-auto col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-clock fa-lg"></i></span>
                            <input type="number" id="cronoHoras" name="cronoHoras" aria-label="Horas"  min="0" max="59" value="00">
                            <input type="number" id="cronoMinutos" name="cronoMinutos" aria-label="Minutos"  min="0" max="59" value="00">
                            <input type="number" id="cronoSegundos" name="cronoSegundos" aria-label="Segundos"  min="0" max="59" value="00">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div id="palabras_container" class="mb-3 col-lg-6 col-md-8 col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text">Palabras:</i></span>
                            <input type="number" class="form-control word-count-field" placeholder="Palabras" name="word_count" id="word_count" min="0" value="0" required/>
                            <div class="invalid-feedback">
                            Por favor ingresa el número de palabras de la sesión.
                            </div>
                        </div>
                    </div>
                    <div id="palabras_pareja_container" class="mb-3 col-lg-6 col-md-8 col-sm-12">
                        <div class="input-group" id="word_count_partner_input">
                            <span class="input-group-text">Palabras de la pareja:</i></span>
                            <input type="number" class="form-control word-count-field" placeholder="Palabras de la pareja" name="word_count_partner" id="word_count_partner" min="0" value="0"/>
                            <div class="invalid-feedback">
                            Por favor ingresa el número de palabras de la sesión.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-auto col-md-auto col-sm-auto">
                            <button type="button" class="my-2 btn btn-danger " onclick="reiniciarGrabación()" ><i class="fa-solid fa-backward-step fa-lg"></i></button>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-auto">
                            <button type="button" class="my-2 btn btn-primary" id="btnStartRecors"   ><i class="fa-solid fa-play fa-lg"></i></button>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-auto">
                            <button type="button" class="my-2 btn btn-primary " id="btnStopRecors"  ><i class="fa-solid fa-pause fa-lg"></i></button>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <button onclick="window.history.back()" type="button" class="w-50 btn btn-primary btn-lg">Cancelar</button>
        </div>
        <div class="col-sm-6  text-center ">
            <button class="w-50 btn btn-success btn-lg" type="submit" id="btnSubmitForm">
                Registrar
                <span class="spinner-border-sm" role="status" aria-hidden="true" id="btnSubmitFormLabel"></span>
            </button>
        </div>
    </div>
</div>