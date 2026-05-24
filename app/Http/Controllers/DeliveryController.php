<?php

namespace App\Http\Controllers;

use App\Services\EquipmentTypeService;
use Illuminate\View\View;

class DeliveryController extends Controller
{
    public function __construct(
        private EquipmentTypeService $equipment_type_service
    ) {}

    public function index(): View
    {
        $equipment_types = $this->equipment_type_service->getAll();

        return view('pages.delivery', compact('equipment_types'));
    }
}
