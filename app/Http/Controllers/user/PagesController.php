<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        $user = User::all();
        return view('homepage', compact('products', 'category', 'user'));
    }

    public function showProduct()
    {
        $user = null;

        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
        }

        $product = Product::all();
        $products = Product::with('category')->limit(5)->get();
        $categories = Category::all();

        return view('show_product', compact('user', 'products', 'categories', 'product'));
    }

    public function detailProduct($id)
    {
        $user = null;

        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
        }

        $product = Product::with('category')->find($id);

        if (!$product) {
            abort(404);
        }

        return view('detail_product', compact('user', 'product'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function historyTransaction()
    {
        $history = Checkout::all();
        return view('history_transaction', compact('history'));
    }

    public function penerimaan($id){
        Checkout::where('id', '=', $id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('done', 'Berhasil');
    }

    public function checkout(){
        return view('checkout');
    }

    public function pembayaran(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image-product' => 'required',
            'price' => 'required',
            'bukti_pembayaran' => 'required',
            'adress' => 'required',
            'product' => 'required',
        ]);

        $images = $request->file('bukti_pembayaran');
        $imgName = time() . rand() . '.' . $images->extension();

        if (!file_exists(public_path('/image' . $images->getClientOriginalName()))) {
            $destinationPath = public_path('/image');
            $images->move($destinationPath, $imgName);
            $upload = $imgName;
        } else {
            $upload = $images->getClientOriginalName();
        }

        Checkout::create([
            'name' => $request->name,
            'bukti_pembayaran' => $upload,
            'email' => $request->email,
            'phone' => $request->phone,
            'price' => $request->price,
            'image-product' => $request->input('image-product'),
            'adress' => $request->adress,
            'product' => $request->product,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/history')->with('success', 'Pembayaran sedang di verifikasi, harap tuggu informasi selanjutnya');
    }
}
