<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Log;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class SubCategoryController extends Controller
{
    public function addsubcategory()
    {
        $categories = Category::all();
        return view('admin.subcategory.add_subcategory',  compact('categories'));
    }

    public function addsubcategorydata(Request $request)
    {
        // this will validate all fields and then only add data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:subcategories,slug',
            'meta_text' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:255'
        ]);


        $subcategory = new Subcategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->slug = $request->input('slug');
        $subcategory->meta_text = $request->input('meta_text');
        $subcategory->meta_description = $request->input('meta_description');
        $subcategory->keywords = $request->input('keywords');
        $subcategory->status = $request->has('status') ? 1 : 0;
        $subcategory->save();

        return redirect()->route('admin.subcategory')->with('success', 'Sub-category added successfully');
    }

    public function subcategory(Request $request)
    {
        $page = 'Subcategory';
        $icon = 'subcategory.png';
        $subcategories = Subcategory::all();
        return view('admin.subcategory.subcategories',compact('icon','page','subcategories'));
    }


    // --------------------------------------------------------------------------------------------------
    public function editSubcategory($id)
    {
        // Get the specific subcategory by ID
        $subcategory = Subcategory::find($id);
        $categories = Category::all(); // To show categories in a dropdown or select

        // If the subcategory exists, return the edit view
        if ($subcategory) {
            return view('admin.subcategory.edit_subcategories', compact('subcategory', 'categories'));
        }

        // If not found, redirect with error
        return redirect()->route('admin.subcategory')->with('error', 'Subcategory not found');
    }



    public function updateSubcategory(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:subcategories,slug,' . $id, // Update validation rule for slug
            'meta_text' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:255'
        ]);

        // Find the subcategory to update
        $subcategory = Subcategory::find($id);

        if ($subcategory) {
            // Update the subcategory data
            $subcategory->category_id = $request->input('category_id');
            $subcategory->name = $request->input('name');
            $subcategory->slug = $request->input('slug');
            $subcategory->meta_text = $request->input('meta_text');
            $subcategory->meta_description = $request->input('meta_description');
            $subcategory->keywords = $request->input('keywords');
            $subcategory->status = $request->has('status') ? 1 : 0; // Update status if checked
            $subcategory->save();

            return redirect()->route('admin.subcategory')->with('success', 'Sub-category updated successfully');
        }

        return redirect()->route('admin.subcategory')->with('error', 'Subcategory not found');
    }

    // --------------------------------------------------------------------------------------------------

    public function deletesubcategory($id){
        // Find the subcategory by its ID
        $subcategory = Subcategory::find($id);

        // If subcategory exists, delete it
        if ($subcategory) {
            $subcategory->delete();
            return response()->json(['status' => 'success', 'message' => 'Subcategory deleted successfully']);
        }

        // If subcategory doesn't exist
        return response()->json(['status' => 'error', 'message' => 'Subcategory not found']);
    }

}
