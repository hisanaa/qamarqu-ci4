<?php

namespace App\Controllers;

use App\Models\Booking;

class BookingController extends BaseController
{

    public function __construct()
    {
        $this->Booking = new Booking();
    }

    public function index()
    {
        $data = [
            'bookings' => $this->Booking->findAll()
        ];
        return view('bookings/index', $data);
    }
}
