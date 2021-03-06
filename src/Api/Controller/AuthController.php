<?php
declare(strict_types=1);

namespace Api\Controller;

use Symfony\Component\HttpFoundation\Request;
use Api\Model\Login;
use Api\Auth\Session;

class AuthController
{
    private $login;
    private $session;

    public function __construct(Login $login, Session $session)
    {
        $this->login = $login;
        $this->session = $session;
    }

    public function login(Request $request): array
    {
        $data = $request->request->all();

        $user = $this->login->authenticate($data);

        $sessionData = $this->session->create($user['id']);

        $returnData = [
            'user_name'     => $user['name'],
            'user_email'    => $user['email'],
            'token'         => $sessionData['token']
        ];

        return $returnData;
    }

    public function logout(Request $request): array
    {
        $token = $request->headers->get('token');

        $this->session->expire($token);

        return [];
    }
}
