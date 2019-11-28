<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Stock;
use App\Cost;
use App\Product;
use DataTable;
class ChicController extends Controller
{
    ////////////////		StockController			////////////////


	public function indexStock()
	{
		$stocks = Stock::all();
     $i=1; 
		return view('stock.index', compact('stocks','i'));
	}



	////////////////////////////
	public function createStock()
	{
    $stock = Stock::all();
    return view('Stock.createStock', compact('stock'));
  }


	////////////////////////////////////////////
  public function storeStock(Request $request)
  {
    $request->validate([
            // 'id'=>'required',
     'stock_name'=>'required',
     'stock_qty'=>'required',
     'stock_unit'=>'required',
     'stock_price_per_kg'=>'required',
     'stock_weight_per_qty'=>'required'
   ]);

    $stock = new Stock([
     'stock_name'=>$request->get('stock_name'),
     'stock_qty'=>$request->get('stock_qty'),
     'stock_unit'=>$request->get('stock_unit'),
     'stock_price_per_kg'=>$request->get('stock_price_per_kg'),
     'stock_weight_per_qty'=>$request->get('stock_weight_per_qty')
   ]);

    $stock->save();
    return redirect('/home')->with('success','Stock Saved!');
  }

  public function editStock(Stock $id)
  {
        //
		// $Stock = Stock::find($id);
		// return view('Stock.edit', compact('Stock', 'id'));
		// return response($stock);

    $stock = Stock::all();
    return view('Stock.edit', [
      'Stock' => $id,
    ]);

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function updateStock(Request $request, $id)
    {
    	$request->validate([
    		'stock_name'=>'required',
    		'stock_qty'=>'required',
    		'stock_unit'=>'required',
    		'stock_price_per_kg'=>'required',
    		'stock_weight_per_qty'=>'required'
    	]);

    	$stock = Stock::find($id);
    	$stock->stock_name =  $request->get('stock_name');
    	$stock->stock_qty = $request->get('stock_qty');
    	$stock->stock_unit = $request->get('stock_unit');
    	$stock->stock_price_per_kg = $request->get('stock_price_per_kg');
    	$stock->stock_weight_per_qty = $request->get('stock_weight_per_qty');
    	$stock->save();

    	return redirect('/Stock/index/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroyStock($id)
    {
        //
    	$stock = Stock::find($id);

    	$product = Product::where('stock_id', '=', $id)->first();
        // return response($product);

      $cost = Cost::where('stock_id', '=', $id)->first();
        // return response($cost);

      if ($product === null && $cost === null) {

        $stock->delete();
        return redirect('/Stock/index/')->with('success', 'Stock Deleted!');
      }
      else
      {
            // return response($product);
       return redirect('/Stock/index/')->with('alert', 'something!');;
     }

   }
   public function showStock($id)
    {
        $stock = Stock::find($id);
        
        return view('Stock.showStock', compact('stock')); 
    }


	//////////////////////////


    ////////////////		CostController			////////////////

   public function indexCost()
   {
     $Cost = Cost::all();
     $Stock = Stock::all();
      $i=1; 

     return view('cost.index', compact('Cost', 'Stock','i'));
   }




   public function createCost()
   {
     $stock = Stock::all();
     return view('Cost.createCost', compact('stock'));
   }


   public function storeCost(Request $request)
   {
     $request->validate([
      'cost_name'=>'required',
      'cost'=>'required',
      'stock_id'=>'required'
    ]);


     $cost = new Cost([
      'cost_name'=>$request->get('cost_name'),
      'cost'=>$request->get('cost'),
      'stock_id'=>$request->get('stock_id')

    ]);

     $cost->save();
     return redirect('/home')->with('success', 'Cost Saved!');

   }

   public function showCost()
   {
     $cost = Cost::all();
     return view('Cost.viewCost', compact('cost'));
   }

   public function editCost(Cost $id)
   {

  // $costs = Cost::find($id);
    $Cost = Cost::all();
    $stock = Stock::all();
    return view('Cost.edit', [
      'Cost' => $id,
    ], compact('stock'));

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function updateCost(Request $request, $id)
    {
      $request->validate([
        'cost_name'=>'required',
        'cost'=>'required',
        'stock_id'=>'required'
      ]);

      $cost = Cost::find($id);
      $cost->cost_name =  $request->get('cost_name');
      $cost->cost = $request->get('cost');
      $cost->stock_id = $request->get('stock_id');
      $cost->save();

      return redirect('/Cost/index/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroyCost($id)
    {
        //
      $cost = Cost::find($id);

      $cost->delete();
      return redirect('/Cost/index/')->with('success', 'Cost Deleted!');

    } 

     public function viewCost($id)
    {
        $cost = Cost::find($id);
        
        return view('Cost.showCost', compact('cost')); 
    }














	////////////////		ProductController		////////////////


    public function indexProduct()
    {
      $product = Product::all();
       $i=1; 

      return view('product.index', compact('product','i'));
    }


    public function createProduct()
    {	
     $stock = Stock::all();
     $product = Product::all();
     return view('Product.createProduct', compact('stock', 'product'));
   }

   public function storeProduct(request $request)
   {
     $request->validate([
      'pro_name'=>'required',
      'pro_demand'=>'required',
      'dem_unit'=>'required',
      'price_per_kg'=>'required',
      'weight_per_qty'=>'required',
      'stock_id'=>'required'
    ],
    [
      'pro_name.required' => 'Please select a product to proceed.'
    ]);



     $product = new Product([
      'pro_name'=>$request->get('pro_name'),
      'pro_demand'=>$request->get('pro_demand'),
      'dem_unit'=>$request->get('dem_unit'),
      'price_per_kg'=>$request->get('price_per_kg'),
      'weight_per_qty'=>$request->get('weight_per_qty'),
      'stock_id'=>$request->get('stock_id')
    ]);

     $product->save();
    return redirect('/home')->with('success', 'Product Saved!');
   }

   public function showProduct()
   {
     $product = Product::all();
     return view('Product.viewProduct', compact('product'));
   }



   public function editProduct(Product $id)
   {

    $products = Product::find($id);
    $all = Product::all();
    return view('Product.edit', [
      'Product' => $id,], compact('products', 'all'));

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
      $request->validate([
        'pro_name'=>'required',
        'pro_demand'=>'required',
        'dem_unit'=>'required',
        'price_per_kg'=>'required',
        'weight_per_qty'=>'required'
      ]);

      $product = Product::find($id);
      $product->pro_name =  $request->get('pro_name');
      $product->pro_demand = $request->get('pro_demand');
      $product->dem_unit = $request->get('dem_unit');
      $product->price_per_kg = $request->get('price_per_kg');
      $product->weight_per_qty = $request->get('weight_per_qty');
      $product->save();

      return redirect('/Product/index/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id)
    {
        //
      $product = Product::find($id);

      // $product = Product::where('stock_id', '=', $id)->first();
        // return response($product);

      // $cost = Cost::where('stock_id', '=', $id)->first();
        // return response($cost);

     //  if ($product === null && $cost === null) {

     //    $stock->delete();
     //    return redirect('/Stock/index/')->with('success', 'Stock Deleted!');
     //  }
     //  else
     //  {
     //        // return response($product);
     //   return redirect('/Stock/index/')->with('alert', 'something!');;
     // }

      $product->delete();
      return redirect('/Product/index/')->with('success', 'Product Deleted!');

    } 

    public function viewProduct($id)
    {
        $product = Product::find($id);
        
        return view('Product.showProduct', compact('product')); 
    }

	//Optimizer
    public function optimizer()
    {
     $data = DB::table('product')
     ->join('stock', 'stock.id', '=', 'product.stock_id')	
     ->select('product.pro_name','product.pro_demand', 'product.dem_unit', 'product.price_per_kg', 'product.weight_per_qty', 'stock_name', 'stock.stock_qty', 'stock.stock_unit')
     ->get();

		// $cost = DB::table('cost')
		// ->join('stock','stock.id','=','cost.stock_id')
		// ->select('cost_name','cost','stock_id')
		// ->get();

     $costs = Cost::all();

		// return('product.pro_name');
     return view('Optimizer.optimizer', compact('data','costs'));
   }
 }
