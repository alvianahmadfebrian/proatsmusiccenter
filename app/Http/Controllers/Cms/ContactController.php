<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSetting;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = ContactSetting::first();
        return view('cms.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = ContactSetting::first();

        $request->validate([
            'address_representative' => 'required|string',
            'address_workshop' => 'required|string',
            'email' => 'required|email',
            'whatsapp' => 'required|string',
            'instagram' => 'nullable|string', // Relax validation to support standard names or URLs
            'facebook' => 'nullable|string',
            'map_iframe_url' => 'nullable|string',
        ]);

        $data = $request->except('_token');
        $contact->update($data);

        return back()->with('success', 'Kontak berhasil diupdate');
    }
}
