<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    //add items to cart
    public static function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemFormCookie();
        $existing_item = null;
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
            if ($existing_item !== null) {
                $cart_items[$existing_item]['quantity']++;
                $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
            } else {
                $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
                if ($product) {
                    $cart_items[] = [
                        'product_id' => $product_id,
                        'name' => $product->name,
                        'image' => $product->images[0],
                        'quantity' => 1,
                        'unit_amount' => $product->price,
                        'total_amount' => $product->price
                    ];
                }
            }
        }
        self::addCartItmesToCookie($cart_items);
        return count($cart_items);
    }

    //remove item to cart 
    public static function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemFormCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
            }
        }
        self::addCartItmesToCookie($cart_items);
        return $cart_items;
    }

    //add cart items to cookie
    public static function addCartItmesToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    //clear cart item from cookie
    public static function clearCartItems($cart_items)
    {
        Cookie::queue(Cookie::forgot('cart_items'));
    }

    //get all cart item from cookie
    public static function getCartItemFormCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items) {
            $cart_items = [];
        }
        return $cart_items;
    }

    //icrement item quantity
    public static function incrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemFormCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        self::addCartItmesToCookie($cart_items);
        return $cart_items;
    }

    //decrement item quantity
    public static function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemFormCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                } else {
                    unset($cart_items[$key]);
                }
            }
        }
        self::addCartItmesToCookie($cart_items);
        return $cart_items;
    }

    //calculated grand total
    public static function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));
    }
}
