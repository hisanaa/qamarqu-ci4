<?php

namespace App\Controllers\Api;

use App\Models\Room;

// use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
// use CodeIgniter\Controller;

class RoomController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->Room = new Room();
    }

    // public function index()
    // {
    //     $data = $this->Hotel->findAll();
    //     return $this->respond($data, 200);
    // }

    public function show($id)
    {
        $data = $this->Room->where('hotel_id', $id)->findAll();
        return $this->respond($data, 200);
    }
}
