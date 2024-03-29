<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['data']=Product::all();
        return view('admin.product',$result);
    }

    public function manage_product(Request $request,$id='')
    {
        if($id>0){
            $arr= Product::where(['id'=>$id])->get();

            $result['id']= $arr['0']->id;
            $result['category_id']= $arr['0']->category_id;
            $result['name']= $arr['0']->name;
            $result['image']= $arr['0']->image;
            $result['slug']= $arr['0']->slug;
            $result['brand']= $arr['0']->brand;
            $result['model']= $arr['0']->model;
            $result['short_desc']= $arr['0']->short_desc;
            $result['desc']= $arr['0']->desc;
            $result['keywords']= $arr['0']->keywords;
            $result['technical_specification']= $arr['0']->technical_specification;
            $result['uses']= $arr['0']->uses;
            $result['warranty']= $arr['0']->warranty;
            $result['status']= $arr['0']->status;
        }else{
            $result['category_id']= '';
            $result['id']= 0;
            $result['name']= '';
            $result['image']= '';
            $result['slug']='';
            $result['brand']='';
            $result['model']= '';
            $result['short_desc']= '';
            $result['desc']= '';
            $result['keywords']= '';
            $result['technical_specification']= '';
            $result['uses']= '';
            $result['warranty']= '';
            $result['status']= '';
        }
        $result['category']=DB::table('categories')->where(
            ['status'=>1])->get();
        return view('admin.manage_product',$result);
    }
    public function manage_product_process(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'slug' => 'required|
            unique:products,slug,'.$request->post('id'),

        ]);

        if($request->post('id')>0)
        {
            $model= Product::find($request->post('id'));
            $msg = "Product Updated";
        }
        else{
            $model=new Product();
            $msg = "Product Inserted";
        }

        $model->category_id = $request->post('category_id');
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('desc');
        $model->keywords = $request->post('keywords');
        $model->technical_specification = $request->post('technical_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->status =1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }
    public function delete(Request $request,$id)
    {
        $model= Product::find($id);
        $model->delete();
        $request->session()->flash('message','Product Deleted');
        return redirect('admin/product');
    }
    public function status(Request $request,$status,$id)
    {
        $model= Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Product Status Updated');
        return redirect('admin/product');
    }
}
