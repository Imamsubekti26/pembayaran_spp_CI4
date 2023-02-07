<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PetugasLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
      $session = \Config\Services::session();
      if(!$session->get('status') && $session->get('level') != 'petugas'){
        return redirect()->to(base_url('login'));
      }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
     
      // Do something here
    }
}