<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    protected static $pageTitle = "Products";

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $products = Product::get();

        $pageTitle = static::$pageTitle;

        return view('product.index', compact('products', 'pageTitle'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Product $product)
    {
        $pageTitle = static::$pageTitle;

        return view('product.edit', compact('pageTitle', 'product'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $pageTitle = static::$pageTitle;

        return view('product.create', compact('pageTitle'));
    }

    /**
     * @param ProductCreateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductCreateRequest $request)
    {
        $data = $request->all();

        $product = Product::create($data);

        app('common.flash_message')->success("Product created");

        return redirect(route('product-edit', $product));
    }

    /**
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->all();

        $product->update($data);

        app('common.flash_message')->success("Product updated");

        return back();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export()
    {
        return (new ProductsExport)->download('products.csv');
    }

}
