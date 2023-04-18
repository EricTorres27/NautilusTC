<?php

namespace App\Utils;

class ErrorParser {
    public static function parseValidatorError($validator) {
        return substr(array_reduce(
            $validator->messages()->all(),
            function($carry, $item) { return $carry.$item." | "; },
            ''
        ), 0, -3);
    }
}
