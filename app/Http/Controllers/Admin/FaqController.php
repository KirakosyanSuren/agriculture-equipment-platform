<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{

    public function __construct(
        private FaqService $faq_service
    ) {}

    public function index(): View
    {
        $faqs = $this->faq_service->getAll();
        return view('pages.admin.faq.index', compact('faqs'));
    }

    public function create(): View
    {
        return view('pages.admin.faq.create');
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        $this->faq_service->store($request->all());

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'Faq created successfully');
    }

    public function edit(Faq $faq)
    {
        return view('pages.admin.faq.edit', compact('faq'));
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $this->faq_service->update($faq, $request->all());

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'Faq updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $this->faq_service->destroy($faq);

        return back()->with('success', 'Faq deleted successfully');
    }

    public function changeStatus(Faq $faq)
    {
        $this->faq_service->changeStatus($faq);

        return back()->with('success', 'Status changed successfully');
    }
}
