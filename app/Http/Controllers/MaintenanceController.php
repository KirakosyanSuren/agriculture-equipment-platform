<?php

namespace App\Http\Controllers;

use App\Services\EquipmentTypeService;
use Illuminate\View\View;

class MaintenanceController extends Controller
{

    public function __construct(
        private EquipmentTypeService $equipment_type_service
    ) {}

    public function index(): View
    {
        $equipment_types = $this->equipment_type_service->getAll();

        return view('pages.maintenance', compact('equipment_types'));
    }
}
