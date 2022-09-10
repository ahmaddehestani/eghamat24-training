<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Installment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstallmentController extends Controller
{
    public function defineInstallment()
    {
        return view('defineInstallment');
    }

    public function storeInstallment(Request $request)
    {
        $validated = $this->validate($request, [
            "installmentName" => "required|string",
            "installment_count" => "required|string",
            "start_price"=> "required|string",
            "end_price"=> "required|string",
           
        ]);
        // dd($validated);

        Installment::create([
            "name" => $validated['installmentName'],
            "user_ref_id" => Auth::id(),
            "installment_count" => $validated['installment_count'],
            "start_price"=>$validated['start_price'],
            "end_price"=>$validated['end_price']
           
            
        ]);
        return redirect()->route('defineInstallment');
    }
}
