<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class mainController extends Controller
{

//untuk ke page login user
public function login(){
    return view ('/login');
}

//untuk ke page register user & admin
public function register(){
    return view('/register');
}

//validasi registrasi user & admin
public function store(Request $request){

$validatedData = $request->validate([

'name' => 'required|max:255',
'username' => 'required|min:3|max:255|unique:users',
'email' =>  'required|email:dns|unique:users',
'password' => 'required|min:5|max:255',

]);

$validatedData['password'] = bcrypt($validatedData['password']);


User::create($validatedData);
$request->session()->flash('success', 'Registrastion Success! Login now...');

return redirect('home');

}

public function login_page(Request $request){


    $input = $request->all();

    $this -> validate($request, [

        'email' => 'required',
        'password' => 'required'

    ]);


    if(Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))){
        if(Auth::user()->level == 'admin'){

            return redirect('admin_page.home_admin')->with('sukses', 'Login Berhasil');
        }
        else{

            $request->session()->flash('sukses', 'Login Berhasil');

            return redirect('user_page.home_user')->with('sukses', 'Login Berhasil');
        }
    }

    return back()->with('error','Login Gagal!');
}


//login user
// public function auth_user(Request $request){

//    if(Auth::attempt($request->only('email','password'))){


//         return redirect('/user_page.home_user');
//    }
//     return back()->with('userError','Login Gagal!');
// }

// //login admin
// public function auth_admin(Request $request){

//     if(Auth::attempt($request->only('email','password'))){
//         return redirect('/admin_page.home_admin');
//     }
//     return back()->with('adminError','Login Gagal!');
//  }

//untuk ke page login admin
public function login_admin(){
    return view('/login_admin');
}

//untuk ke page yang bisa diakses oleh admin
public function home_admin(){
    return view('/admin_page.home_admin');
}

//untuk ke page yang bisa diakses oleh admin
public function home_user(){
    return view('/user_page.home_user');
}

//logout dari akun user & admin
public function logout(Request $request){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/home');
    }

//untuk ke page list minuman (khusus admin)
public function list_minuman(){
    return view('/admin_page.list_minuman');
}

//validasi untuk menambah minuman baru (khusus admin)
public function add_minum(Request $request){

    $validatedData = $request->validate([

        'namaMinum' => 'required|max:255|unique:menus',
        'stok' => 'required|max:11',
        'harga' =>  'required|max:11',
        'image' => 'image',

    ]);

    if($request->file('image')){
        $validatedData['image']=$request->file('image')->store('image');
    }

    Menu::create($validatedData);
    $request->session()->flash('success', 'Upload Success!');


    return redirect('admin_page.list_minuman');

}

//untuk ke page tambah minuman (khusus admin)
public function tambah_minum(){
    return view('/admin_page.tambah_minum');
}


public function read_data(){


        $data =  Menu::simplePaginate(20);

        return view('admin_page.list_minuman',['minuman'=>$data]);

}

// user melihat daftar minuman (khusus admin)
public function daftar_minum(){

    $data =  Menu::simplePaginate(20);

    return view('user_page.daftar_minum',['minuman'=>$data]);

}

//untuk redirect ke page edit minum (khusus admin)
public function edit_minum(){
    return view('/admin_page.edit_minum');
}

//untuk memperlihatkan data minuman lama (khusus admin)
public function show_minum($id){
    $data = Menu::find($id);
    return view('admin_page.edit_minum',['data'=>$data]);
}

//untuk mengupdate / edit data minuman (khusus admin)
public function update_minum(Request $request){

    $data = Menu::find($request->id);
    $data ->namaMinum = $request->namaMinum;
    $data ->stok = $request->stok;
    $data ->harga = $request->harga;
    $data ->image = $request->image;

    if($request->file('image')){
        $data['image']=$request->file('image')->store('image');
    }

    $data ->save();

    $request->session()->flash('sukses', 'Data minum telah diedit');
    return redirect('/admin_page.list_minuman');

}

//untuk delete minuman (khusus admin)
public function delete_minum(Request $request ,$id){

    $data = Menu::find($id);

    $data-> delete();

    $request->session()->flash('berhasil', 'Data minum telah dihapus');
    return redirect('/admin_page.list_minuman');
    }

//redirect ke page beli minuman dengan memasukan jumlah minuman yang ingin dibeli
public function beli_minuman($id){

    $menu = Menu::where('id', $id)->first();

    return view('pembayaran.beli_minum', compact('menu'));
}

//logic untuk memproses pembelian minuman
public function beli_minum(Request $request, $id)
{
    $menu = Menu::where('id', $id)->first();
    $tanggal = Carbon::now();

        if($request->jumlah_pesan > $menu->stok)
        {
            return redirect('pembayaran.beli_minum/'.$id);
        }

    $cek_pesanan = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();

    if(empty($cek_pesanan))
    {
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->tanggal_transaction = $tanggal;
        $transaction->status = 0;
        $transaction->jumlah_harga = 0;
        $transaction->save();
    }


    $pesanan_baru = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();

    $cek_pesanan_detail = Transaction_detail::where('minum_id', $menu->id)->where('transaction_id', $pesanan_baru->id)->first();
    if(empty($cek_pesanan_detail))
    {
        $transaction_detail = new Transaction_detail;
        $transaction_detail->minum_id = $menu->id;
        $transaction_detail->transaction_id = $pesanan_baru->id;
        $transaction_detail->jumlah_barang = $request->jumlah_pesan;
        $transaction_detail->jumlah_harga = $menu->harga*$request->jumlah_pesan;
        $transaction_detail->save();
    }else
    {
        $transaction_detail = Transaction_detail::where('minum_id', $menu->id)->where('transaction_id', $pesanan_baru->id)->first();

        $transaction_detail->jumlah_barang = $transaction_detail->jumlah_barang+$request->jumlah_pesan;

        $harga_pesanan_detail_baru = $menu->harga*$request->jumlah_pesan;
        $transaction_detail->jumlah_harga = $transaction_detail->jumlah_harga+$harga_pesanan_detail_baru;
        $transaction_detail->update();
    }

    $transaction = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();
    $transaction->jumlah_harga = $transaction->jumlah_harga+$menu->harga*$request->jumlah_pesan;
    $transaction->update();

    return redirect('pembayaran.pesanan_minum');

}

//redirect ke page pesanan
public function pesanan_minum()
{
    $transaction = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();
    if(!empty($transaction))
    {
        $transaction_details = Transaction_detail::where('transaction_id', $transaction->id)->get();


    }

    return view('pembayaran.pesanan_minum', compact('transaction', 'transaction_details'));
}

//delete salah satu transaction minuman
public function delete_trans($id)
{
    $transaction_detail = Transaction_detail::where('id', $id)->first();

    $transaction = Transaction::where('id', $transaction_detail->transaction_id)->first();
    $transaction->jumlah_harga = $transaction->jumlah_harga-$transaction_detail->jumlah_harga;
    $transaction->update();


    $transaction_detail->delete();

    return redirect('pembayaran.pesanan_minum');
}


public function konfirmasi_trans()
{

    $transaction = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();
    $transaction_id = $transaction->id;
    $transaction->status = 1;
    $transaction->update();

    $transaction_details = Transaction_detail::where('transaction_id', $transaction_id)->get();
    foreach ($transaction_details as $transaction_detail) {
        $menu = Menu::where('id', $transaction_detail->minum_id)->first();
        $menu->stok = $menu->stok-$transaction_detail->jumlah_barang;
        $menu->update();
    }

    return redirect('user_page.home_user');

}

public function histori()
{
    $transactions = Transaction::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    return view('user_page.histori_trans', compact('transactions'));
}


public function detail($id)
    {
    	$transaction = Transaction::where('id', $id)->first();
    	$transaction_details = Transaction_detail::where('transaction_id', $transaction->id)->get();

     	return view('user_page.histori_detail', compact('transaction','transaction_details'));
    }
}













