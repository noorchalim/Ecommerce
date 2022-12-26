<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.home');
        }
        
        else{
            $data = product::paginate(3);
            return view('user.home', compact('data'));            
        }
    }

    public function index(){

        if(Auth::id()){
            return redirect('redirect');
        }
        else{

            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
    }

    public function search(Request $request){
        $search=$request->search;

        if ($search=='') {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }

        $data=product::where('title', 'Like', '%'.$search.'%')->get();

        return view('user.home', compact('data'));
    }

    public function addcart(Request $request, $id){
        if (Auth::id()) {

            $user=auth()->user();

            $product=product::find($id);

            $cart=new cart;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            $cart->save();




            return redirect()->back()->with('message', 'Product berhasil di tambahkan di keranjang');
        }
        else{
            return redirect('login');
        }
    }
}
