<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentTypeRequest;
use App\Models\EquipmentType;
use App\Services\EquipmentTypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EquipmentTypeController extends Controller
{

    public function __construct(
        private EquipmentTypeService $equipment_service
    ){}

    public function index(): View
    {
        $equipment_types = $this->equipment_service->getAll();
        return view('pages.admin.equipment-type', compact('equipment_types'));
    }

    public function store(EquipmentTypeRequest $request): RedirectResponse
    {
        $this->equipment_service->store($request->validated());

        return back()->with('success', 'Equipment Type created successfully');
    }

    public function update(EquipmentTypeRequest $request, EquipmentType $equipment_type): RedirectResponse
    {
        $this->equipment_service->update($equipment_type, $request->validated());

        return back()->with('success', 'Equipment Type changed successfully');

    }

    public function destroy(EquipmentType $equipment_type)
    {
        $this->equipment_service->destroy($equipment_type);

        return back()->with('success', 'Equipment Type deleted successfully');
    }
}
