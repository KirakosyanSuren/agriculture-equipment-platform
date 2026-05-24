<?php

namespace App\Http\Controllers;

use App\Services\TeamService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function __construct(
        private TeamService $team_service
    ) {}

    public function index(): View
    {
        $members = $this->team_service->getActive();
        return view('pages.team', compact('members'));
    }
}
