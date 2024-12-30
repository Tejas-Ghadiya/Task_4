<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\E_mail;
use App\Models\bill;
use App\Models\pdf;
use Illuminate\Support\Facades\Mail;

class Mail_Controller extends Controller
{
    public function SendEmail($id)
    {
        $pdf = new pdf();
        $pdf = pdf::find($id);
        $pdfPath = public_path($pdf->path);
        $bill = new bill();
        $bill = bill::find($pdf->bid);

        $to =  $bill->email;
        $mas = "This is a test email with a PDF attachment.";
        $subject = "Test Email with Attachment";
        // Send the email with the PDF attachment
        Mail::to($to)->send(new E_mail($mas, $subject, $pdfPath));

        return redirect()->route('dilivary.your_dilivary');
    }
}
