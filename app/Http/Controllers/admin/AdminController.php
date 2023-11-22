<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Checkout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.dashboard_admin', compact('user'));
    }

    public function userData(){
        $userData = User::all();
        return view('admin.manage_user.list_user', compact('userData'))->with('i');
    }

public function listOrder()
{
    $order = Checkout::with('user')->get();
    return view('admin.order.list-order', compact('order'))->with('i');
}

    public function detail_pembayaran($id){
        $bukti = Checkout::where('id', $id)->first();
        return view('admin.order.detailpembayaran', compact('bukti'));
    }

    public function validasi($id){
        Checkout::where('id', '=', $id)->update([
            'status' => 3,
        ]);
        return redirect()->back()->with('done', 'Berhasil Validasi');
    }
  
    public function tolak($id){
        Checkout::where('id', '=', $id)->update([
            'status' => 2,
              // 'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Permintaan Di tolak');
    }

    public function userDelete($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('deleteUser', 'Berhasil menghapus user');
        }
    }
}