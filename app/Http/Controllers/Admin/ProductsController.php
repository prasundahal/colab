<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\enter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    // protected $users;
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{
            $create = $this->productRepository->createProduct($request);
            return redirect(route('products.edit',[$create->id]))->with('message','Product Created');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('admin.products.form',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try{
            $create = $this->productRepository->updateProduct($id,$request);
            return redirect(route('products.edit',[$id]))->with('success','Product Updated');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->productRepository->deleteProduct($id); 
            return redirect(route('products.index'))->with('success','Product Deleted');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
