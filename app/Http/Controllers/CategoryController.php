<?php

namespace App\Http\Controllers;

use App\Http\Requests\createCategoryReqeust;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class CategoryController extends Controller
{   
    public function __construct(){
        parent::__construct();
        $this->data['main_manu']='Products';
        $this->data['sub_manu']='Category';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories']= Category::all();
        return view('category/categories',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headline']  ="Add New Categries";
        $this->data['mode']      = 'create'; 
        return view('category/form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createCategoryReqeust $request)
    {
        $formData= $request->all();
        if(Category::create($formData)){
            Session::flash('message', $formData['title'].' Created Successfully!!!');
        };
        return redirect()->to('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category']  = Category::findOrFail($id);
        $this->data['mode']      = 'edit';
        $this->data['headline']  = 'Update Category';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createCategoryReqeust $request, $id)
    {
        $data= $request->all();

        $category= Category::find($id);
        $category->title = $data['title'];

        if($category->save()){
            Session::flash('message', 'Category Updated Successfully!!!');
        };
        return redirect()->to('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::find($id)->delete() ){
            Session::flash('message', 'Category Deleted Successfully!!!');
        };
        return redirect()->to('category');
    }
}
