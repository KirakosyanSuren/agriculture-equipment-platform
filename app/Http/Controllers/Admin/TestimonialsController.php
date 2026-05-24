<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonials\CreateRequest;
use App\Http\Requests\Testimonials\UpdateRequest;
use App\Models\Testimonial;
use App\Services\TestimonialsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialsController extends Controller
{

    public function __construct(
        private TestimonialsService $testimonials_service
    ) {}

    public function index(): View
    {
        $testimonials = $this->testimonials_service->getAll();
        return view('pages.admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('pages.admin.testimonials.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->testimonials_service->store($request->validated());

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('pages.admin.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $this->testimonials_service->update($testimonial, $request->validated());

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial update successfully');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $this->testimonials_service->destroy($testimonial);

        return redirect()
            ->back()
            ->with('success', 'Testimonial status changed successfully');

    }
}
