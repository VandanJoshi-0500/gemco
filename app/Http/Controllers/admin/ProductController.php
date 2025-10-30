<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Subcategory;
use App\Models\Subcollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Str;
use Cache;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    // public function products(Request $request){
    //     $products = Product::orderBy('id','Desc')->where('active',1)->get();
    //     $categories = Category::where('status',1)->where('active',1)->get();
    //     $parent_categories = Category::where('parent','==',0)->where('status',1)->where('active',1)->orderBy('id','Desc')->get();
    //     $page = 'Products';
    //     $icon = 'product.png';
    //     return view('admin.products.products',compact('icon','page','products','categories','parent_categories'));
    // }



    public function index(Request $request)
    {
        return view('admin.products.products');
    }



    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->custom_search;

            $products = Product::with(['collections', 'categories'])
                ->select([
                    'id', 'name', 'sku', 'collection', 'category', 'price',
                    'special_price', 'tag_price', 'quantity_stock', 'status'
                ]);

            // If there's a custom search, we filter based on it
            if (!empty($search)) {
                $products->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('sku', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhereHas('collections', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('categories', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
                        });
                });
            }

            return DataTables::of($products)
                ->addIndexColumn()
                // Add virtual columns for category and collection names
                ->addColumn('collection_name', function ($product) {
                    return $product->collections->name ?? '-';
                })
                ->addColumn('category_name', function ($product) {
                    return $product->categories->name ?? '-';
                })
                // Make these virtual columns searchable by adding them to the DataTables search
                ->filterColumn('collection_name', function($query, $keyword) {
                    $query->whereHas('collections', function($q) use ($keyword) {
                        $q->where('name', 'like', "%$keyword%");
                    });
                })
                ->filterColumn('category_name', function($query, $keyword) {
                    $query->whereHas('categories', function($q) use ($keyword) {
                        $q->where('name', 'like', "%$keyword%");
                    });
                })
                ->editColumn('status', function ($product) {
                    return $product->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Deactive</span>';
                })
                ->addColumn('action', function ($product) {
                    $edit = route('admin.edit_product', $product->id);
                    return '
                        <div class="d-flex float-end">
                            <a href="' . $edit . '"><i class="ri-edit-2-fill fs-20"></i></a>
                            <a href="javascript:void(0);" data-id="' . $product->id . '" class="ms-2 delete-btn">
                                <i class="ri-delete-bin-fill fs-20"></i>
                            </a>
                        </div>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }


    // public function getData(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $search = $request->custom_search;

    //         $products = Product::with(['collections', 'categories'])
    //             ->select([
    //                 'id', 'name', 'sku', 'collection', 'category', 'price',
    //                 'special_price', 'tag_price', 'quantity_stock', 'status'
    //             ]);

    //         if (!empty($search)) {
    //             $products->where(function ($query) use ($search) {
    //                 $query->where('name', 'like', '%' . $search . '%')
    //                     ->orWhere('sku', 'like', '%' . $search . '%')
    //                     ->orWhere('price', 'like', '%' . $search . '%')
    //                     ->orWhereHas('collections', function ($q) use ($search) {
    //                         $q->where('name', 'like', '%' . $search . '%');
    //                     })
    //                     ->orWhereHas('categories', function ($q) use ($search) {
    //                         $q->where('name', 'like', '%' . $search . '%');
    //                     });
    //             });
    //         }

    //         return DataTables::of($products)
    //             ->addIndexColumn()
    //             ->addColumn('collection_name', function ($product) {
    //                 return $product->collections->name ?? '-';
    //             })
    //             ->addColumn('category_name', function ($product) {
    //                 return $product->categories->name ?? '-';
    //             })
    //             ->editColumn('status', function ($product) {
    //                 return $product->status
    //                     ? '<span class="badge bg-success">Active</span>'
    //                     : '<span class="badge bg-danger">Deactive</span>';
    //             })
    //             ->addColumn('action', function ($product) {
    //                 $edit = route('admin.edit_product', $product->id);
    //                 return '
    //                     <div class="d-flex float-end">
    //                         <a href="' . $edit . '"><i class="ri-edit-2-fill fs-20"></i></a>
    //                         <a href="javascript:void(0);" data-id="' . $product->id . '" class="ms-2 delete-btn">
    //                             <i class="ri-delete-bin-fill fs-20"></i>
    //                         </a>
    //                     </div>
    //                 ';
    //             })
    //             ->rawColumns(['status', 'action'])
    //             ->make(true);
    //     }
    // }



    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['success' => true]);
    }





    public function addProduct(){
        $categories = Category::all();
        $parent_categories = Category::where('parent','==',0)->get();
        $collections = Collection::where('status',1)->where('active',1)->get();
        $subcategories = Subcategory::orderBy('name', 'asc')->get();
        $secoundary_collections_1 = Subcollection::where('status', 1)->orderBy('secoundary_collection_1', 'asc')->get()->unique('secoundary_collection_1');
        $secoundary_collections_2 = Subcollection::where('status', 1)->orderBy('secoundary_collection_2', 'asc')->get()->unique('secoundary_collection_2');

        $page  = 'Products';
        $icon  = 'products.png';

        if(Auth::user()->role == 1){
            return view('admin.products.add_product',compact('categories','parent_categories','collections','subcategories', 'secoundary_collections_1', 'secoundary_collections_2', 'page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function addProductData(Request $request){
        $request->validate([
            'name'      => 'required|unique:products,name',
            'sku'       => 'required|unique:products,sku',
            'price'     => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = [];
        if ($request->image_type == '1') {
            for ($i = 1; $i <= 5; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $image = $request->file('image' . $i);
                    $destinationPath = 'products/';
                    $rand = rand(1, 100);
                    $docImage = date('YmdHis') . $rand . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $docImage);
                    $images['image' . $i] = $docImage;
                } else {
                    $images['image' . $i] = null;
                }
            }
        } else {
            for ($i = 1; $i <= 5; $i++) {
                $images['image' . $i] = $request->input('image_link' . $i);
            }
        }

        $product =new Product();
        $product->name                      = $request->name;
        $product->sku                       = $request->sku;
        $product->color                     = $request->color;
        $product->size                      = $request->size;
        $product->hsn_code                  = $request->hsn_code;
        $product->category                  = $request->category;
        $product->subcategory               = $request->subcategory;
        $product->collection                = $request->collection;
        $product->secoundary_collection_1   = $request->secoundary_collection_1;
        $product->secoundary_collection_2   = $request->secoundary_collection_2;
        $product->price                     = $request->price;
        $product->special_price             = $request->special_price;
        $product->tag_price                 = $request->tag_price;
        $product->quantity_stock            = $request->quantity_stock;
        $product->gold_weight               = $request->gold_weight;
        $product->silver_weight             = $request->silver_weight;
        $product->diamond_weight            = $request->diamond_weight;
        $product->gemstone_name_1           = $request->gemstone_name_1;
        $product->gemstone_weight_1         = $request->gemstone_weight_1;
        $product->gemstone_name_2           = $request->gemstone_name_2;
        $product->gemstone_weight_2         = $request->gemstone_weight_2;
        $product->gemstone_name_3           = $request->gemstone_name_3;
        $product->gemstone_weight_3         = $request->gemstone_weight_3;
        $product->other_gemstones           = $request->other_gemstones;
        $product->other_gemstone_weight     = $request->other_gemstone_weight;
        $product->fossil_name               = $request->fossil_name;
        $product->fossil_weight             = $request->fossil_weight;
        $product->gross_weight             = $request->gross_weight;
        $product->total_gemstone_weight     = $request->total_gemstone_weight;
        $product->gemstone_type             = $request->gemstone_type;
        $product->diamond_cut               = $request->diamond_cut;
        $product->diamond_shape             = $request->diamond_shape;
        $product->diamond_grade             = $request->diamond_grade;
        $product->long_description          = $request->long_description;
        $product->long_description_2        = $request->long_description_2;
        $product->long_description_3        = $request->long_description_3;
        $product->short_description         = $request->short_description;
        $product->meta_title                = $request->meta_title;
        $product->meta_description          = $request->meta_description;
        $product->keyword                   = $request->keyword;
        $product->image_type                = $request->image_type;
        $product->image                    = $images['image1'];
        $product->image2                    = $images['image2'];
        $product->image3                    = $images['image3'];
        $product->image4                    = $images['image4'];
        $product->image5                    = $images['image5'];
        $product->status                    = 1;
        $product->active                    = 1;
        $product->save();
        if($product){
            return redirect()->route('admin.products');
        }else{
            return redirect()->back();
        }
    }
    public function editProduct(Request $request, $id = NULL){
        $categories = Category::all();
        $parent_categories = Category::where('parent', '==', 0)->get();
        $collections = Collection::where('status', 1)->where('active', 1)->get();
        $product = Product::where('id', $id)->first();
        $subcategories = Subcategory::orderBy('name', 'asc')->get();

        $secoundary_collections_1 = Subcollection::where('status', 1)->orderBy('secoundary_collection_1', 'asc')->get()->unique('secoundary_collection_1');
        $secoundary_collections_2 = Subcollection::where('status', 1)->orderBy('secoundary_collection_2', 'asc')->get()->unique('secoundary_collection_2');

        $page = 'Products';
        $icon = 'products.png';
        if (Auth::user()->role == 1) {
            return view('admin.products.edit_product', compact('categories', 'parent_categories', 'collections', 'product', 'page', 'icon', 'subcategories', 'secoundary_collections_1', 'secoundary_collections_2'));
        } else {
            return redirect()->route('admin');
        }
    }
    public function updateProduct(Request $request){
        {
            $request->validate([
                'name' => 'required|unique:products,name,' . $request->id,
                'sku' => 'required|unique:products,sku,' . $request->id,
                'price' => 'required',
            ]);

            $product = Product::find($request->id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }

            $images = [];

            if ($request->image_type == '1') {
                for ($i = 1; $i <= 5; $i++) {
                    if ($request->hasFile('image' . $i)) {
                        $image = $request->file('image' . $i);
                        $destinationPath = 'products/';
                        $rand = rand(1, 100);
                        $docImage = date('YmdHis') . $rand . "." . $image->getClientOriginalExtension();
                        $image->move($destinationPath, $docImage);
                        $images['image' . $i] = $docImage;
                    } else {
                        $images['image' . $i] = $product->{'image' . $i}; // Keep existing image if no new one is uploaded
                    }
                }
            } else {
                for ($i = 1; $i <= 5; $i++) {
                    $images['image' . $i] = $request->input('image_link' . $i);
                }
            }

            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->hsn_code = $request->hsn_code;
            $product->category = $request->category;
            $product->subcategory = $request->subcategory;
            $product->collection = $request->collection;
            $product->secoundary_collection_1 = $request->secoundary_collection_1;
            $product->secoundary_collection_2 = $request->secoundary_collection_2;
            $product->price = $request->price;
            $product->special_price = $request->special_price;
            $product->tag_price = $request->tag_price;
            $product->quantity_stock = $request->quantity_stock;
            $product->gold_weight = $request->gold_weight;
            $product->silver_weight = $request->silver_weight;
            $product->diamond_weight = $request->diamond_weight;
            $product->gemstone_name_1 = $request->gemstone_name_1;
            $product->gemstone_weight_1 = $request->gemstone_weight_1;
            $product->gemstone_name_2 = $request->gemstone_name_2;
            $product->gemstone_weight_2 = $request->gemstone_weight_2;
            $product->gemstone_name_3 = $request->gemstone_name_3;
            $product->gemstone_weight_3 = $request->gemstone_weight_3;
            $product->other_gemstones = $request->other_gemstones;
            $product->other_gemstone_weight = $request->other_gemstone_weight;
            $product->fossil_name = $request->fossil_name;
            $product->fossil_weight = $request->fossil_weight;
            $product->gross_weight = $request->gross_weight;
            $product->total_gemstone_weight = $request->total_gemstone_weight;
            $product->gemstone_type = $request->gemstone_type;
            $product->diamond_cut = $request->diamond_cut;
            $product->diamond_shape = $request->diamond_shape;
            $product->diamond_grade = $request->diamond_grade;
            $product->long_description = $request->long_description;
            $product->long_description_2 = $request->long_description_2;
            $product->long_description_3 = $request->long_description_3;
            $product->short_description = $request->short_description;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->keyword = $request->keyword;
            $product->image_type = $request->image_type;
            $product->image  = $images['image1'];
            $product->image2 = $images['image2'];
            $product->image3 = $images['image3'];
            $product->image4 = $images['image4'];
            $product->image5 = $images['image5'];
            $product->status = $request->has('status') ? 1 : 0;
            $product->save();

            if ($product) {
                return redirect()->route('admin.products');
            } else {
                return redirect()->back();
            }
        }
    }

    // public function deleteProduct($id){
    //     $product = Product::where('id',$id)->first();
    //     $product->active = 0;
    //     $user1 = User::where('id',Auth::user()->id)->first();
    //     $log = new Log();
    //     $log->user_id   = Auth::user()->name;
    //     $log->module    = 'Products';
    //     $log->log       = 'Product ('.$product->name .') Deleted by '.$user1->name;
    //     $log->save();
    //     $product->save();
    //     return 1;
    // }

    public function showImportForm()
    {
        return view('admin.products.import');
    }

    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = fopen($request->file('csv_file'), 'r');
        $header = fgetcsv($file);

        $inserted = 0;
        $updated = 0;


        while ($row = fgetcsv($file)) {
            $data = array_combine($header, $row);

            // Trim values to avoid issues
            $sku = trim($data['Product Code']);

            // Find or create collection


            $collectionName = trim($data['Primary Collection']);
            $SecondarycollectionName = trim($data['Secondary Collection 1']);
            $SecondarycollectionName2 = trim($data['Secondary Collection 2']);
            $collection = Collection::firstOrCreate(
                ['name' => $collectionName],
                [
                    // 'slug' => Str::slug($collectionName, '_'),
                    'slug' => Str::lower(trim($collectionName)),
                    'status' => 1,
                    'showindropdown' => 1,
                ]
            );

            $Secondarycollection1 = Collection::firstOrCreate(
                ['name' => $SecondarycollectionName],
                [
                    // 'slug' => Str::slug($SecondarycollectionName, '_'),
                    'slug' => Str::lower(trim($SecondarycollectionName)),
                    'status' => 1,
                ]

            );

            $Secondarycollection2 = Collection::firstOrCreate(
                ['name' => $SecondarycollectionName2],
                [
                    // 'slug' => Str::slug($SecondarycollectionName2, '_'),
                    'slug' => Str::lower(trim($SecondarycollectionName2)),
                    'status' => 1,
                ]

            );

            // Find or create category
            $categoryName = trim($data['Category']);
            $subcategoryName = trim($data['Sub Category']);
            $category = Category::firstOrCreate(
                ['name' => $categoryName],
                [
                    // 'slug' => Str::slug($categoryName, '_'),
                    'slug' => Str::lower(trim($categoryName)),
                    'status' => 1,
                    'showindropdown' => 1,
                ]
            );

            $subcategory = Category::firstOrCreate(
                ['name' => $subcategoryName],
                [
                    // 'slug' => Str::slug($subcategoryName, '_'),
                    'slug' => Str::lower(trim($subcategoryName)),
                    'status' => 1,
                ]
            );

            $collection = Collection::updateOrCreate(
                ['name' => $collectionName],
                [
                    'slug' => Str::lower(trim($collectionName)),
                    'status' => 1,
                ]
            );

            $Secondarycollection1 = Collection::updateOrCreate(
                ['name' => $SecondarycollectionName],
                [
                    'slug' => Str::lower(trim($SecondarycollectionName)),
                    'status' => 1,
                ]
            );

            $Secondarycollection2 = Collection::updateOrCreate(
                ['name' => $SecondarycollectionName2],
                [
                    'slug' => Str::lower(trim($SecondarycollectionName2)),
                    'status' => 1,
                ]
            );

            $category = Category::updateOrCreate(
                ['name' => $categoryName],
                [
                    'slug' => Str::lower(trim($categoryName)),
                    'status' => 1,
                ]
            );

            $subcategory = Category::updateOrCreate(
                ['name' => $subcategoryName],
                [
                    'slug' => Str::lower(trim($subcategoryName)),
                    'status' => 1,
                ]
            );

            // Update or create product by SKU
            $product = Product::updateOrCreate(
                ['sku' => $sku],
                [
                    'category_code' => trim($data['Category Code']),
                    'name' => trim($data['Product Code']),
                    'sku' => trim($data['Product Code']),
                    'color' => trim($data['Color']),
                    'size' => trim($data['Size']),
                    'hsn_code' => trim($data['HSN Code']),
                    'category' => $category->id,
                    'subcategory' => $subcategory->id,
                    'collection' => $collection->id,
                    'secoundary_collection_1' => $Secondarycollection1->id,
                    'secoundary_collection_2' => $Secondarycollection2->id,
                    'price' => trim($data['Base Price']),
                    // 'meta_title' => trim($data['Meta Title']),
                    // 'meta_description' => trim($data['Meta Description']),
                    'keyword' => trim($data['Keywords']),
                    'metal_type' => trim($data['Metal Type']),
                    'gold_weight' => trim($data['Gold Weight(Gms)']) ?? NULL,
                    'silver_weight' => trim($data['Silver Weight(Gms)']) ?? NULL,
                    'diamond_weight' => trim($data['Diamond Weight(Cts)']) ?? NULL,
                    'diamond_grade' => trim($data['Diamond Grade']),
                    'gemstone_name_1' => trim($data['Gemstone Name 1']),
                    'gemstone_weight_1' => trim($data['Gemstone Weight(Cts)']),
                    'gemstone_name_2' => trim($data['Gemstone Name 2']),
                    'gemstone_weight_2' => trim($data['Gemstone Weight(Cts2)']),
                    'gemstone_name_3' => trim($data['Gemstone Name 3']),
                    'gemstone_weight_3' => trim($data['Gemstone Weight(Cts3)']),
                    'other_gemstones' => trim($data['Other Gemstones']),
                    'other_gemstone_weight' => trim($data['Other Gemstone Weight(Cts)']),
                    'fossil_name' => trim($data['Fossil Name']),
                    'fossil_weight' => trim($data['Fossil Weight(Cts)']),
                    'gross_weight' => trim($data['Gross Weight(Gms)']),
                    'total_gemstone_weight' => trim($data['Total Gemstone Weight(Cts)']),
                    'gemstone_type' => trim($data['Gemstone Type']),
                    'diamond_cut' => trim($data['Diamond Cut']),
                    'diamond_shape' => trim($data['Diamond Shape']),
                    'image_type' => 2,
                    'image' => trim($data['Image Url']),
                    'image2' => trim($data['Image URL 2']),
                    'image3' => trim($data['Image URL 3']),
                    'image4' => trim($data['Image URL 4']),
                    // 'image5' => trim($data['Image URL 5']),
                    'status' => 1,
                    'showindropdown' => 1,
                    'active' => 1,
                    'tags' => trim($data['Tags']),
                ]
            );

            // Check if newly created or updated
            $product->wasRecentlyCreated ? $inserted++ : $updated++;
        }


        fclose($file);

        return back()->with([
            'success' => "Import successful! Inserted: $inserted, Updated: $updated"
        ]);
    }
}
