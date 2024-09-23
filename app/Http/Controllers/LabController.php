<?php

namespace App\Http\Controllers;


class LabController extends Controller
{
    public function welcome()
    {
        $data = ['name' => 'Ruslan', 'role' => 'Student'];
        return view('welcome', $data);
    }

    public function index()
    {
        $data = ['name' => 'Ruslan', 'role' => 'Student'];
        return view('welcome', $data);
    }

    public function about()
    {
        $data = ['name' => 'Ruslan', 'role' => 'Student', 'description' => 'hello i`m ruslan'];
        return view('about', $data);
    }

    public function contact()
    {
        $data = ['email' => 'rtroparchuk@gmail.com', 'phone' => '+380970390570'];
        return view('contact', $data);
    }

    public function hobbies()
    {
        $data = ['hobbies' => [
            'football',
            'music'
        ]];
        return view('hobbies', $data);
    }
}
