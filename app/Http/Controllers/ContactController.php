<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(
        private ContactService $contact_service
    ) {}


    public function index(): View
    {
        $contacts = $this->contact_service->getActive();
        return view('pages.contact', compact('contacts'));
    }
}
