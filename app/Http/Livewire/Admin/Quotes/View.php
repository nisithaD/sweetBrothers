<?php

namespace App\Http\Livewire\Admin\Quotes;

use App\contact;
use App\master_quote;
use App\master_quote_prods;
use App\product_images;
use App\products;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class View extends Component
{
    public $order, $productImages, $fees, $discounts;
    public $eventDate, $eventVenue;

    public $query = '';
    public $searchProducts = [];
    public $productQty = [];
    public $productUnitPrice = [];
    public $sub_total_products = 0;
    public $vat;
    public $vat_amount;
    public $setupFee;
    public $travelCost;
    public $damageDeposit;
    public $total_extra_charges;
    public $sub_total;
    public $overall_discount;
    public $final_grand_total;
    public $discounted_quote_price = [];
    public $product_total = [];
    public $appliedDiscountId;

    public function updateQty($productKey, $product_id)
    {
        master_quote_prods::where('quote_id', $this->order->id)->where('product_id', $product_id)->update([
            'quantity' => $this->productQty[$productKey]
        ]);
        $this->calculateSingleProductSubtotal($productKey, $product_id);
    }

    public function calculateSingleProductSubtotal($productKey, $product_id)
    {
        if ($this->discounted_quote_price[$productKey] !== 0) {
            $this->product_total[$productKey] = $this->productQty[$productKey] * $this->discounted_quote_price[$productKey];
        } elseif ($this->discounted_quote_price[$productKey] == 0) {
            $this->product_total[$productKey] = $this->productQty[$productKey] * $this->productUnitPrice[$productKey];
        }
        master_quote_prods::where('quote_id', $this->order->id)->where('product_id', $product_id)->update([
            'product_total' => $this->product_total[$productKey]
        ]);

        $this->subTotalProducts();
        $this->mount($this->order->id);
    }

    public function subTotalProducts()
    {
        $this->sub_total_products = master_quote_prods::where('quote_id', $this->order->id)->sum('product_total');

        master_quote::where('id', $this->order->id)->update([
            'sub_total_products' => $this->sub_total_products
        ]);

        $this->calculateVatAmount();
    }

    public function calculateVatAmount()
    {
        $this->vat_amount = $this->sub_total_products * ($this->vat / 100);

        master_quote::where('id', $this->order->id)->update([
            'vat_amount' => $this->vat_amount,
            'vat' => $this->vat
        ]);
        $this->calculateSubTotal();

    }

    public function calculateSubTotal()
    {
        $this->sub_total = $this->sub_total_products + $this->vat_amount + $this->total_extra_charges;
        master_quote::where('id', $this->order->id)->update([
            'sub_total' => $this->sub_total
        ]);

        $this->provideOverallDiscount();

        $this->mount($this->order->id);
    }

    public function provideOverallDiscount()
    {
        $this->final_grand_total = (100 - $this->overall_discount) / 100 * $this->sub_total;

        foreach ($this->discounts as $key=>$discount) {
            if ($this->final_grand_total <= $discount["minimum_req"]) {
                continue;
            } else {
                $this->final_grand_total = (100 - $discount["value"]) / 100 * $this->final_grand_total;
                $this->appliedDiscountId=$discount["id"];
            }

        }

        master_quote::where('id', $this->order->id)->update([
            'overall_discount' => $this->overall_discount,
            'final_grand_total' => $this->final_grand_total
        ]);

        $this->mount($this->order->id);
    }

    public function mount($id)
    {
        $this->order = master_quote::where('id', $id)->with('cartproducts')
            ->first();

        foreach ($this->order->products as $key => $product) {
            $this->productImages[$key] = product_images::where('product_id', $product->product_id)->get();
            $this->productQty[$key] = $product->quantity;
            $this->productUnitPrice[$key] = $product->quote_price;
            $this->discounted_quote_price[$key] = $product->discounted_quote_price;
            $this->product_total[$key] = $product->product_total;
        }
        $this->eventDate = $this->order->date;
        $this->eventVenue = $this->order->venue;
        $this->sub_total = $this->order->sub_total;
        $this->sub_total_products = $this->order->sub_total_products;


        $this->fees = contact::where('id', 1)->first();

        if ($this->order['vat'] == "") {
            $this->vat = $this->fees->vat;
        } else {
            $this->vat = $this->order->vat;
        }
        $this->vat_amount = $this->order->vat_amount;

        if ($this->order->setupFee == "") {
            $this->setupFee = $this->fees->setupFee;
        } else {
            $this->setupFee = $this->order->setupFee;
        }

        if ($this->order->travelCost == "") {
            $this->travelCost = $this->fees->travelCost;
        } else {
            $this->travelCost = $this->order->travelCost;
        }

        if ($this->order->damageDeposit == "") {
            $this->damageDeposit = $this->fees->damageDeposit;
        } else {
            $this->damageDeposit = $this->order->damageDeposit;
        }

        $this->overall_discount = $this->order->overall_discount;

        $this->total_extra_charges = $this->setupFee + $this->travelCost + $this->damageDeposit;

        $this->vat_amount = $this->order->vat_amount;

        $this->final_grand_total = $this->order->final_grand_total;

        $this->discounts = DB::table('discount_settings')->get();

    }

    public function updateSetupFee()
    {
        contact::where('id', 1)->update([
            'setupFee' => $this->setupFee,
        ]);
        $this->calculateSubTotal();

    }
    public function updateTravelCost()
    {
        contact::where('id', 1)->update([
            'travelCost' => $this->travelCost,
        ]);
        $this->calculateSubTotal();
    }

    public function updateDamageDeposit()
    {
        contact::where('id', 1)->update([
            'damageDeposit' => $this->damageDeposit
        ]);
        $this->calculateSubTotal();

    }

    public function updateUnitPrice($productKey, $product_id)
    {
        if ($this->productUnitPrice[$productKey] == "") {
            $this->productUnitPrice[$productKey] = 0;
        }
        master_quote_prods::where('quote_id', $this->order->id)->where('product_id', $product_id)->update([
            'quote_price' => $this->productUnitPrice[$productKey]
        ]);
        $this->calculateSingleProductSubtotal($productKey, $product_id);
    }

    public function updateUnitPriceAfterDiscount($productKey, $product_id)
    {
        if ($this->discounted_quote_price[$productKey] == "") {
            $this->discounted_quote_price[$productKey] = 0;
        }
        master_quote_prods::where('quote_id', $this->order->id)->where('product_id', $product_id)->update([
            'discounted_quote_price' => $this->discounted_quote_price[$productKey]
        ]);
        $this->calculateSingleProductSubtotal($productKey, $product_id);
    }

    public function deleteProduct($orderId, $productId)
    {
        master_quote_prods::where('quote_id', $orderId)->where('product_id', $productId)->delete();
        $this->subTotalProducts();
        $this->mount($this->order->id);
    }

    public function updatedQuery()
    {
        $this->searchProducts = products::where('title', 'LIKE', "%{$this->query}%")
            ->with('images')
            ->orderBy('created_at', 'DESC')->limit(5)->get();
        $this->mount($this->order->id);
    }

    public function addProductToList($productId, $orderId)
    {
        $newProduct = products::where('id', $productId)->first();
        master_quote_prods::create([
            'quote_id' => $orderId,
            'product_id' => $newProduct->id,
            'title' => $newProduct['title']
        ]);

        $this->query = "";
        $this->searchProducts = "";
        $this->mount($this->order->id);

    }

    public function render()
    {
        return view('livewire.admin.quotes.view')->extends('admin.layouts.main');
    }
}
