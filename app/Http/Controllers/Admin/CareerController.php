<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use App\Models\Career;
use App\Services\CareerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{

    public function __construct(
        private CareerService $career_service
    ) {}

    public function index(): View
    {
        $careers = $this->career_service->getAll();

        return view('pages.admin.careers.index', compact('careers'));
    }

    public function create(): View
    {
        return view('pages.admin.careers.create');
    }

    public function store(CareerRequest $request): RedirectResponse
    {

        $this->career_service->store($request->validated());

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Position created successfully');
    }

    public function edit(Career $career): View
    {
        return view('pages.admin.careers.edit', compact('career'));
    }

    public function update(CareerRequest $request, Career $career): RedirectResponse
    {
        $this->career_service->update($career, $request->validated());

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Position updated successfully');
    }

    public function destroy(Career $career): RedirectResponse
    {
        $this->career_service->destroy($career);

        return redirect()
            ->back()
            ->with('success', 'Position deleted successfully');
    }

    public function ChangeStatus(Career $career): RedirectResponse
    {
        $this->career_service->changeStatus($career);

        return redirect()
            ->back()
            ->with('success', 'Status changed successfully');
    }
}
