<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Hotel;
use App\Models\Room;

class HotelController extends BaseController
{
    public function __construct()
    {
        $this->Hotel = new Hotel();
        $this->Room = new Room();
    }

    public function index()
    {
        $data = [
            'hotels' => $this->Hotel->findAll()
        ];
        return view('hotels/index', $data);
    }

    public function show($id)
    {
        $data = [
            'hotel' => $this->Hotel->find($id),
            'validation' => \Config\Services::validation(),
            'rooms' => $this->Room->findAll()
        ];

        return view('hotels/show', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('hotels/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'thumbnail' => 'uploaded[thumbnail]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hotel/create')->withInput()->with('validation', $validation);
        }

        // get file 
        $file = $this->request->getFile('thumbnail');

        // get random name
        $randName = $file->getRandomName();
        $file->move('img', $randName);

        $this->Hotel->save([
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'location' => $this->request->getVar('location'),
            'thumbnail' => $randName
        ]);

        session()->setFlashData('msg', 'succes added!');

        return redirect()->to(site_url('hotel'));
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'hotel' => $this->Hotel->find($id)
        ];
        return view('hotels/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hotel/create')->withInput()->with('validation', $validation);
        }
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

        $this->Hotel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'location' => $this->request->getVar('location'),
            'thumbnail' => $thumbnail
        ]);

        session()->setFlashData('msg', 'succes edited!');

        return redirect()->to(site_url('hotel'));
    }

    public function destroy($id)
    {
        $this->Hotel->delete($id);
        session()->setFlashData('msg', 'succes deleted!');
        return redirect()->to(site_url('hotel'));
    }
}
