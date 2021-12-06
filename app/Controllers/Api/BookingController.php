<?php

namespace App\Controllers\Api;

use App\Models\Booking;

// use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
// use CodeIgniter\Controller;

class BookingController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->Booking = new Booking();
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'hotel_id' => 'required',
            'room_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hotel/create')->withInput()->with('validation', $validation);
            // return respond not validate
        }

        $data = $this->Booking->insert([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'hp' => $this->request->getVar('hp'),
            'hotel_id' => $this->request->getVar('hotel_id'),
            'room_id' => $this->request->getVar('room_id'),
            'checkin' => $this->request->getVar('checkin'),
            'checkout' => $this->request->getVar('checkout'),
            'status' => $this->request->getVar('status'),
            'payment_method' => $this->request->getVar('payment_method'),
        ]);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Booking Added'
            ]
        ];

        return $this->respondCreated($response, 201);
        // return respond succes and send data
    }

    public function show($email)
    {
        $data = $this->Booking->where('email', $email)->findAll();
        return $this->respond($data, 200);
    }
}
