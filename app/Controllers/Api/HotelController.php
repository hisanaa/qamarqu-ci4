<?php

namespace App\Controllers\Api;

use App\Models\Hotel;

// use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
// use CodeIgniter\Controller;

class HotelController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->Hotel = new Hotel();
    }

    public function index()
    {
        $data = $this->Hotel->findAll();
        return $this->respond($data, 200);
    }

    public function show($id)
    {
        $data = $this->Hotel->find($id);
        return $this->respond($data, 200);
    }
}
