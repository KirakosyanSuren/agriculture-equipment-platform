<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{

    public function __construct(
        private BrandService $brand_service
    ) {}

    public function index(): View
    {
        $brands = $this->brand_service->getAll();
        return view('pages.admin.brand', compact('brands'));
    }

    public function store(BrandRequest $request): RedirectResponse
    {
        $this->brand_service->store($request->validated());

        return back()->with('success', 'Brand created successfully');
    }

    public function update(BrandRequest $request, Brand $brand): RedirectResponse
    {
        $this->brand_service->update($brand, $request->validated());

        return back()->with('success', 'Brand changed successfully');

    }

    public function destroy(Brand $brand)
    {
        $this->brand_service->destroy($brand);

        return back()->with('success', 'Brand deleted successfully');
    }
}
