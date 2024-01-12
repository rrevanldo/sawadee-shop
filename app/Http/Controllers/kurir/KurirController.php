<?php
namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Checkout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class KurirController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('kurir.dashboard_kurir', compact('user'));
    }

    public function listOrder()
    {
        $order = Checkout::with('user')->get();
        return view('kurir.order.list-order', compact('order'))->with('i');
    }

    public function Penerimaan($id){
        Checkout::where('id', '=', $id)->update([
            'status' => 3,
              // 'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Permintaan Di tolak');
    }
}