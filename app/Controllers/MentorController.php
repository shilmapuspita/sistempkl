<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MentorModel;

class MentorController extends BaseController
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
