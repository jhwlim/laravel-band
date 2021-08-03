<?php

namespace App\Traits;

trait ApiResponser {

    protected function success($data = null, int $code = 200) {
        return response()->json($data, $code);
    }

    protected function error(string $message = null, int $code = 400) {
        return response()->json(['message' => $message], $code);
    }

}
