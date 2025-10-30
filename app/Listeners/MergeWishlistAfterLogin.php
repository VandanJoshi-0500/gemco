<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;


class MergeWishlistAfterLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        $sessionWishlist = Session::get('wishlist', []);

        if (!empty($sessionWishlist)) {
            foreach ($sessionWishlist as $productId) {
                Wishlist::firstOrCreate([
                    'user_id' => $user->id,
                    'product_id' => $productId
                ], [
                    'status' => 1,
                    'active' => 1
                ]);
            }

            // Clear session wishlist after merging
            Session::forget('wishlist');
        }
    }
}
