<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\insertProductReqeust;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products']= Product::all();
        return view ('products.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories']    = Category::ArrayForSelect();  
        $this->data['mode']      = 'create';   
        $this->data['headline']  = 'Add New Product';   

        return view('products.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(insertProductReqeust $request)
    {
        $formData= $request->all();
        if(Product::create($formData)){
            Session::flash('message', 'Product Insert Successfully!!!');
        };
        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product']=Product::find($id);
        return view('products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product']  = Product::findOrFail($id);
        $this->data['categories']    = Category::ArrayForSelect(); 
        $this->data['mode']      = 'edit';
        $this->data['headline']  = 'Update Information';

        return view('products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(insertProductReqeust $request, $id)
    {
        $data= $request->all();

        $user= Product::find($id);
        $user->category_id = $data['category_id'];
        $user->title     = $data['title'];
        $user->desc    = $data['desc'];
        $user->cost_price    = $data['cost_price'];
        $user->price  = $data['price'];
        

        if($user->save()){
            Session::flash('message', 'Product Updated Successfully!!!');
        };
        return redirect()->to('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::destroy($id) ){
            Session::flash('message', 'Product Deleted Successfully!!!');
        };
        return redirect()->to('products');
    }
}
