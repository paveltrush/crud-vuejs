<?php

namespace App\Http\Controllers;

use App\Events\ProductsExportEvent;
use App\Exports\ProductsExport;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use League\Csv\CannotInsertRecord;
use League\Csv\Exception;
use League\Csv\Writer;

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
     * Generate CSV content
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function export()
    {
        $records = Product::query()->select(['title', 'price', 'description'])->get()->toArray();
        $headers = ['Title', 'Price', 'Description'];

        $values = [];

        foreach ($records as $item) {
            $values[] = array_values($item);
        }

        $result = array_merge([$headers], $values);

        $csv = Writer::createFromString('');

        try {
            $csv->insertAll($result);

            sleep(5);

            event(new ProductsExportEvent($csv->getContent()));

            return response("CSV generated", 200);
        } catch (CannotInsertRecord|Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

}
