@extends('layouts.main')
@section('title', 'Cuestionario')
@section('css')

@endSection
@section('main')
<div class="container-fluid my-5">
    <h1>Cuesitonario</h1>
    <div>
        <p class="statement fs-5 ms-5">1.-Pregunta</p>
        <input type="hidden" name="answered" id="answered" value="1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Respuesta:</span>
                @if('1' == $prevAnswers['question_1']) @endif
                <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                    value=" @if('1' == $prevAnswers['question_1'])Totalmente en desacuerdo
                            @elseif('2' == $prevAnswers['question_1'])En desacuerdo
                            @elseif('3' == $prevAnswers['question_1'])Ni de acuerdo ni desacuerdo
                            @elseif('4' == $prevAnswers['question_1'])De acuerdo
                            @elseif('5' == $prevAnswers['question_1'])Totalmente de acuerdo
                            @endif">
            </div>
            <p class="statement fs-5 ms-5">2.-Pregunta</p>
            <input type="hidden" name="answered" id="answered" value="1">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Respuesta:</span>
                    @if('1' == $prevAnswers['question_2']) @endif
                    <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        value=" @if('1' == $prevAnswers['question_2'])Totalmente en desacuerdo
                                @elseif('2' == $prevAnswers['question_2'])En desacuerdo
                                @elseif('3' == $prevAnswers['question_2'])Ni de acuerdo ni desacuerdo
                                @elseif('4' == $prevAnswers['question_2'])De acuerdo
                                @elseif('5' == $prevAnswers['question_2'])Totalmente de acuerdo
                                @endif">
                </div>
                <p class="statement fs-5 ms-5">3.-Pregunta</p>
                <input type="hidden" name="answered" id="answered" value="1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta:</span>
                        @if('1' == $prevAnswers['question_3']) @endif
                        <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value=" @if('1' == $prevAnswers['question_3'])Totalmente en desacuerdo
                                    @elseif('2' == $prevAnswers['question_3'])En desacuerdo
                                    @elseif('3' == $prevAnswers['question_3'])Ni de acuerdo ni desacuerdo
                                    @elseif('4' == $prevAnswers['question_3'])De acuerdo
                                    @elseif('5' == $prevAnswers['question_3'])Totalmente de acuerdo
                                    @endif">
                    </div>
                    <p class="statement fs-5 ms-5">4.-Pregunta</p>
                    <input type="hidden" name="answered" id="answered" value="1">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Respuesta:</span>
                            @if('1' == $prevAnswers['question_4']) @endif
                            <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value=" @if('1' == $prevAnswers['question_4'])Totalmente en desacuerdo
                                        @elseif('2' == $prevAnswers['question_4'])En desacuerdo
                                        @elseif('3' == $prevAnswers['question_4'])Ni de acuerdo ni desacuerdo
                                        @elseif('4' == $prevAnswers['question_4'])De acuerdo
                                        @elseif('5' == $prevAnswers['question_4'])Totalmente de acuerdo
                                        @endif">
                        </div>
                        <p class="statement fs-5 ms-5">5.-Pregunta</p>
                        <input type="hidden" name="answered" id="answered" value="1">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Respuesta:</span>
                                @if('1' == $prevAnswers['question_5']) @endif
                                <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                    value=" @if('1' == $prevAnswers['question_5'])Totalmente en desacuerdo
                                            @elseif('2' == $prevAnswers['question_5'])En desacuerdo
                                            @elseif('3' == $prevAnswers['question_5'])Ni de acuerdo ni desacuerdo
                                            @elseif('4' == $prevAnswers['question_5'])De acuerdo
                                            @elseif('5' == $prevAnswers['question_5'])Totalmente de acuerdo
                                            @endif">
                            </div>
                            <p class="statement fs-5 ms-5">6.-Pregunta</p>
                            <input type="hidden" name="answered" id="answered" value="1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Respuesta:</span>
                                    @if('1' == $prevAnswers['question_6']) @endif
                                    <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                        value=" @if('1' == $prevAnswers['question_6'])Totalmente en desacuerdo
                                                @elseif('2' == $prevAnswers['question_6'])En desacuerdo
                                                @elseif('3' == $prevAnswers['question_6'])Ni de acuerdo ni desacuerdo
                                                @elseif('4' == $prevAnswers['question_6'])De acuerdo
                                                @elseif('5' == $prevAnswers['question_6'])Totalmente de acuerdo
                                                @endif">
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button onclick="window.history.back()" type="button" class="w-50 btn btn-primary btn-lg">Regresar</button>
                                </div>
    </div>
</div>
@section('javascript')
@endSection
@endSection