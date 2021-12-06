<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Room;

class RoomController extends BaseController
{
    public function __construct()
    {
        $this->Room = new Room();
    }

    public function store()
    {
        if (!$this->validate([
            'hotel_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'uploaded[thumbnail]',
            'room_quota' => 'required',
            'guest_quota' => 'required',
            'status' => 'required',
            'price' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hotel/' . $this->request->getVar('hotel_id'))->withInput();
        }
        // get file 
        $file = $this->request->getFile('thumbnail');

        // get random name
        $randName = $file->getRandomName();
        $file->move('img', $randName);


        $this->Room->save([
            'hotel_id' => $this->request->getVar('hotel_id'),
            'title' => $this->request->getVar('title'),
            'thumbnail' => $randName,
            'room_quota' => $this->request->getVar('room_quota'),
            'guest_quota' => $this->request->getVar('guest_quota'),
            'status' => $this->request->getVar('status'),
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashData('msg', 'succes!');

        return redirect()->to('/hotel/' . $this->request->getVar('hotel_id'));
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'room' => $this->Room->find($id)
        ];
        return view('rooms/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            // 'hotel_id' => 'required',
            'title' => 'required',
            // 'thumbnail' => 'uploaded[thumbnail]',
            'room_quota' => 'required',
            'guest_quota' => 'required',
            'status' => 'required',
            'price' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hotel/' . $this->request->getVar('hotel_id'))->withInput();
        }

        // dd($this->request->getFile('thumbnail'));




        // get file 
        $file = $this->request->getFile('thumbnail');
        // get random name
        if ($file->getError() == 4) {
            $thumbnail = $this->request->getVar('oldthumbnail');
        } else {
            $randName = $file->getRandomName();
            $thumbnail = $randName;
            $file->move('img', $randName);
        }


        $this->Room->save([
            'id' => $id,
            // 'hotel_id' => $this->request->getVar('hotel_id'),
            'title' => $this->request->getVar('title'),
            'thumbnail' => $thumbnail,
            'room_quota' => $this->request->getVar('room_quota'),
            'guest_quota' => $this->request->getVar('guest_quota'),
            'status' => $this->request->getVar('status'),
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashData('msg', 'succes edited!');

        return redirect()->to('/hotel/' . $this->request->getVar('hotel_id'));
    }

    public function destroy($id)
    {
        $this->Room->delete($id);
        session()->setFlashData('msg', 'succes deleted!');
        return redirect()->to('/hotel/' . $this->request->getVar('hotel_id'));
    }
}
