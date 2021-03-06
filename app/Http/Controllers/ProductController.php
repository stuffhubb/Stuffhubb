<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;

use View;
use Input;
use Redirect;
use Validator;
use Session;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$products = Product::all();
		return View::make('products.index')->with('products', $products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// return Input::all();

		// Do we care about validation?
		// What would we want to validate?
		// Can products have the same names?

		// Know how to get single input
		// shown below getting name of product
		$product_name = Input::get('name');
		$product_price = Input::get('price');
		// How do we get two inputs?
		// Name
		// Price
		// Will need to designate which form gives which input?
		// Or just receive an array of inputs like below?
		// get('name', 'price')
		$product = new Product();
		$product->product_name = $product_name;
		// default price for now
		$product->price = $product_price;
		$product->save();
		return Redirect::route('products.index')->withMessage('Product was created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return View::make('products.show')
			->withProduct($product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id)->delete();

		return Redirect::route('products.index')->withMessage('Item Deleted');
	}

}
