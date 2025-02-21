<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MentorModel;

class MentorController extends BaseController
{
    public function showMentor()
    {
        $model = new MentorModel();
        $data['pembimbing'] = $model->findAll();

        return view('admin/mentor', $data);
    }
}
