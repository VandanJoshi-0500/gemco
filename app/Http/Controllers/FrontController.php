<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use App\Models\Page;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Subscriber;
use App\Models\ContactInquiry;
use App\Models\CatalogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Cache;
use URL;
use Nnjeim\World\World;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Validator;
use App\Mail\CatalogRequestMail;
use Illuminate\Support\Facades\Mail;
use Nnjeim\World\Models\Country;
use Nnjeim\World\Models\State;
use App\Mail\ContactFormUserMail;
use App\Mail\ContactFormAdminMail;
use Illuminate\Auth\Events\Registered;
use App\Mail\AdminNewUserNotification;
use App\Mail\CatalogRequestUserMail;
use App\Mail\CatalogRequestAdminMail;

class FrontController extends Controller
{
    // public function __construct()
    // {
    //     $setting = Setting::first();
    //     if (Cache::has('Categories')) {
    //         $categories = Cache::get('Categories');
    //     } else {
    //         $categories = Category::where('status', 1)->where('active', 1)->orderBy('order_id', 'asc')->get();
    //         Cache::put('Categories', $categories, now()->addDays(2));
    //     }
    //     if (Cache::has('Collections')) {
    //         $collections = Cache::get('Collections');
    //     } else {
    //         $collections = Collection::where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
    //         Cache::put('Collections', $collections, now()->addDays(2));
    //     }
    //     if (Cache::has('fine_jewelry')) {
    //         $fine_jewelry = Cache::get('fine_jewelry');
    //     } else {
    //         $fine_jewelry = Collection::where('parent', 3)->where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
    //         Cache::put('fine_jewelry', $fine_jewelry, now()->addDays(2));
    //     }
    //     if (Cache::has('victorian_jewelry')) {
    //         $victorian_jewelry = Cache::get('victorian_jewelry');
    //     } else {
    //         $victorian_jewelry = Collection::where('parent', 4)->where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
    //         Cache::put('victorian_jewelry', $victorian_jewelry, now()->addDays(2));
    //     }
    //     foreach ($categories as $key => $category) {
    //         $categoryData = Category::where('slug', $category->slug)->where('status', 1)->where('active', 1)->first();
    //         if (isset($categoryData)) {
    //             $products = Product::where('category', $categoryData->id)->where('status', 1)->where('active', 1)->whereNot('price', 0)->whereNot('image', '')->orderBy('id', 'desc')->get();

    //             if (!blank($products)) {
    //                 $collect = [];
    //                 foreach ($products as $pr) {
    //                     if (!in_array($pr->collection, $collect)) {
    //                         array_push($collect, $pr->collection);
    //                     }
    //                 }
    //                 $cols = [];
    //                 if (!empty($collect)) {
    //                     foreach ($collect as $key => $col) {

    //                         $coll = Collection::where('id', $col)->first();
    //                         if ($coll) {
    //                             $cols[$key]['image'] = $coll->image;
    //                             $cols[$key]['name'] = $coll->name;
    //                             $cols[$key]['image_type'] = $coll->image_type;
    //                             $cols[$key]['id'] = $coll->id;
    //                             $cols[$key]['slug'] = $coll->slug;
    //                             $cols[$key]['ring_image'] = $coll->ring_image;
    //                             $cols[$key]['necklace_image'] = $coll->necklace_image;
    //                             $cols[$key]['ear_jewelry_mage'] = $coll->ear_jewelry_mage;
    //                             $cols[$key]['bracelets_image'] = $coll->bracelets_image;
    //                         }
    //                     }
    //                 }
    //             } else {
    //                 $cols = [];
    //             }
    //             $category[$category->slug] = $cols;
    //         }
    //     }
    //     view()->share('setting', $setting);
    //     view()->share('categories', $categories);
    //     view()->share('fine_jewelry', $fine_jewelry);
    //     view()->share('victorian_jewelry', $victorian_jewelry);
    // }
    public function __construct()
    {
        $setting = Setting::first();

        // Categories
        if (Cache::has('Categories')) {
            $categories = Cache::get('Categories');
        } else {
            $categories = Category::where('status', 1)
                ->where('active', 1)
                ->orderBy('order_id', 'asc')
                ->get();
            Cache::put('Categories', $categories, now()->addDays(2));
        }

        // Collections
        if (Cache::has('Collections')) {
            $collections = Cache::get('Collections');
        } else {
            $collections = Collection::where('status', 1)
                ->where('active', 1)
                ->orderBy('order_no', 'asc')
                ->get();
            Cache::put('Collections', $collections, now()->addDays(2));
        }

        // Fine Jewelry
        if (Cache::has('fine_jewelry')) {
            $fine_jewelry = Cache::get('fine_jewelry');
        } else {
            $fine_jewelry = Collection::where('parent', 3)
                ->where('status', 1)
                ->where('active', 1)
                ->orderBy('order_no', 'asc')
                ->get();
            Cache::put('fine_jewelry', $fine_jewelry, now()->addDays(2));
        }

        // Victorian Jewelry
        if (Cache::has('victorian_jewelry')) {
            $victorian_jewelry = Cache::get('victorian_jewelry');
        } else {
            $victorian_jewelry = Collection::where('parent', 4)
                ->where('status', 1)
                ->where('active', 1)
                ->orderBy('order_no', 'asc')
                ->get();
            Cache::put('victorian_jewelry', $victorian_jewelry, now()->addDays(2));
        }

        // Dynamic Category-Collection Mapping
        $categoryCollections = [];

        foreach ($categories as $category) {
            $categoryData = Category::where('slug', $category->slug)
                ->where('status', 1)
                ->where('active', 1)
                ->first();

            if ($categoryData) {
                $products = Product::where('category', $categoryData->id)
                    ->where('status', 1)
                    ->where('active', 1)
                    ->whereNot('price', 0)
                    ->whereNot('image', '')
                    ->orderBy('id', 'desc')
                    ->get();

                $collect = [];

                if (!$products->isEmpty()) {
                    foreach ($products as $pr) {
                        if (!in_array($pr->collection, $collect)) {
                            $collect[] = $pr->collection;
                        }
                    }

                    $cols = [];

                    foreach ($collect as $key => $colId) {
                        $coll = Collection::find($colId);
                        if ($coll) {
                            $cols[$key] = [
                                'image' => $coll->image,
                                'name' => $coll->name,
                                'image_type' => $coll->image_type,
                                'id' => $coll->id,
                                'slug' => $coll->slug,
                                'ring_image' => $coll->ring_image,
                                'necklace_image' => $coll->necklace_image,
                                'ear_jewelry_image' => $coll->ear_jewelry_mage,
                                'bracelets_image' => $coll->bracelets_image,
                            ];
                        }
                    }

                    $categoryCollections[$category->slug] = $cols;
                } else {
                    $categoryCollections[$category->slug] = [];
                }
            }
        }

        // Share variables with views
        view()->share('setting', $setting);
        view()->share('categories', $categories);
        view()->share('fine_jewelry', $fine_jewelry);
        view()->share('victorian_jewelry', $victorian_jewelry);
        view()->share('categoryCollections', $categoryCollections);
    }
    public function index()
    {

        // $banners = Banner::where('status', 1)->where('active', 1)->get();
        $banner1 = Banner::where('active', 1)->where('order_no', 1)->first();
        $banner2 = Banner::where('active', 1)->where('order_no', 2)->first();
        $banner3 = Banner::where('active', 1)->where('order_no', 3)->first();
        $banner4 = Banner::where('active', 1)->where('order_no', 4)->first();
        $products = Product::latest()->take(4)->get(); // fetch latest 4 products
        $collections_product = Collection::where('status', 1)
            ->where('active', 1)
            ->with('productDetail')
            ->get();

        return view('frontend.page.index', compact('products','banner1', 'banner2', 'banner3', 'banner4', 'collections_product'));
    }
    public function indexnewdemo()
    {
        $banners = Banner::where('status', 1)->where('active', 1)->get();
        $collections_product = Collection::where('status', 1)
            ->where('active', 1)
            ->with('productDetail')
            ->get();
        return view('frontend.index-demo', compact('banners', 'collections_product'));
    }
    

    public function show_page(Request $request, $slug)
    {
        try {
            if ($request->has('id')) {
                $id = $request->id;
                if ($request->has('per_page')) {
                    $per_page = $request->per_page;
                } else {
                    $per_page = 24;
                }
                if ($request->page_type == 'category') {
                    if ($request->has('sort_by')) {
                        if ($request->sort_by == 'new') {
                            $order_by = 'id';
                            $order = 'desc';
                        } elseif ($request->sort_by == 'high') {
                            $order_by = 'price';
                            $order = 'desc';
                        } else {
                            $order_by = 'price';
                            $order = 'asc';
                        }
                        if ($request->has('checkbox') || !blank($request->checkbox)) {
                            if ($request->has('min_price') || $request->has('max_price')) {
                                if ($request->has('above_price') && $request->above_price == 1) {
                                    $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereIn('collection', $request->checkbox)->where('price', '>', 10000)->whereNot('image', '')->paginate($per_page);
                                } else {
                                    $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereIn('collection', $request->checkbox)->whereNot('image', '')->whereBetween('price', [$request->min_price, $request->max_price])->paginate($per_page);
                                }
                            } else {
                                $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereIn('collection', $request->checkbox)->paginate($per_page);
                            }
                        } else {
                            if ($request->has('min_price') || $request->has('max_price')) {
                                if ($request->has('above_price') && $request->above_price == 1) {
                                    $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->whereNot('image', '')->orderBy($order_by, $order)->where('price', '>', 10000)->paginate($per_page);
                                } else {
                                    $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->whereNot('image', '')->orderBy($order_by, $order)->whereBetween('price', [$request->min_price, $request->max_price])->paginate($per_page);
                                }
                            } else {
                                $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->whereNot('image', '')->orderBy($order_by, $order)->paginate($per_page);
                            }
                        }
                        $count = count($products);
                    }
                } else {
                    if ($request->has('sort_by')) {
                        if ($request->sort_by == 'new') {
                            $order_by = 'id';
                            $order = 'desc';
                        } elseif ($request->sort_by == 'high') {
                            $order_by = 'price';
                            $order = 'desc';
                        } else {
                            $order_by = 'price';
                            $order = 'asc';
                        }
                        if ($request->has('checkbox') && !blank($request->checkbox)) {
                            if ($request->has('min_price') || $request->has('max_price')) {
                                if ($request->has('above_price') && $request->above_price == 1) {
                                    $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->where('price', '>', 10000)->whereNot('image', '')->whereIn('category', $request->checkbox)->paginate($per_page);
                                } else {
                                    $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereNot('image', '')->whereBetween('price', [$request->min_price, $request->max_price])->whereIn('category', $request->checkbox)->paginate($per_page);
                                }
                            } else {
                                $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereNot('image', '')->whereNot('price', 0)->whereIn('category', $request->checkbox)->paginate($per_page);
                            }
                        } else {

                            if ($request->has('min_price') || $request->has('max_price')) {
                                if ($request->has('above_price') && $request->above_price == 1) {
                                    $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereNot('image', '')->where('price', '>', 10000)->paginate($per_page);
                                } else {
                                    $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy($order_by, $order)->whereNot('image', '')->whereBetween('price', [$request->min_price, $request->max_price])->paginate($per_page);
                                }
                            } else {
                                $products = Product::where('collection', $id)->where('status', 1)->whereNot('price', 0)->where('active', 1)->orderBy($order_by, $order)->paginate($per_page);
                            }
                        }
                        $count = count($products);
                    }
                }
                if (!blank($products)) {
                    $html = '';
                    foreach ($products as $product) {
                        $html .= '<div class="col-lg-3 col-md-4 col-sm-6 product_listing_inner col_product_listing">';
                        $html .= '<a href="" class=" text-center">';
                        $html .= '<div class="product_listing_box">';
                        if (substr($product->image, 0, 7) == "http://" || substr($product->image, 0, 8) == "https://") {
                            $product_image = $product->image;
                        } else {
                            $product_image = URL::asset('products/' . $product->image);
                        }
                        $html .= '<img src="' . $product_image . '" alt="" class="img-fluid">';
                        $html .= '<p>' . $product->name . '</p>';
                        $html .= '<h6>€ ' . $product->price . '</h6>';
                        $html .= '<div class="artha-product-list-btn-outer">';
                        $html .= '<a href="' . route('product.details', $product->sku) . '" class="artha-product-list-btn">Discover</a>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</a>';
                        $html .= '</div>';
                    }
                } else {
                    $html = '';
                }

                return response()->json(['products' => $html, 'links' => $products->links()->render(), 'count' => $count, 'checkbox' => $request->checkbox], 200);
            } else {

                if ($slug == 'contactus') {
                    return view('frontend.pages.contactus');
                }
                else if ($slug == 'aboutus') {
                    return view('frontend.pages.aboutus');
                }
                else if ($slug == 'request-catalog') {
                    return view('frontend.pages.request-catalog');
                } else {
                    $page = Page::where('slug', $slug)->where('status', 1)->where('active', 1)->first();
                    if (!blank($page)) {
                        $id = $page->id;
                        return view('frontend.pages.page', compact('id', 'page'));
                    } else {
                        $category = Category::where('slug', $slug)->where('status', 1)->where('active', 1)->first();

                        if (!blank($category)) {

                            // if (Cache::has('productsByCategory-'.$category->id)){
                            //     $products = Cache::get('productsByCategory-'.$category->id);
                            // } else {
                            $products = Product::where('category', $category->id)->where('status', 1)->where('active', 1)->whereNot('price', 0)->whereNot('image', '')->orderBy('id', 'desc')->paginate(24);
                            // Cache::put('productsByCategory-'.$category->id, $pr, now()->addDays(2));
                            // $products = Cache::get('productsByCategory-'.$category->id);
                            // }

                            if (!blank($products)) {
                                $collec = [];
                                foreach ($products as $pr) {
                                    if (!in_array($pr->collection, $collec)) {
                                        array_push($collec, $pr->collection);
                                    }
                                }
                                $cols = '';
                                if (!empty($collec)) {
                                    foreach ($collec as $key => $col) {
                                        $coll = Collection::where('id', $col)->first();
                                        if (!blank($coll)) {
                                            $cols .= '<div class="collection-checkbox"><input type="checkbox" id="chk-' . $coll->id . '" name="chk" class="chk" value="' . $coll->id . '"><label for="chk-' . $coll->id . '">' . $coll->name . '</label></div>';
                                        }
                                    }
                                }
                            } else {
                                $cols = '';
                            }

                            $count = count($products);
                            return view('frontend.pages.product-listing', compact('category', 'products', 'collec', 'cols', 'count'));
                        } else {
                            $collection = Collection::where('slug', $slug)->where('status', 1)->where('active', 1)->first();
                            if (!blank($collection)) {
                                $products = Product::where('collection', $collection->id)->where('status', 1)->where('active', 1)->whereNot('price', 0)->whereNot('image', '')->orderBy('id', 'desc')->paginate(24);
                                $collec = [];
                                foreach ($products as $pr) {
                                    if (!in_array($pr->category, $collec)) {
                                        array_push($collec, $pr->category);
                                    }
                                }
                                $cols = '';
                                foreach ($collec as $col) {
                                    $coll = Category::where('id', $col)->first();
                                    if (!blank($coll)) {
                                        $cols .= '<div class="cat-checkbox"><input type="checkbox" name="chk" class="chk" id="chk-' . $coll->id . '" value="' . $coll->id . '"><label for="chk-' . $coll->id . '">' . $coll->name . '</label></div>';
                                    }
                                }
                                $count = count($products);
                                return view('frontend.pages.product-listing', compact('collection', 'products', 'collec', 'cols', 'count'));
                            }
                        }
                        // return redirect()->route('error');
                    }
                }
            }
        } catch (\Exception $e) {
            // return redirect()->route('error');
        }
    }


    public function productDetails($slug)
    {
        try {
            // $product = Product::with('categories') // Eager load the category
            //     ->where('sku', $slug)
            //     ->where('status', 1)
            //     ->where('active', 1)
            //     ->first();

            $product = Product::with(['categories', 'collections'])
                    ->where('sku', $slug)
                    ->where('status', 1)
                    ->where('active', 1)
                    ->first();

            if (!blank($product)) {
                $id = $product->id;
                return view('frontend.pages.product-detail', compact('id', 'product'));
            } else {
                return redirect()->route('error');
            }
        } catch (\Exception $e) {
            return redirect()->route('error');
        }
    }




    public function all_productDetails(Request $request)
    {
        try {
            $per_page = $request->get('per_page', 12);
            $category_ids = $request->get('chk', []);
            $collection_ids = $request->get('coll', []);
            $sort = $request->get('sort', 'newest');

            // $order_by = 'created_at';
            $order_by = 'created_at';
            $order = $sort === 'oldest' ? 'asc' : 'desc';
            if ($sort === 'high') {
                $order_by = 'price';
                $order = 'desc';
            } elseif ($sort === 'low') {
                $order_by = 'price';
                $order = 'asc';
            }
            // $order = $sort === 'oldest' ? 'asc' : 'desc';

            $query = Product::where('status', 1)->where('active', 1);

            if (!empty($category_ids)) {
                $query->whereIn('category', $category_ids);
            }

            if (!empty($collection_ids)) {
                $query->whereIn('collection', $collection_ids);
            }

            $products = $query->orderBy($order_by, $order)->paginate($per_page)->appends([
                'per_page' => $per_page,
                'chk' => $category_ids,
                'coll' => $collection_ids,
                'sort' => $sort,
            ]);

            $count = $products->total();
            $pro_collections = Collection::where('status', 1)->where('showindropdown', 1)->where('active', 1)->orderBy('name', 'asc')->get();
            $pro_categories = Category::where('status', 1)->where('showindropdown', 1)->where('active', 1)->orderBy('name', 'asc')->get();

            if ($request->ajax()) {
                return view('frontend.components.product-list', compact('products'))->render();
            }

            return view('frontend.page.collections', compact('products', 'count', 'pro_categories', 'pro_collections'));

        } catch (\Exception $e) {
            \Log::error('Product Filter Error: '.$e->getMessage());
            return redirect()->route('error');
        }
    }



    public function error_404()
    {
        return view('errors.404');
    }

    
    public function MyAccount(Request $request)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = User::where('id', Auth::user()->id)->first();
            // Fetch country using the stored country ID
            $country = $user->country ? Country::find($user->country) : null;
            $state = $user->state ? State::find($user->state) : null;
            $page = 'my_account';      
            return view('frontend.account.dashboard', compact('user_id', 'page', 'user','country', 'state'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function AddressBook(Request $request)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = User::where('id', Auth::user()->id)->first();
            $page = 'address_book';
            $country = $user->country ? Country::find($user->country) : null;
            $state = $user->state ? State::find($user->state) : null;
            return view('frontend.account.address_book', compact('user_id', 'page', 'user','country','state'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function AccountInformation(Request $request)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = User::where('id', Auth::user()->id)->first();
            $page = 'account_information';
            return view('frontend.account.account_information', compact('user_id', 'page', 'user'));
        } else {
            return redirect()->route('login');
        }
    }

    public function EditAccountInformation(Request $request, $id = NULL)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = User::where('id', Auth::user()->id)->first();
            $action =  World::countries();
            // if ($action->success) {
            //     $countries = $action->data;
            // } else {
            //     $countries = '';
            // }
            if ($action->success) {
                $countries = $action->data;
            } else {
                $countries = [];
            }
            $action_states = World::states([
                'filters' => [
                    'country_id' => $user->country,
                ],
            ]);
            // if ($action_states->success) {
            //     $states = $action_states->data;
            // } else {
            //     $states = '';
            // }
            if ($action_states->success) {
                $states = $action_states->data;
            } else {
                $states = [];
            }
            $page = 'account_information';
            return view('frontend.account.edit_account_information', compact('user_id', 'page', 'user', 'countries', 'states'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function updateUserInfo(Request $request)
    {
        if (Auth::user()) {
            if ($request->has('change_password')) {
                $request->validate([
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'email'      => 'required',
                    'old_password' => ['required', new MatchOldPassword],
                    'new_password' => ['required'],
                    'confirm_password' => ['same:new_password'],
                ]);
            } else {
                $request->validate([
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'email'      => 'required',
                ]);
            }
            $user = User::where('id', $request->id)->first();
            $user->first_name   = $request->first_name;
            $user->last_name    = $request->last_name;
            $user->email        = $request->email;
            if ($request->has('change_password') && $request->new_password != '' && $request->confirm_password != '' && $request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
            }
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->route('user.login');
        }
    }

    public function updateAddressBook(Request $request)
    {
        if (Auth::user()) {
            $request->validate([
                'first_name'    => 'required',
                'last_name'     => 'required',
                'website'       => 'required',
                'company'       => 'required',
                'streetaddress' => 'required',
                'city'          => 'required',
                'state'         => 'required|not_in:0',
                'country'       => 'required|not_in:0',
                'zipcode'       => 'required',
                'phone'         => 'required',
            ]);
            $user = User::where('id', $request->id)->first();
            $user->name                 = $request->first_name . ' ' . $request->last_name;
            $user->first_name           = $request->first_name;
            $user->last_name            = $request->last_name;
            $user->company              = $request->company;
            $user->website              = $request->website;
            $user->zipcode              = $request->zipcode;
            $user->streetaddress        = $request->streetaddress;
            $user->city                 = $request->city;
            $user->state                = $request->state;
            $user->country              = $request->country;
            $user->fax                  = $request->fax;
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->route('user.login');
        }
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);
        $subscriber = new Subscriber();
        $subscriber->email  = $request->email;
        $subscriber->status = 1;
        $subscriber->active = 1;
        $subscriber->save();

        $request->session()->flash('subscribe', 'Subscribed to Newsletter Successfully !');
        return redirect()->back();
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }


    public function contact()
    {
        return view('frontend.page.contact');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'email'             => 'required|email',
            'message'           => 'required',
            //'verification_code' => 'required|captcha'
        ]);
        $inquiry = new ContactInquiry();
        $inquiry->name      = $request->name;
        $inquiry->email     = $request->email;
        $inquiry->message   = $request->message;
        $inquiry->status    = 1;
        $inquiry->active    = 1;
        $inquiry->save();

        // Send email to user
        Mail::to($inquiry->email)->queue(new ContactFormUserMail($inquiry));

        // Send email to admin
        Mail::to(env('ADMIN_MAIL_RECEIVE_ID'))->queue(new ContactFormAdminMail($inquiry));

        $request->session()->flash('submitted', 'Form Submitted Successfully !');
        return redirect()->back();
    }


     public function catalog()
    {
        $collections = Collection::where('status', 1)->where('showindropdown', 1)->where('active', 1)->orderBy('name', 'asc')->get();
        $categories = Category::where('status', 1)->where('showindropdown', 1)->where('active', 1)->orderBy('name', 'asc')->get();


        return view('frontend.page.catalog', compact('categories', 'collections'));
    }


    public function submitCatalogRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'category' => 'nullable|array', // Allow null or an array
            'category.*' => 'string', // Each item in the array must be a string
            'collection' => 'nullable|array', // Allow null or an array
            'collection.*' => 'string', // Each item in the array must be a string
            'attachment' => 'nullable|file|mimes:jpg,png,pdf,xls,xlsx,doc,docx|max:2048',
            'comments' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        // Create a new catalog request
        CatalogRequest::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'company' => $request->input('company'),
            'category' => implode(',', $request->input('category', [])), // Store as comma-separated
            'collection' => implode(',', $request->input('collection', [])), // Store as comma-separated
            'attachment' => $attachmentPath,
            'comments' => $request->input('comments'),
        ]);

        // Save the attachment if present
        $attachment = $request->hasFile('attachment') ? $request->file('attachment') : null;

        // Prepare the data to send
        $requestData = $request->only(['name', 'email', 'phone', 'country', 'company', 'category', 'collection', 'comments']);

        try {
            // Send email to admin
            // Mail::to('jinalk.rss@gmail.com')->queue(new CatalogRequestAdminMail($requestData, $attachment));
            Mail::to(env('ADMIN_MAIL_RECEIVE_ID'))->queue(new CatalogRequestAdminMail($requestData, $attachment));

            // Send confirmation email to the customer
            Mail::to($request->email)->queue(new CatalogRequestUserMail($requestData));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
        }

        // Redirect with success message
        return redirect()->back()->with('success', 'Your catalog request has been submitted successfully!. We will contact you shortly');
    }


    public function viewBySlug(Request $request, $slug)
    {
        // Common data for sidebar filters
        $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
        $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

        // Check if the slug belongs to a Collection
        $collection = Collection::where('slug', $slug)->first();
        if ($collection) {
            $productsQuery = Product::where('collection', $collection->id);
            // Filter: Sort By
            if ($request->has('sort')) {
                $sort = $request->input('sort');
                if ($sort === 'low') {
                    $productsQuery->orderBy('price', 'asc');
                } elseif ($sort === 'high') {
                    $productsQuery->orderBy('price', 'desc');
                } else {
                    $productsQuery->latest(); // 'newest' or default
                }
            }
            // Filter: By Collection (Checkbox)
            if ($request->has('coll')) {
                $productsQuery->whereIn('collection', $request->input('coll'));
            }

            // Uncomment below if category filtering is needed
            /*
            if ($request->has('chk')) {
                $productsQuery->whereIn('category', $request->input('chk'));
            }
            */
            $products = $productsQuery->paginate(12)->withQueryString();
            // Return partial view on AJAX
            if ($request->ajax()) {
                return view('frontend.components.slug', compact('products'))->render();
            }
            return view('frontend.components.viewbyslug', compact('products', 'pro_collections', 'pro_categories'))
                ->with('title', $collection->name);
        }

        // Check if the slug belongs to a Category
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $productsQuery = Product::where('category', $category->id);
            // Filter: Sort By
            if ($request->has('sort')) {
                $sort = $request->input('sort');
                if ($sort === 'low') {
                    $productsQuery->orderBy('price', 'asc');
                } elseif ($sort === 'high') {
                    $productsQuery->orderBy('price', 'desc');
                } else {
                    $productsQuery->latest();
                }
            }

            // Filter: By Collection
            if ($request->has('coll')) {
                $productsQuery->whereIn('collection', $request->input('coll'));
            }

            // Uncomment if filtering by categories inside a category makes sense
            /*
            if ($request->has('chk')) {
                $productsQuery->whereIn('category', $request->input('chk'));
            }
            */

            $products = $productsQuery->paginate(12)->withQueryString();

            if ($request->ajax()) {
                return view('frontend.components.slug', compact('products'))->render();
            }
            return view('frontend.components.viewbyslug', compact('products', 'pro_collections', 'pro_categories'))
                ->with('title', $category->name);
        }
        // Not found
        abort(404);
    }


    public function viewBySlugs(Request $request, $slug)
    {
        try {
            // Handle Request Inputs
            $per_page = $request->get('per_page', 12);
            $category_ids = $request->get('chk', []);
            $collection_ids = $request->get('coll', []);
            $sort = $request->get('sort', 'newest');

            // Setup sorting logic
            $order_by = 'created_at';
            $order = 'desc';

            if ($sort === 'high') {
                $order_by = 'price';
                $order = 'desc';
            } elseif ($sort === 'low') {
                $order_by = 'price';
                $order = 'asc';
            }

            // Check if slug is a collection

            $collection = Collection::where('slug', $slug)->first();
            if ($collection) {
                $type = 'collection';
                $image = $collection->image ? 'collection/' . $collection->image : null;
                $query = Product::where('collection', $collection->id);

                if (!empty($category_ids)) {
                    $query->whereIn('category', $category_ids);
                }
                if (!empty($collection_ids)) {
                    $query->whereIn('collection', $collection_ids);
                }

                $products = $query->orderBy($order_by, $order)
                    ->paginate($per_page)
                    ->appends([
                        'per_page' => $per_page,
                        'chk' => $category_ids,
                        'coll' => $collection_ids,
                        'sort' => $sort,
                    ]);

                $slug = $collection->slug;
                $count = $products->total();
                $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name')->get();
                $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name')->get();

                // AJAX request: return only the product list
                if ($request->ajax()) {
                    return view('frontend.components.slug', compact('products', 'type'))->render();
                }

                // Full page render
                return view('frontend.components.viewbyslug', compact(
                    'products', 'count', 'pro_collections', 'pro_categories', 'slug', 'type', 'image'
                ));
            }

            // Check if slug is a category
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $type = 'category';
                $image = $category->image ? 'categories/' . $category->image : null;
                $query = Product::where('category', $category->id);

                if (!empty($category_ids)) {
                    $query->whereIn('category', $category_ids);
                }
                if (!empty($collection_ids)) {
                    $query->whereIn('collection', $collection_ids);
                }

                $products = $query->orderBy($order_by, $order)
                    ->paginate($per_page)
                    ->appends([
                        'per_page' => $per_page,
                        'chk' => $category_ids,
                        'coll' => $collection_ids,
                        'sort' => $sort,
                    ]);

                $slug = $category->slug;
                $count = $products->total();
                $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name')->get();
                $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name')->get();

                if ($request->ajax()) {
                    return view('frontend.components.slug', compact('products', 'type'))->render();
                }

                return view('frontend.components.viewbyslug', compact(
                    'products', 'count', 'pro_collections', 'pro_categories', 'slug', 'type', 'image'
                ));
            }

            // If neither category nor collection found
            return abort(404);

        } catch (\Exception $e) {
            \Log::error('Product Filter Error: ' . $e->getMessage());
            return redirect()->route('error');
        }
    }



    public function search(Request $request)
    {
        try {
            $per_page = $request->get('per_page', 12);
            $category_ids = $request->get('chk', []);
            $collection_ids = $request->get('coll', []);
            $sort = $request->get('sort', 'newest');
            $query = $request->input('query');

            $order_by = 'created_at';
            $order = $sort === 'oldest' ? 'asc' : 'desc';
            if ($sort === 'high') {
                $order_by = 'price';
                $order = 'desc';
            } elseif ($sort === 'low') {
                $order_by = 'price';
                $order = 'asc';
            }

            $products = Product::where('name', 'like', "%{$query}%")
                ->orWhere('long_description', 'like', "%{$query}%")
                ->orWhereHas('collections', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%");
                })
                ->orWhereHas('categories', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%");
                })
                ->orderBy($order_by, $order)
                ->paginate($per_page)
                ->appends([
                    'per_page' => $per_page,
                    'chk' => $category_ids,
                    'coll' => $collection_ids,
                    'sort' => $sort,
                    'query' => $query,
                ]);

            $count = $products->total();

            if ($request->ajax()) {
                return view('frontend.components.search-list', compact('products'))->render();
            }

            return view('frontend.pages.search-listing', compact('products', 'query', 'count'));

        } catch (\Exception $e){
            \Log::error('Product Filter Error: '.$e->getMessage());
                    return redirect()->route('error');
        }
    }



    public function login()
    {
        return view('frontend.auth.login2');
    }

    public function loginPost(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Dynamically determine if we are using email or phone
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Attempt login with the field type
        $credentials = $request->only($fieldType, 'password');

        if (Auth::attempt([$fieldType => $input['email'], 'password' => $input['password']])) {

            $user = Auth::user();
            $role = $user->role;

            // Update last login details
            $user->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp()
            ]);

            if ($user->status == 1) {
                // Log user login event
                $log = new Log();
                $log->user_id = Auth::user()->id; // User ID should be logged
                $log->module = 'Login';
                $log->log = $user->name . ' Logged in Successfully';
                $log->save();

                // Redirect based on role
                if ($role == 3) {
                    return redirect()->route('home')->with('loginSuccess', 'Successfully logged in!');
                } else {
                    // Logout user if not the correct role
                    Auth::logout();
                    return redirect()->route('user.login')
                        ->withErrors(['message' => 'Login details are not valid']);
                }
            } else {
                // Deactivated account
                Auth::logout();
                return redirect()->route('user.login')
                    ->withErrors(['message' => 'Your account has been deactivated. Please contact the administrator.']);
            }
        }

        // Invalid credentials
        return redirect()->route('user.login')
            ->withErrors(['message' => 'Invalid email or password'])
            ->withInput();
    }

   
    public function register(Request $request)
    {
        $action =  World::countries();
        if ($action->success) {
            $countries = $action->data;
        } else {
            $countries = '';
        }
        $action_states = World::states([
            'filters' => [
                //'country_id' => 236,
            ],
        ]);
        if ($action_states->success) {
            $states = $action_states->data;
        } else {
            $states = '';
        }
        return view('frontend.auth.register', compact('countries', 'states'));
    }

    // register post route
    public function registerPost(Request $request)
    {
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|unique:users',
            'streetaddress'     => 'required',
            'city'              => 'required',
            'state'             => 'required|not_in:0',
            'country'           => 'required|not_in:0',
            'zipcode'           => 'required',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ]);
        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = 3;
        $user->company  = $request->company;
        $user->website = $request->website;
        $user->zipcode = $request->zipcode;
        $user->streetaddress = $request->streetaddress;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();

        $userrole = new RoleUser();
        $userrole->user_id = $user->id;
        $userrole->role_id = 3;
        $userrole->save();

        event(new Registered($user));
        Auth::login($user);
        Session::flash('register', 'Registered Successfully !');

        Mail::to(env('ADMIN_MAIL_RECEIVE_ID'))->queue(new AdminNewUserNotification($user));

        return redirect()->route('user.dashboard')->with('success', 'Thank you for connection with us!');

        // return redirect()->route('user.login');
    }
    

    public function forgetPassword()
    {
        return view('frontend.auth.forgot-password2');
    }

    function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
        ]);

        $token = Str::random(64);
        $user = User::where("email", $request->email)->first();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.forget-password", ['token' => $token, 'user' => $user], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("forget.password"))->with("success", "We have send you an email to reset password.");


    }

    function resetPassword($token)
    {

        return view('frontend.auth.new-password', compact('token'));

    }


    function resetPasswordPost(Request $request)
    {

        $request->validate([
            "email" => 'required|email|exists:users',
            "password" => 'required|string|min:6|confirmed',
            "password_confirmation" => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('reset.password'))->with("error", "invalid ");
        }

        User::where("email", $request->email)
            ->update(["password" => Hash::make($request->password)]);

        DB::table('password_reset_tokens')
            ->where(["email" => $request->email])->delete();

        return redirect()->to(route("user.login"))->with("success", "Password reset Successfully");

    }


    public function otp()
    {
        return view('frontend.auth.otp2');
    }
    public function createpassword()
    {
        return view('frontend.auth.create-new-password');
    }


    // DASHBOARD 

    public function userDashboard()
    {
        return view('frontend.dashboard.dashboard');
    }
    // public function userAccount()
    // {
    //     return view('frontend.dashboard.account-info');
    // }
    // public function userAddress()
    // {
    //     return view('frontend.dashboard.address-book');
    // }
    // public function userWishlist()
    // {
    //     return view('frontend.dashboard.wishlist');
    // }
    public function userWishlisthistory()
    {
        return view('frontend.dashboard.wishlist-history');
    }

}
