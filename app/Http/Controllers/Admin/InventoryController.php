<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\CreateRequest;
use App\Http\Requests\Inventory\UpdateRequest;
use App\Models\Inventory;
use App\Services\BrandService;
use App\Services\EquipmentTypeService;
use App\Services\InventoryService;
use Illuminate\Http\RedirectResponse;
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

        return view('pages.admin.inventory.index',
            compact(
                'inventories',
                'brands',
                'equipment_types'
            )
        );
    }

    public function create(): View
    {

        $brands = $this->brand_service->getAll();
        $equipment_types = $this->equipment_type_service->getAll();

        return view('pages.admin.inventory.create',
            compact(
                'brands',
                'equipment_types'
            )
        );
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->inventory_service->store($request->validated());

        return redirect()
            ->route('admin.inventories.index')
            ->with('success', 'Product created successfully');
    }

    public function edit(Inventory $inventory): View
    {
        $brands = $this->brand_service->getAll();
        $equipment_types = $this->equipment_type_service->getAll();

        return view('pages.admin.inventory.edit',
            compact(
                'inventory',
                'brands',
                'equipment_types',
            )
        );
    }

    public function update(UpdateRequest $request, Inventory $inventory)
    {
        $this->inventory_service->update($inventory, $request->all());

        return redirect()
            ->route('admin.inventories.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Inventory $inventory)
    {
        $this->inventory_service->destroy($inventory);

        return redirect()->back()->with('success', 'Product deleted successfully');

    }

    public function changeStatus(Inventory $inventory): RedirectResponse
    {
        $this->inventory_service->changeStatus($inventory);

        return redirect()->back()->with('success', 'Product featured changed successfully');
    }
}
