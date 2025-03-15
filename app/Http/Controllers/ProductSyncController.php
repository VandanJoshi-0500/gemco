<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Rules\XmlValidation;
use Illuminate\Support\Facades\DB;
class ProductSyncController extends Controller
{
    public function syncProducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'xml_data' => ['required', new XmlValidation],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Parse XML
        try {
            $xmlData = simplexml_load_string($request->input('xml_data'));
            if (!$xmlData) {
                throw new \Exception('Invalid XML format');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid XML format'], 422);
        }

        // Helper function to normalize blank values to null
        $normalize = function ($value) {
            return trim((string) $value) === '' ? null : trim((string) $value);
        };

        foreach ($xmlData->Inventory as $inventory) {
            $sku = $normalize($inventory->No);

            $product = Product::firstOrNew(['sku' => $sku]);
            $product->name = $normalize($sku);
            $product->long_description = $normalize($inventory->Description);
            $product->long_description2 = $normalize($inventory->Description2);
            $product->long_description3 = $normalize($inventory->MainStone);

            // Get Collection ID
            $collectionName = $normalize($inventory->Collection);
            if ($collectionName) {
                $collectionId = DB::table('collections')->where('name', $collectionName)->value('id');
                if (!$collectionId) {
                    $collectionId = DB::table('collections')->insertGetId(['name' => $collectionName, 'created_at' => now(), 'updated_at' => now()]);
                }
                $product->collection = $collectionId;
            } else {
                $product->collection = null;
            }

            // Get Category ID
            $categoryName = $normalize($inventory->ItemCategory);
            if ($categoryName) {
                $categoryId = DB::table('categories')->where('name', $categoryName)->value('id');
                if (!$categoryId) {
                    $categoryId = DB::table('categories')->insertGetId(['name' => $categoryName, 'created_at' => now(), 'updated_at' => now()]);
                }
                $product->category = $categoryId;
            } else {
                $product->category = null;
            }
            
            $product->mainstone = $normalize($inventory->MainStone);
            $product->primary_collection = $normalize($inventory->Primarycollection);

            $product->show_on_web = $normalize($inventory->Showonweb);

            $product->quantity_stock = intval($normalize($inventory->InventoryOnHand));
            // Set Status and Active based on InventoryOnHand
            if ($product->quantity_stock > 0) {
                $product->status = 1;
                $product->active = 1;
            } else {
                $product->status = 0;
                $product->active = 1;
            }

            $product->quantity_memo = intval($normalize($inventory->InventoryOnMemo));

            $product->price = floatval(str_replace(',', '', $normalize($inventory->Price)));
            $product->tag_price = floatval(str_replace(',', '', $normalize($inventory->TagPrice)));

            $product->showondibs = $normalize($inventory->ShowonDibs);
            $product->showonbluefly = $normalize($inventory->ShowonBluefly);
            $product->showonetsy = $normalize($inventory->ShowonEtsy);
            $product->showoncustom1 = $normalize($inventory->ShowonCustom1);
            $product->showoncustom2 = $normalize($inventory->ShowonCustom2);
            $product->showoncustom3 = $normalize($inventory->ShowonCustom3);
            $product->showoncustom4 = $normalize($inventory->ShowonCustom4);
            $product->showoncustom5 = $normalize($inventory->ShowonCustom5);
            $product->donotlist = $normalize($inventory->DoNotList);

            $product->ebay = $normalize($inventory->eBay);
            $product->amazon = $normalize($inventory->Amazon);
            $product->artisan = $normalize($inventory->Artisan);
            $product->socheec = $normalize($inventory->Socheec);

            $product->thumbnail_url = $normalize($inventory->OtherImageUrl1);
            $product->image = $normalize($inventory->OtherImageUrl1);

            $product->other_image_url1 = $normalize($inventory->OtherImageUrl2);
            $product->other_image_url2 = $normalize($inventory->OtherImageUrl3);
            $product->other_image_url3 = $normalize($inventory->OtherImageUrl4);
            $product->other_image_url4 = $normalize($inventory->OtherImageUrl5);
            $product->other_image_url5 = $normalize($inventory->OtherImageUrl6);

            $product->item_category_code = $normalize($inventory->ItemCategoryCode);
            $product->metal_type = $normalize($inventory->MetalType);
            $product->ugi_term = $normalize($inventory->UGITerm);
            $product->size = $normalize($inventory->Size);

            $product->image_type = 2;

            $product->save();
        }

        return response()->json(['message' => 'Products synced successfully.'], 200);
    }

}