<?php

namespace Ilhamhanif15\AuthMs;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class AuthMs
{
    const LOGIN_EP         = "api/v1/login";
    const REGISTER_EP      = "api/v1/register";
    const LOGOUT_EP        = "api/v1/logout";
    const VERIFY_TOKEN_EP  = "api/v1/verify-token";

    const DRIVER_PASSPORT = 'passport';

    public function __construct()
    {
        $this->host = config('authms.host');
    }

    /**
     * Login
     *
     * @param string $email
     * @param string $password
     * @return JsonResponse
     */
    public function login($email, $password)
    {
        $payload = [
            "email" => $email,
            "password" => $password
        ];

        if (config('authms.driver') === self::DRIVER_PASSPORT) {
            $response = Http::acceptJson()->asForm()->post( $this->host . '/' . self::LOGIN_EP , $payload);
        }

        return $response;
    }

    public function register($email, $password, $password_confirmation)
    {
        $payload = [
            "email" => $email,
            "password" => $password,
            "password_confirmation" => $password_confirmation
        ];
        
        if (config('authms.driver') === self::DRIVER_PASSPORT) {
            $response = Http::acceptJson()->asForm()->post( $this->host . '/' . self::REGISTER_EP , $payload);
        }

        return $response;
    }

    public function verifyToken($token)
    {
        if (config('authms.driver') === self::DRIVER_PASSPORT) {
            $response = Http::acceptJson()->withToken($token)->get( $this->host . '/' . self::VERIFY_TOKEN_EP);
        }

        return $response;
    }

    public function logout($token)
    {
        if (config('authms.driver') === self::DRIVER_PASSPORT) {
            $response = Http::acceptJson()->withToken($token)->post( $this->host . '/' . self::LOGOUT_EP);
        }

        return $response;
    }
}