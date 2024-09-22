<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index(){
        $products=products::orderBy('created_at','DESC')->get();
        return view('pages.list',[
            'products'=>$products
        ]);
    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $req){
        $rules=[
            'asset'=>'required',
            'person'=>'required',
        ];
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails()){
            return redirect()->route('data.create')->withInput()->withErrors($validator);
        }
        $products=new products();
        $products->asset_name=$req->asset;
        $products->person_name=$req->person;
        $products->save();
        return redirect()->route('data.index')->with('success','Product Added Successfully');
    }
    
    public function edit($id){
        $products=products::findOrFail($id);

        return view('pages.edit',[
            'product'=>$products
        ]);
    }

    public function update($id,Request $req){
        $product=products::findOrFail($id);
        $rules=[
            'asset'=>'required',
            'person'=>'required',
        ];
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails()){
            return redirect()->route('data.edit',$product->id)->withInput()->withErrors($validator);
        }
        
        $product->asset_name=$req->asset;
        $product->person_name=$req->person;
        $product->save();
        return redirect()->route('data.index')->with('success','Product Updated Successfully');
        
    }
    public function delete($id){
        $product=products::findOrFail($id);
        $product->delete();
        return redirect()->route('data.index')->with('success','Product Deleted Successfully');
    }
}
