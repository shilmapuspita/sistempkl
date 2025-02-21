<?php

namespace App\Controllers;

use App\Models\MentorModel;
use CodeIgniter\Controller;

class MentorController extends Controller
{
    public function showMentor()
    {
        $model = new MentorModel();
        $data = [
            'pembimbing' => $model->getPaginateData(10),
            'pager' => $model->pager
        ];


        return view('admin/mentor/mentor', $data);
    }
}

