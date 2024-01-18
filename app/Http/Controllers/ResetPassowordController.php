<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPassowordController extends Controller
{
    use ResetsPasswords;

    public function resetPassword(Request $request)
    {
        return $this->reset($request);
    }
}
