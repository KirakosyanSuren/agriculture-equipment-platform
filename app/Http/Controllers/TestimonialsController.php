<?php

namespace App\Http\Controllers;

use App\Services\TestimonialsService;
use Illuminate\View\View;

class TestimonialsController extends Controller
{

    public function __construct(
        private TestimonialsService $testimonials_service
    ) {}

    public function index(): View
    {
        $testimonials = $this->testimonials_service->getActive();
        return view('pages.testimonials', compact('testimonials'));
    }
}
