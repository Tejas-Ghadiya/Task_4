<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\pdf as ModelsPdf;
use App\Models\product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PDF_Controller extends Controller
{
    public function generatePDF($bid)
    {
        $id = $bid;

        $bill = new Bill();
        $bill = $bill->find($id);
        $product = DB::table('product')->where('id', $bill->pid)->first(); // Fetch the first product
        if ($product) {
            $sealsman = DB::table('sealsmen')->where('id', $product->sid)->first();
            $data = [
                'title' => 'Bill',
                'date' => $bill->created_at ? $bill->created_at->format('Y-m-d') : now()->format('Y-m-d'), // Ensure date is formatted properly or fallback to current date
                'content' => 'This is a sample content for your PDF.',
                'image' => $bill->pimage ?? '', // Handle null image gracefully
                'product_name' => $bill->pname ?? 'N/A', // Handle missing product name
                'total' => $bill->totel ?? 0, // Default to 0 if null
                'quantity' => $bill->quantity ?? 1, // Default to 1 if null
                'uname' => $bill->name ?? 'N/A', // Handle missing user name
                'email' => $bill->email ?? 'N/A', // Handle missing email
                'mobile_number' => $bill->mobile_number ?? 'N/A', // Handle missing mobile number
                'address' => $bill->address ?? 'N/A', // Handle missing address
                'invoice_number' => $bill->id ?? 'N/A', // Handle missing invoice number
                'shop_name' => $sealsman->shop_name ?? 'N/A', // Add null coalescence for shop details
                'shop_address' => $sealsman->address ?? 'N/A',
                'shop_email' => $sealsman->email ?? 'N/A',
                'shop_phone' => $sealsman->mobile_number ?? 'N/A',
                'product_price' => $product->price ?? 0, // Default product price to 0 if null
            ];

            $pdf = Pdf::loadView('pdf_template', $data);

            // Define the file path
            $filePath = '\invoices\Your_Bill' . $data['invoice_number'] . '.pdf';
            $bill = ModelsPdf::create([
                'bid' => $bill->id,
                'path' => 'storage' . $filePath,
            ]);
            if ($bill) {
                // Store the PDF in the 'public' disk
                Storage::disk('public')->put($filePath, $pdf->output());

                return redirect()->route('send_mail', ['id' => $bill->id]);
            }
        } else {

            return 'Product not found';
        }
    }
}
