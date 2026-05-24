<?php

namespace App\Http\Controllers;

use App\Services\FaqService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{

    public function __construct(
        private FaqService $faq_service
    ) {}

    public function index(): View
    {
        $faqs = $this->faq_service->getActive();

        return view('pages.faq', compact('faqs'));
    }
}
