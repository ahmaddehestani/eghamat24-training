<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Installment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function defineService()
    {
        $categories = Category::all();
        $installments = Installment::all();
        return view('defineServices', compact('categories', 'installments'));
    }

    public function myServices()
    {
        $services = Service::where("user_ref_id", Auth::id())->get();
       
        return view('myServices', compact('services'));
    }


    public function services(Request $request)
    {

        $services = Service::all();
        return view('welcome', compact('services'));
    }

    public function storeService(Request $request)
    {
        $validated = $this->validate(
            $request,
            [
                "description" => "required|string",
                "title" => "required|string",
                // "categoryID" => "required|integer",
                "installment_id" => "required|integer",
                "category_id"=>"required"
            ]
        );

        Service::create([
            "category_ref_id" => $validated['category_id'],
            "installment_ref_id" => $validated['installment_id'],
            "user_ref_id" => Auth::id(),
            "title" => $validated['title'],
            "description" => $validated['description']
        ]);
        return redirect()->route('defineService');
    }

    public function findService()
    {
        $categories = DB::select("SELECT * FROM categories");
        $finalCategories = [];
        $parents = [];

        foreach ($categories as $category) {
            if (!$category->parent_ref_id)
                $parents[] = $category;
        }

        foreach ($parents as $parent) {
            $i = true;
            foreach ($categories as $category) {
                if ($i) {
                    $finalCategories[$parent->parent_ref_id][] = $parent;
                    $i = false;
                } else if ($category->parent_ref_id == $parent->category_id) {
                    $finalCategories[$parent->parent_ref_id][] = $category;
                }
            }
        }

        return view('findService', compact('finalCategories'));
    }

    public function findServiceResult(Request $request)
    {
        $categories = DB::select("SELECT * FROM categories");
        $finalCategories = [];
        $parents = [];

        foreach ($categories as $category) {
            if (!$category->parent_ref_id)
                $parents[] = $category;
        }

        foreach ($parents as $parent) {
            $i = true;
            foreach ($categories as $category) {
                if ($i) {
                    $finalCategories[$parent->parent_ref_id][] = $parent;
                    $i = false;
                } else if ($category->parent_ref_id == $parent->category_id) {
                    $finalCategories[$parent->parent_ref_id][] = $category;
                }
            }
        }

        $services = Service::where("category_ref_id", $request['categoryID'])->get();
        return view('findService', compact('services', 'finalCategories'));
    }
}
