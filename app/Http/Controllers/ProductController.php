<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('to_be_auctioned_on','asc')->paginate(8);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$ldate = date('Y-m-d H:i:s');
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Name'=>'required',
            'Cost'=>'required',
            'to_be_auctioned_on' =>'required',
            //'product_image'=>'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);
        /*
        if($request->hasFile('product_image')){
            $filenamewithext = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpeg';
        } */

        $product = new Product;
        $product->Name = $request->input('Name');
        $product->Cost = $request->input('Cost');
        $product->to_be_auctioned_on = $request->input('to_be_auctioned_on');
        $product->user_id = auth()->user()->id;
        $product->save();
        return redirect('/products')->with('success','Product Added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product =  Product::orderBy('Cost','asc')->get(); //paginate(8);//GOTTA CHECK THIS
        $product = Product::find($id);
        //$visits = Redis::incr('visits');
        //return $visits;
        //return $product;
        return view('products/show',compact('product'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error','Unauthorized');    
        }
        return view('products/edit',compact('product'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'Name'=>'required',
            'Cost'=>'required'
        ]);
        $product =Product::find($id);
        $product->Name = $request->input('Name');
        $product->Cost = $request->input('Cost');
        $product->to_be_auctioned_on = $request->input('to_be_auctioned_on');
        $product->save();
        return redirect('/products')->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error','Unauthorized');    
        }

        $product->delete();
        return redirect('/products')->with('success','Product deleted');
    }
    
    /*{
        //push to db
        //store in a queue for all requests
        //
        //redirect to auctions
    }*/

    public function auctions(){
        $products = Product::all();
        /*function bids($id){
            $product = Product::find($id);
            $newCost = $product->cost+1;
            return $newCost;
        }*/
        return view('products.auctions',compact('products'));
    }
}
