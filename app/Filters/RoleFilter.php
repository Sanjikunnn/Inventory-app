<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    protected $allowedRoles = [];

    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role');

        // arguments dikirim dari route: ['admin', 'manager']
        if ($arguments && !in_array($role, $arguments)) {
            // kalo role ga diizinkan, redirect ke dashboard
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ga perlu apa-apa
    }
}
