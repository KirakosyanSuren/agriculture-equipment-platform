<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(
        private ContactService $contact_service
    ) {}

    public function index(): View
    {
        $contacts = $this->contact_service->getAll();
        return view('pages.admin.contact.index', compact('contacts'));
    }

    public function create(): View
    {
        return view('pages.admin.contact.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {

        $this->contact_service->store($request->validated());

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact created successfully');
    }

    public function edit(Contact $contact): View
    {
        return view('pages.admin.contact.edit', compact('contact'));
    }

    public function update(Contact $contact, ContactRequest $request): RedirectResponse
    {

        $this->contact_service->update($contact, $request->validated());

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $this->contact_service->destroy($contact);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully');
    }

    public function changeStatus(Contact $contact): RedirectResponse
    {
        $this->contact_service->changeStatus($contact);

        return redirect()
            ->back()
            ->with('success', 'Contact status changed successfully');
    }
}
