<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = Product::select([
            'products.id',
            'products.name',
            'product_variations.price',
            \DB::raw('GROUP_CONCAT(colors.name) as colors'),
        ])->join(
            'product_variations',
            'product_variations.product_id',
            '=',
            'products.id'
        )->join(
            'colors',
            'product_variations.color_id',
            '=',
            'colors.id'
        );

        if ($request->input('search', null)) {
            $q->where(
                'products.name',
                'like',
                '%' . $request->input('search') . '%'
            );
        }

        if ($request->input('price_from', null) and
            $request->input('price_to', null)) {
            $q->whereBetween(
                'price',
                [
                    $request->input('price_from'),
                    $request->input('price_to'),
                ]
            );
        }

//        dd($q->toSql(), $q->getBindings());
        $data = $q->groupBy('products.id')->paginate(24);

        return view('product.product_list', [
            'data' => $data
        ]);
    }
}
