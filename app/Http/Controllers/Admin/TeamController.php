<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\CreateRequest;
use App\Http\Requests\Team\UpdateRequest;
use App\Models\TeamMember;
use App\Services\TeamService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeamController extends Controller
{

    public function __construct(
        private TeamService $team_service
    ) {}


    public function index(): View
    {
        $members = $this->team_service->getAll();
        return view('pages.admin.team.index', compact('members'));
    }

    public function create(): View
    {
        return view('pages.admin.team.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {

        $this->team_service->store($request->validated());

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'Team member created successfully');
    }

    public function edit(TeamMember $member): View
    {
        return view('pages.admin.team.edit', compact('member'));
    }

    public function update(UpdateRequest $request, TeamMember $member): RedirectResponse
    {
        $this->team_service->update($member, $request->validated());

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'Team member updated successfully');
    }

    public function destroy(TeamMember $member): RedirectResponse
    {
        $this->team_service->destroy($member);

        return redirect()
            ->back()
            ->with('success', 'Team member deleted successfully');
    }

    public function changeStatus(TeamMember $member)
    {
        $this->team_service->changeStatus($member);

        return redirect()
            ->back()
            ->with('success', 'Team member status changed successfully');
    }
}
