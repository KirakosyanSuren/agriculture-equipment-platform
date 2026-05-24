<?php

namespace App\Http\Controllers;

use App\Services\CareerService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareersController extends Controller
{

    public function __construct(
        private CareerService $career_service
    ) {}


    public function index(): View
    {
        $positions = $this->career_service->getActive();
;
        return  view('pages.careers', compact('positions'));
    }
}
