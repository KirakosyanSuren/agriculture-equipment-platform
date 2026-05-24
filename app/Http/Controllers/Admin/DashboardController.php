<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Services\FeedbackService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __construct(
      private FeedbackService $feedback_service
    ) {}

    public function index(Request $request): View
    {
        $feedbacks = $this->feedback_service->getAll($request->all());
        $page_names = $this->feedback_service->getPageNames();

        return view('pages.admin.dashboard', compact('feedbacks', 'page_names'));
    }

    public function destroy(Feedback $feedback): RedirectResponse
    {
        $this->feedback_service->destroy($feedback);

        return redirect()
            ->back()
            ->with('success', 'Feedback deleted successfully');
    }

    public function changeStatus(Feedback $feedback): RedirectResponse
    {
        $this->feedback_service->changeStatus($feedback);

        return redirect()
            ->back()
            ->with('success', 'Feedback status changed successfully');
    }
}
