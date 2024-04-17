<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterSales implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->get('logged_in') != true) {
      return redirect()->to('/');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    if (session()->get('user') && session()->get('user')['id_role'] == 2) {
      return redirect()->to('/user');
    }
  }
}
