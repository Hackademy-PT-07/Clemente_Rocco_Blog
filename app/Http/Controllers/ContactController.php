<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function form()
    {

        $title = "Contatti";

        $text = "Vuoi unirti a noi? Scrivici e analizzeremo la tua richiesta";

        return view('pages.contacts', compact('title', 'text'));
    }

    public function formData(Request $request)
    {
        $formContent = [
            $request->name,
            $request->email,
            $request->message
        ];

        foreach ($formContent as $content) {
            if ($content == null) {
                return redirect()->route('contacts')
                    ->with(['danger' => 'Attenzione! Devi compilare tutti i campi']);
            }
        }
        //dd($request);
        //dd($request->all());

        $mail = new ContactMail($request->name, $request->email, $request->message);

        //return $mail->render();

        Mail::to('admin@example.com')->send($mail);

        //return redirect()->back();
        return redirect()->route('contacts')
            ->with(['success' => 'Abbiamo ricevuto la tua richiesta, ti risponderemo il prima possibile']);
    }
}
