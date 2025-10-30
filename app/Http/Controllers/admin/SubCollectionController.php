<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Subcollection;

class SubCollectionController extends Controller

{
    protected $table = 'subcollections';

    public function addsubcollection()
    {
        $collections = Collection::all();
        return view('admin.subcollection.add_subcollection',  compact('collections'));
    }


    public function addsubcollectiondata(Request $request)
    {
        \Log::info($request->all());
        // this will validate all fields and then only add data
        $validated = $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'secoundary_collection_1' => 'required|string|max:255',
            'secoundary_collection_2' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:subcollections,slug',
            'meta_text' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:255'
        ]);

        $subcollection = new Subcollection();
        $subcollection->collection_id = $request->input('collection_id');
        $subcollection->secoundary_collection_1 = $request->input('secoundary_collection_1');
        $subcollection->secoundary_collection_2 = $request->input('secoundary_collection_2');
        $subcollection->slug = $request->input('slug');
        $subcollection->meta_text = $request->input('meta_text');
        $subcollection->meta_description = $request->input('meta_description');
        $subcollection->keywords = $request->input('keywords');
        $subcollection->status = $request->has('status') ? 1 : 0;
        $subcollection->save();

        return redirect()->route('admin.subcollection')->with('success', 'Sub-collection added successfully');
    }

    public function subcollection(Request $request)
    {
        $page = 'Subcollection';
        $icon = 'subcollection.png';
        $subcollections = Subcollection::all();
        return view('admin.subcollection.subcollection',compact('icon','page','subcollections'));
    }

    public function editSubcollection($id)
    {
        // Get the specific subcollection by ID
        $subcollection = Subcollection::find($id);
        $collection = Collection::all(); // To show categories in a dropdown or select

        // If the subcollection exists, return the edit view
        if ($subcollection) {
            return view('admin.subcollection.edit_subcollection', compact('subcollection', 'collection'));
        }

        // If not found, redirect with error
        return redirect()->route('admin.subcollection')->with('error', 'Subcollection not found');
    }

    public function updateSubcollection(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'secoundary_collection_1' => 'required|string|max:255',
            'secoundary_collection_2' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:subcollections,slug,' . $id,
            'meta_text' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:255'
        ]);

        // Find the subcategory to update
        $subcollection = Subcollection::find($id);

        if ($subcollection) {
            $subcollection->collection_id = $request->input('collection_id');
            $subcollection->secoundary_collection_1 = $request->input('secoundary_collection_1');
            $subcollection->secoundary_collection_2 = $request->input('secoundary_collection_2');
            $subcollection->slug = $request->input('slug');
            $subcollection->meta_text = $request->input('meta_text');
            $subcollection->meta_description = $request->input('meta_description');
            $subcollection->keywords = $request->input('keywords');
            $subcollection->status = $request->has('status') ? 1 : 0; // Update status if checked
            $subcollection->save();

            return redirect()->route('admin.subcollection')->with('success', 'Sub-collection updated successfully');
        }

        return redirect()->route('admin.subcollection')->with('error', 'Subcollection not found');
    }

    // --------------------------------------------------------------------------------------------------

    public function deletesubcollection($id){
        // Find the subcategory by its ID
        $subcollection = Subcollection::find($id);

        // If subcollection exists, delete it
        if ($subcollection) {
            $subcollection->delete();
            return response()->json(['status' => 'success', 'message' => 'Subcollection deleted successfully']);
        }

        // If subcollection doesn't exist
        return response()->json(['status' => 'error', 'message' => 'Subcollection not found']);
    }
}
