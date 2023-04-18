<div class="col-sm-12 col-md-10 col-lg-12">
    <div class="alert alert-warning text-center" role="alert" id="validationList"></div>
    <div class="row g-3">
        <div class="col-sm-6">
            <label for="format" class="form-label">Modalidad de la sesión</label>
            <select class="form-select" id="format" name="format" required aria-label="select format">
                <option value="">-</option>
                <option value="Remoto" @if('Remoto' == $prevAnswers['format']) selected @endif>Remoto</option>
                <option value="Prescencial" @if('Prescencial' == $prevAnswers['format']) selected @endif>Prescencial</option>
            </select>
            <div class="invalid-feedback">
                    Elija un formato
            </div>
        </div>
        @foreach ($participants as $participant)
            <div class="col-sm-6">
                <label for="idNumber" class="form-label">Matrícula</label>
                <input type="text" class="form-control" id="idNumber" placeholder="Matricula" name = "idNumber"
                required>
                <div class="invalid-feedback">
                  Escribe tu correo matrícula
                </div>
            </div>
        @endforeach
        
        <div class="col-sm-6">
            <label for="format" class="form-label">Modalidad de la sesión</label>
            <select class="form-select" id="format" name="format" required aria-label="select format">
                <option value="">-</option>
                <option value="Remoto" @if('Remoto' == $prevAnswers['format']) selected @endif>Remoto</option>
                <option value="Prescencial" @if('Prescencial' == $prevAnswers['format']) selected @endif>Prescencial</option>
            </select>
            <div class="invalid-feedback">
                    Elija un formato
            </div>
        </div>
        <div>
            <p class="fs-3">Grabación de la sesión</p>
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
                            <input type="number" class="form-control word-count-field" placeholder="Palabras" name="word_count" id="word_count" min="0" value="@if(!empty($prevAnswers['word_count'])) {{$prevAnswers['word_count']}} @endif"  required/>
                            <div class="invalid-feedback">
                            Por favor ingresa el número de palabras de la sesión.
                            </div>
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
                @if(!empty($prevAnswers['format'])) Actualizar @else Registrar @endif   
                <span class="spinner-border-sm" role="status" aria-hidden="true" id="btnSubmitFormLabel"></span>
            </button>
        </div>
    </div>
</div>