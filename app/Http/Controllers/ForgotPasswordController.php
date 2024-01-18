<?php


// ForgotPasswordController.php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    // Metode yang menangani tampilan formulir forgot password
    public function showLinkRequestForm()
    {
        return view('forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateUsername($request);

        $response = $this->broker()->sendResetLink(
            $request->only('username') // Menggunakan 'username' sebagai kredensial
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    // Metode tambahan untuk validasi username
    protected function validateUsername(Request $request)
    {
        $request->validate(['username' => 'required']);
    }

    // Metode yang menangani tampilan formulir reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('login')->with(
            ['token' => $token, 'username' => $request->username]
        );
    }

    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }
}
