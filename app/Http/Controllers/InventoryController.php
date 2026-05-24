<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\EquipmentTypeService;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InventoryController extends Controller
{

    public function __construct(
        private InventoryService $inventory_service,
        private BrandService $brand_service,
        private EquipmentTypeService $equipment_type_service
    ) {}

    public function index(Request $request): View
    {

        $brands = $this->brand_service->getAll();
        $equipment_types = $this->equipment_type_service->getAll();
        $inventories = $this->inventory_service->getAll($request->all());

        return view('pages.inventory',
            compact(
                'inventories',
                'brands',
                'equipment_types'
            )
        );
    }

    public function show($slug): View
    {
        $inventory = $this->inventory_service->findBySlug($slug);
        $featured_inventory = $this->inventory_service->getRandom();

        return view('pages.product', compact('inventory', 'featured_inventory'));
    }
}
