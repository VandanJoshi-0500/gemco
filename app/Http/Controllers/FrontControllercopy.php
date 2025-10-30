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
use Cache;
use URL;
use Nnjeim\World\World;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Validator;
use App\Mail\CatalogRequestMail;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        if (Cache::has('Categories')) {
            $categories = Cache::get('Categories');
        } else {
            $categories = Category::where('status', 1)->where('active', 1)->orderBy('order_id', 'asc')->get();
            Cache::put('Categories', $categories, now()->addDays(2));
        }
        if (Cache::has('Collections')) {
            $collections = Cache::get('Collections');
        } else {
            $collections = Collection::where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
            Cache::put('Collections', $collections, now()->addDays(2));
        }
        if (Cache::has('fine_jewelry')) {
            $fine_jewelry = Cache::get('fine_jewelry');
        } else {
            $fine_jewelry = Collection::where('parent', 3)->where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
            Cache::put('fine_jewelry', $fine_jewelry, now()->addDays(2));
        }
        if (Cache::has('victorian_jewelry')) {
            $victorian_jewelry = Cache::get('victorian_jewelry');
        } else {
            $victorian_jewelry = Collection::where('parent', 4)->where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
            Cache::put('victorian_jewelry', $victorian_jewelry, now()->addDays(2));
        }
        foreach ($categories as $key => $category) {
            $categoryData = Category::where('slug', $category->slug)->where('status', 1)->where('active', 1)->first();
            if (isset($categoryData)) {
                $products = Product::where('category', $categoryData->id)->where('status', 1)->where('active', 1)->whereNot('price', 0)->whereNot('image', '')->orderBy('id', 'desc')->get();

                if (!blank($products)) {
                    $collect = [];
                    foreach ($products as $pr) {
                        if (!in_array($pr->collection, $collect)) {
                            array_push($collect, $pr->collection);
                        }
                    }
                    $cols = [];
                    if (!empty($collect)) {
                        foreach ($collect as $key => $col) {

                            $coll = Collection::where('id', $col)->first();
                            if ($coll) {
                                $cols[$key]['image'] = $coll->image;
                                $cols[$key]['name'] = $coll->name;
                                $cols[$key]['image_type'] = $coll->image_type;
                                $cols[$key]['id'] = $coll->id;
                                $cols[$key]['slug'] = $coll->slug;
                                $cols[$key]['ring_image'] = $coll->ring_image;
                                $cols[$key]['necklace_image'] = $coll->necklace_image;
                                $cols[$key]['ear_jewelry_mage'] = $coll->ear_jewelry_mage;
                                $cols[$key]['bracelets_image'] = $coll->bracelets_image;
                            }
                        }
                    }
                } else {
                    $cols = [];
                }
                $category[$category->slug] = $cols;
            }
        }
        view()->share('setting', $setting);
        view()->share('categories', $categories);
        view()->share('fine_jewelry', $fine_jewelry);
        view()->share('victorian_jewelry', $victorian_jewelry);
    }
    public function index()
    {
        $banners = Banner::where('status', 1)->where('active', 1)->get();
        $collections_product = Collection::where('status', 1)
            ->where('active', 1)
            ->with('productDetail')
            ->get();
        return view('frontend.index', compact('banners', 'collections_product'));
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
    // public function login()
    // {
    //     return view('frontend.auth.login');
    // }
    // public function register(Request $request)
    // {
    //     $action =  World::countries();
    //     if ($action->success) {
    //         $countries = $action->data;
    //     } else {
    //         $countries = '';
    //     }
    //     $action_states = World::states([
    //         'filters' => [
    //             //'country_id' => 236,
    //         ],
    //     ]);
    //     if ($action_states->success) {
    //         $states = $action_states->data;
    //     } else {
    //         $states = '';
    //     }
    //     return view('frontend.auth.register', compact('countries', 'states'));
    // }
    // public function registerPost(Request $request)
    // {
    //     $request->validate([
    //         'first_name'        => 'required',
    //         'last_name'         => 'required',
    //         'email'             => 'required|unique:users',
    //         'streetaddress'     => 'required',
    //         'city'              => 'required',
    //         'state'             => 'required|not_in:0',
    //         'country'           => 'required|not_in:0',
    //         'zipcode'           => 'required',
    //         'password'          => 'required',
    //         'confirm_password'  => 'required|same:password'
    //     ]);
    //     $user = new User();
    //     $user->name = $request->first_name . ' ' . $request->last_name;
    //     $user->first_name = $request->first_name;
    //     $user->last_name = $request->last_name;
    //     $user->phone = $request->phone;
    //     $user->email = $request->email;
    //     $user->role = 3;
    //     $user->company  = $request->company;
    //     $user->website = $request->website;
    //     $user->zipcode = $request->zipcode;
    //     $user->streetaddress = $request->streetaddress;
    //     $user->city = $request->city;
    //     $user->state = $request->state;
    //     $user->country = $request->country;
    //     $user->password = Hash::make($request->password);
    //     $user->status = 1;
    //     $user->save();

    //     $userrole = new RoleUser();
    //     $userrole->user_id = $user->id;
    //     $userrole->role_id = 3;
    //     $userrole->save();
    //     Session::flash('register', 'Registered Successfully !');
    //     return redirect()->route('login');
    // }
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
    // public function productDetails($slug)
    // {
    //     try {
    //         $product = Product::where('sku', $slug)->where('status', 1)->where('active', 1)->first();
    //         if (!blank($product)) {
    //             $id = $product->id;
    //             return view('frontend.pages.product-detail', compact('id', 'product'));
    //         } else {
    //             return redirect()->route('error');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->route('error');
    //     }
    // }


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




    // public function all_productDetails(Request $request)
    // {
    //     try {
    //         $per_page = $request->has('per_page') ? $request->per_page : 12;
    //         $order_by = 'id';
    //         $order = 'desc';

    //         if ($request->has('sort_by')) {
    //             switch ($request->sort_by) {
    //                 case 'new':
    //                     $order_by = 'id';
    //                     $order = 'desc';
    //                     break;
    //                 case 'high':
    //                     $order_by = 'price';
    //                     $order = 'desc';
    //                     break;
    //                 default:
    //                     $order_by = 'price';
    //                     $order = 'asc';
    //                     break;
    //             }
    //         }

    //         $query = Product::where('status', 1)
    //             ->where('active', 1)
    //             ->orderBy($order_by, $order);

    //         if ($request->has('categories') && !blank($request->categories)) {
    //             $query->whereIn('category', $request->categories);
    //         }

    //         if ($request->has('collections') && !blank($request->collections)) {
    //             $query->whereIn('collection', $request->collections);
    //         }

    //         if ($request->has('min_price') || $request->has('max_price')) {
    //             if ($request->has('above_price') && $request->above_price == 1) {
    //                 $query->where('price', '>', 10000);
    //             } else {
    //                 $query->whereBetween('price', [$request->min_price, $request->max_price]);
    //             }
    //         }

    //         // Fetch products with pagination
    //         $products = $query->paginate($per_page);

    //         $count = $products->total();

    //         if ($request->ajax()) {
    //             return view('frontend.page.data',compact('products', 'count', 'pro_categories', 'pro_collections'));
    //         }

    //         $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
    //         $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('order_id', 'asc')->get();

    //         // return view('frontend.pages.all-product-listing', compact('products', 'count', 'pro_categories', 'pro_collections'));
    //         return view('frontend.page.collections', compact('products', 'count', 'pro_categories', 'pro_collections'));

    //     } catch (\Exception $e) {
    //         return redirect()->route('error');
    //     }
    // }

    // public function all_productDetails(Request $request)
    // {
    //     try {
    //         $per_page = $request->get('per_page', 12);
    //         $category_ids = $request->get('chk', []);
    //         $collection_ids = $request->get('coll', []);
    //         $sort = $request->get('sort', 'newest');

    //         $order_by = 'created_at';
    //         $order = $sort === 'oldest' ? 'asc' : 'desc';

    //         $query = Product::where('status', 1)->where('active', 1);

    //         if (!empty($category_ids)) {
    //             $query->whereIn('category', $category_ids);
    //         }

    //         if (!empty($collection_ids)) {
    //             $query->whereIn('collection', $collection_ids);
    //         }

    //         $products = $query->orderBy($order_by, $order)->paginate($per_page)->appends([
    //             'per_page' => $per_page,
    //             'chk' => $category_ids,
    //             'coll' => $collection_ids,
    //             'sort' => $sort,
    //         ]);

    //         $count = $products->total();
    //         $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
    //         $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

    //         if ($request->ajax()) {
    //             return view('frontend.page.collections', compact('products', 'count', 'pro_categories', 'pro_collections'))->render();
    //         }

    //         return view('frontend.page.collections', compact('products', 'count', 'pro_categories', 'pro_collections'));

    //     } catch (\Exception $e) {
    //         \Log::error('Product Filter Error: '.$e->getMessage());
    //         return redirect()->route('error');
    //     }
    // }


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
            $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
            $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

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
        return view('frontend.404');
    }

    // public function loginPost(Request $request)
    // {
    //     $input = $request->all();
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    //     $credentials = $request->only($fieldType, 'password');

    //     if (Auth::attempt(array($fieldType => $input['email'], 'password' => $input['password']))) {

    //         $role = Auth::user()->role;
    //         $user = Auth::user();
    //         $user->update([
    //             'last_login_at' => Carbon::now()->toDateTimeString(),
    //             'last_login_ip' => $request->getClientIp()
    //         ]);
    //         if ($user->status == 1) {
    //             Auth::login($user, true);
    //             $log = new Log();
    //             $log->user_id   = Auth::user()->name;
    //             $log->module    = 'Login';
    //             $log->log       = $user->name . ' Logged in Successfully';
    //             $log->save();
    //             if ($role == 3) {
    //                 return redirect()->route('home')
    //                     ->withSuccess('Signed in');
    //             } else {
    //                 Auth::logout();
    //                 Session::flash('message', 'Invalid email or password');
    //                 return redirect("login")->withInput()->withSuccess('Login details are not valid');
    //             }
    //         } else {
    //             Auth::logout();
    //             Session::flash('message', 'Your account has been deactivated. Please contact with administrator.');
    //             return redirect("login")->withInput()->withSuccess('Your account has been deactivated. Please contact with administrator.');
    //         }
    //     }
    //     Session::flash('message', 'Invalid email or password');
    //     return redirect("login")->withInput()->withSuccess('Login details are not valid');
    // }

    // public function filterProducts(Request $request)
    // {
    //     $id = $request->id;
    //     if ($request->page_type == 'category') {
    //         if ($request->has('sort_by')) {
    //             if ($request->sort_by == 'new') {
    //                 $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->orderBy('id', 'desc')->paginate(24);
    //             } elseif ($request->sort_by == 'high') {
    //                 $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->orderBy('price', 'desc')->paginate(24);
    //             } elseif ($request->sort_by == 'low') {
    //                 $products = Product::where('category', $id)->where('status', 1)->where('active', 1)->orderBy('price', 'asc')->paginate(24);
    //             }
    //         }
    //     } else {
    //         if ($request->has('sort_by')) {
    //             if ($request->sort_by == 'new') {
    //                 $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy('id', 'desc')->paginate(2);
    //             } elseif ($request->sort_by == 'high') {
    //                 $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy('price', 'desc')->paginate(2);
    //             } elseif ($request->sort_by == 'low') {
    //                 $products = Product::where('collection', $id)->where('status', 1)->where('active', 1)->orderBy('price', 'asc')->paginate(2);
    //             }
    //         }
    //     }
    //     if (!blank($products)) {
    //         $html = '';
    //         foreach ($products as $product) {
    //             $html .= '<div class="col-lg-3 col-md-4 col-sm-6 product_listing_inner col_product_listing">';
    //             $html .= '<a href="" class=" text-center">';
    //             $html .= '<div class="product_listing_box">';
    //             if (substr($product->image, 0, 7) == "http://" || substr($product->image, 0, 8) == "https://") {
    //                 $product_image = $product->image;
    //             } else {
    //                 $product_image = URL::asset('products/' . $product->image);
    //             }
    //             $html .= '<img src="' . $product_image . '" alt="" class="img-fluid">';
    //             $html .= '<p>' . $product->name . '</p>';
    //             $html .= '<h6>€ ' . $product->price . '</h6>';
    //             $html .= '<div class="artha-product-list-btn-outer">';
    //             $html .= '<a href="' . route('product.details', $product->sku) . '" class="artha-product-list-btn">Discover</a>';
    //             $html .= '</div>';
    //             $html .= '</div>';
    //             $html .= '</a>';
    //             $html .= '</div>';
    //         }
    //     }
    //     // print_r($products);
    //     return response()->json(['products' => $html, 'links' => $products->links()->render()], 200);
    // }

    public function MyAccount(Request $request)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = User::where('id', Auth::user()->id)->first();
            $page = 'my_account';
            return view('frontend.account.dashboard', compact('user_id', 'page', 'user'));
        } else {
            return redirect()->route('login');
        }
    }

    public function AddressBook(Request $request)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = User::where('id', Auth::user()->id)->first();
            $page = 'address_book';
            return view('frontend.account.address_book', compact('user_id', 'page', 'user'));
        } else {
            return redirect()->route('login');
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
            if ($action->success) {
                $countries = $action->data;
            } else {
                $countries = '';
            }
            $action_states = World::states([
                'filters' => [
                    'country_id' => $user->country,
                ],
            ]);
            if ($action_states->success) {
                $states = $action_states->data;
            } else {
                $states = '';
            }
            $page = 'account_information';
            return view('frontend.account.edit_account_information', compact('user_id', 'page', 'user', 'countries', 'states'));
        } else {
            return redirect()->route('login');
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
            return redirect()->route('login');
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
            return redirect()->route('login');
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

        $request->session()->flash('submitted', 'Form Submitted Successfully !');
        return redirect()->back();
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
            Mail::to('rinjal.patel21@gmail.com')->send(new CatalogRequestMail($requestData, $attachment));

            // Send confirmation email to the customer
            Mail::to($request->email)->send(new CatalogRequestMail($requestData, $attachment));
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Email sending failed: ' . $e->getMessage());
        }

        // Redirect with success message
        return redirect()->back()->with('success', 'Your catalog request has been submitted successfully!. We will contact you shortly');
    }


    // view by slug
    // public function viewBySlug($slug)
    // {
    //     // First check if it's a collection
    //     $collection = Collection::where('slug', $slug)->first();
    //     if ($collection) {
    //         $products = Product::where('collection', $collection->id)->get();
    //         return view('frontend.components.viewbyslug', compact('products'))->with('title', $collection->name);
    //     }
    //     // Then check if it's a category
    //     $category = Category::where('slug', $slug)->first();
    //     if ($category) {
    //         $products = Product::where('category', $category->id)->get();
    //         return view('frontend.components.viewbyslug', compact('products'))->with('title', $category->name);
    //     }
    //     // If neither found
    //     abort(404);
    // }




    // public function viewBySlug($slug)
    // {
    //     $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
    //     $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

    //     // First check if it's a collection
    //     $collection = Collection::where('slug', $slug)->first();
    //     if ($collection) {
    //         $products = Product::where('collection', $collection->id)->paginate(12);
    //         $count = $products->total();
    //         return view('frontend.components.viewbyslug', compact('products','count','pro_categories','pro_collections'))->with('title', $collection->name);
    //     }

    //     // Then check if it's a category
    //     $category = Category::where('slug', $slug)->first();
    //     if ($category) {
    //         $products = Product::where('category', $category->id)->paginate(12);
    //         $count = $products->total();
    //         return view('frontend.components.viewbyslug', compact('products','count','pro_categories','pro_collections'))->with('title', $category->name);
    //     }

    //     // If neither found
    //     abort(404);
    // }

    // public function viewBySlug(Request $request, $slug)
    // {
    //     $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
    //     $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

    //     $collection = Collection::where('slug', $slug)->first();
    //     if ($collection) {
    //         $products = Product::where('collection', $collection->id);

    //         if ($request->has('sort')) {
    //             $products = match($request->sort) {
    //                 'low' => $products->orderBy('price', 'asc'),
    //                 'high' => $products->orderBy('price', 'desc'),
    //                 default => $products->latest(),
    //             };
    //         }

    //         if ($request->has('coll')) {
    //             $products = $products->whereIn('collection', $request->coll);
    //         }

    //         $products = $products->paginate(12);

    //         if ($request->ajax()) {
    //             return view('frontend.components.slug', compact('products'))->render();
    //         }

    //         return view('frontend.components.viewbyslug', compact('products','pro_categories','pro_collections'))->with('title', $collection->name);
    //     }

    //     $category = Category::where('slug', $slug)->first();
    //     if ($category) {
    //         // Similar logic for category...
    //     }

    //     abort(404);
    // }




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
            // requests
            $per_page = $request->get('per_page', 12);
            $category_ids = $request->get('chk', []);
            $collection_ids = $request->get('coll', []);
            $sort = $request->get('sort', 'newest');

            // Check if the slug belongs to a Collection
            $collection = Collection::where('slug', $slug)->first();
            if ($collection) {
                $query = Product::where('collection', $collection->id);

                // Filter: Sort By
                $order_by = 'created_at';
                $order = $sort === 'oldest' ? 'asc' : 'desc';
                if ($sort === 'high') {
                    $order_by = 'price';
                    $order = 'desc';
                } elseif ($sort === 'low') {
                    $order_by = 'price';
                    $order = 'asc';
                }

                // Filter: By Collection (Checkbox)
                if ($request->has('coll')) {
                    $query->whereIn('collection', $request->input('coll'));
                }

                // Uncomment below if category filtering is needed
                /*
                if ($request->has('chk')) {
                    $query->whereIn('category', $request->input('chk'));
                }
                */

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
                $slug = $collection->slug;
                $count = $products->total();
                $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
                $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

                // Return partial view on AJAX
                if ($request->ajax()) {
                    return view('frontend.components.slug', compact('products'))->render();
                }
                // return view('frontend.components.viewbyslug', compact('products', 'pro_collections', 'pro_categories'))
                //     ->with('title', $collection->name);
                return view('frontend.components.viewbyslug', compact('products','count','pro_collections', 'pro_categories','slug'));

            }


            // Check if the slug belongs to a Category
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $query = Product::where('category', $category->id);

                // Filter: Sort By
                $order_by = 'created_at';
                $order = $sort === 'oldest' ? 'asc' : 'desc';
                if ($sort === 'high') {
                    $order_by = 'price';
                    $order = 'desc';
                } elseif ($sort === 'low') {
                    $order_by = 'price';
                    $order = 'asc';
                }

                // Filter: By Collection (Checkbox)
                if ($request->has('coll')) {
                    $query->whereIn('category', $request->input('coll'));
                }

                // Uncomment below if category filtering is needed
                /*
                if ($request->has('chk')) {
                    $query->whereIn('category', $request->input('chk'));
                }
                */

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

                $slug = $category->slug;
                $count = $products->total();
                $pro_collections = Collection::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();
                $pro_categories = Category::where('status', 1)->where('active', 1)->orderBy('name', 'asc')->get();

                // Return partial view on AJAX
                if ($request->ajax()) {
                    return view('frontend.components.slug', compact('products'))->render();
                }
                // return view('frontend.components.viewbyslug', compact('products', 'pro_collections', 'pro_categories'))
                //     ->with('title', $collection->name);
                return view('frontend.components.viewbyslug', compact('products','count','pro_collections', 'pro_categories','slug'));

            }

        } catch (\Exception $e) {
            \Log::error('Product Filter Error: '.$e->getMessage());
            return redirect()->route('error');
        }
    }



    public function search(Request $request)
    {
        try {
            $per_page = $request->get('per_page', 9);
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
        return view('frontend.auth.login');
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

    // register route
    public function register(Request $request)
    {
        return view('frontend.auth.register');
    }

    // register post route
    public function registerPost(Request $request)
    {
        // Validating input data
        $validated = $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required|numeric',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ]);

        // Create a new User instance and save it to the database
        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name; // Full name
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = 3;  // Assuming '3' is the user role id
        $user->password = Hash::make($request->password); // Hash the password
        $user->status = 1;  // Set user status (e.g., 1 = active)
        $user->save();

        // Assign a role to the user (assuming 'role_user' table exists for many-to-many relationship)
        $userrole = new RoleUser();
        $userrole->user_id = $user->id;
        $userrole->role_id = 3; // Assuming '3' is the user role id
        $userrole->save();

        // Flash a success message
        Session::flash('register', 'Registered Successfully!');

        // Redirect to the login page
        return redirect()->route('user.login');
    }

    public function forgetPassword()
    {
        return view('Frontend.auth.forgot-password');
    }

}
