<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Services\FeedbackService;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    public function __construct(
        protected FeedbackService $feedback_service
    ) {}

    public function store(FeedbackRequest $request): RedirectResponse
    {
        $this->feedback_service->store($request->validated());

        return redirect()->back()->with('success', 'Feedback send successfully');
    }
}
