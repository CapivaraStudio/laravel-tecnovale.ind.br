<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Product $product)
    {
      $productImages = $product->images;
      $primaryImage = $product->images->where('primary', true)->first();
      return view('admin.pages.product.images', [
        'product'=>$product,
        'productImages'=>$productImages,
        'primaryImage'=>$primaryImage
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      if($request->hasFile('images')) {
        try {
          foreach ($request->file('images') as $image) {
            $producImage = new ProductImage();
            $producImage->product = $request->product;
            $producImage->path = $image->store('product/'.$request->product);
            $producImage->save();
          }
          $oldPrimary = ProductImage::all()
            ->where('product', $request->product)
            ->where('primary', true)->first();
          if(!$oldPrimary) {
            $newPrimary = ProductImage::all()->first();
            $newPrimary->primary = true;
            $newPrimary->save();
          }
          return redirect()->back()->with('status', 'Imagens cadastradas com sucesso!');
        } catch (\Exception $exception) {
          return redirect()->back()->withErrors([$exception->getMessage()]);
        }

      }else {
        return redirect()->back()->withErrors(['Nenhuma imagem inserida!']);
      }
    }

    /**
     * Display the specified resource
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImage $productImage, ProductImage $primaryImage)
    {
      try {
        $primaryImage->primary = false;
        $primaryImage->save();
        $productImage->primary = true;
        $productImage->save();
        return redirect()->back()->with('status', 'Imagem principal alterada com sucesso!');
      } catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
      try {
        Storage::delete($productImage->path);
        if($productImage->primary) {
          $newPrimary = ProductImage::all()->where('primary', false)->first();
          $newPrimary->primary = true;
          $newPrimary->save();
        }
        $productImage->delete();
        return redirect()->back()->with('status', 'Imagem apagada com sucesso!');
      }catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }
}
