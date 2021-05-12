<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ratings;
use App\Models\Review;
use App\Models\Sizes;
use App\Models\Categories;
class ProductController extends Controller
{
    public function ViewProduct(Request $request){
        $id=$request->id;
        $detail=Product::where('id',$id)->first();
        $rating=Ratings::where('product_id',$id)->avg('rate');
        $Review=Review::where('produt_id',$id)->count();
        $size=Sizes::where('product_id',$id)->count();

        $data=[
            'details'=>$detail,
            'ratign'=>$rating,
            'Review'=>$Review,
            'size'=>$size,
        ];

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'You Have fetched Product Successfully.'
        ];
        return response()->json($response, 200); 
    }


    public function categories(){
        $data=Categories::all();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'You Have fetched Categories Successfully.'
        ];
        return response()->json($response, 200); 
    }

    public function products(){
        $data=Product::all(); 
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'You Have fetched all Products Successfully.'
        ];
        return response()->json($response, 200); 
    }

    

    public function Trendingproducts(){
        $data= Product::where('featured','=','1')->get(); 
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'You Have fetched Trending Products Successfully.'
        ];
        return response()->json($response, 200); 

    }

    public function search(Request $request){
       $title= $request->title;
       $data=Product::where('title', 'like', $title)->get(); 
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'You are Search Result is Here .'
        ];
        return response()->json($response, 200); 

    }

    public function searchBycategory(Request $request){
        $category= $request->category;
        $data=Product::where('category',$category)->get(); 
         $response = [
             'success' => true,
             'data' => $data,
             'message' => 'You Have fetched products Successfully.'
         ];
         return response()->json($response, 200); 
    }
}
