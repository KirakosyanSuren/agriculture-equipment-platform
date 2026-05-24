<?php

namespace App\Http\Controllers;

use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private InventoryService $inventory_service,
    ) {}

    public function index(): View
    {
        $inventories = $this->inventory_service->getFeatured();
        return view('pages.home', compact('inventories'));
    }
}
