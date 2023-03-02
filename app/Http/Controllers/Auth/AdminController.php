<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(Request $request){
        $users = DB::select('select * from produk');
        return view('admin/home', ['title' => 'HOME','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'ada'=>array(),'tidak'=>array()]);
    }
    public function add_user(Request $request){
        DB::insert('INSERT INTO users (email,name,password,role) VALUES(?,?,?,2)',[$request->email,$request->name,Hash::make($request->password)]);
        return redirect(route('admin'));
    }
    public function delete_user(Request $request){
        DB::delete('DELETE FROM users WHERE id=?',[$request->del]);
        return redirect(route('admin'));
    }
    public function edit_user(Request $request){
        DB::update('UPDATE users SET email=?,name=?,password=? WHERE id=?' ,[$request->email,$request->name,Hash::make($request->password),$request->del]);
        return redirect(route('admin'));
    }
    
    public function produk(Request $request){
        $users = DB::select('select * from produk');
        return view('admin/produk', ['title' => 'PRODUK','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users]);
    }
    public function add_produk(Request $request){
        DB::insert('INSERT INTO produk (nama,harga) VALUES(?,?)',[$request->nama,$request->harga]);
        return redirect(route('produk'));
    }
    public function delete_produk(Request $request){
        DB::delete('DELETE FROM produk WHERE id=?',[$request->del]);
        return redirect(route('produk'));
    }
    public function edit_produk(Request $request){
        DB::update('UPDATE produk SET nama=?, harga=? WHERE id=?' ,[$request->nama,$request->harga,$request->del]);
        return redirect(route('produk'));
    }

    
    public function outlet(Request $request){
        $users = DB::select('select * from outlet');
        return view('admin/outlet', ['title' => 'OUTLET','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users]);
    }
    public function add_outlet(Request $request){
        DB::insert('INSERT INTO outlet (nama,alamat,status) VALUES(?,?,?)',[$request->nama,$request->alamat,$request->status]);
        return redirect(route('outlet'));
    }
    public function delete_outlet(Request $request){
        DB::delete('DELETE FROM outlet WHERE id=?',[$request->del]);
        return redirect(route('outlet'));
    }
    public function edit_outlet(Request $request){
        DB::update('UPDATE outlet SET nama=?, alamat=?, status=? WHERE id=?' ,[$request->nama,$request->alamat,$request->status,$request->del]);
        return redirect(route('outlet'));
    }
    
    public function diskon_h(Request $request){
        $users = DB::select('select *,diskon_h.id AS id from diskon_h JOIN outlet ON diskon_h.id_outlet = outlet.id');
        $user = DB::select('select * from outlet');
        return view('admin/diskon_h', ['title' => 'DISKON HEADER','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'data' => $user]);
    }
    public function add_diskon_h(Request $request){
        DB::insert('INSERT INTO diskon_h (id_outlet,akhir,awal) VALUES(?,?,?)',[$request->id_outlet,$request->akhir,$request->awal]);
        return redirect(route('diskon_h'));
    }
    public function delete_diskon_h(Request $request){
        DB::delete('DELETE FROM diskon_h WHERE id=?',[$request->del]);
        return redirect(route('diskon_h'));
    }
    public function edit_diskon_h(Request $request){
        DB::UPDATE('UPDATE diskon_h SET id_outlet=? ,awal=?,akhir=? WHERE id=?',[$request->id_outlet,$request->awal,$request->akhir,$request->del]);
        return redirect(route('diskon_h'));
    }
    
    public function order_h(Request $request){
        $users = DB::select('select *,order_h.id AS id from order_h JOIN outlet ON order_h.id_outlet = outlet.id');
        $user = DB::select('select * from outlet');
        return view('admin/order_h', ['title' => 'ORDER HEADER','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'data' => $user]);
    }
    public function add_order_h(Request $request){
        DB::insert('INSERT INTO order_h (id_outlet,tanggal,lunas,total_bayar) VALUES(?,?,?,?)',[$request->id_outlet,$request->tanggal,$request->lunas,$request->total_bayar]);
        return redirect(route('order_h'));
    }
    public function delete_order_h(Request $request){
        DB::delete('DELETE FROM order_h WHERE id=?',[$request->del]);
        return redirect(route('order_h'));
    }
    public function edit_order_h(Request $request){
        DB::UPDATE('UPDATE order_h SET id_outlet=? ,tanggal=?,lunas=?,total_bayar=? WHERE id=?',[$request->id_outlet,$request->tanggal,$request->lunas,$request->total_bayar,$request->del]);
        return redirect(route('order_h'));
    }
    
    
    public function diskon_d(Request $request){
        $users = DB::select('select *,diskon_d.id AS id from diskon_h JOIN diskon_d ON diskon_d.id = diskon_h.id JOIN produk ON diskon_d.id_produk=produk.id');
        $user = DB::select('select * from diskon_h');
        $userss = DB::select('select * from produk');
        return view('admin/diskon_d', ['title' => 'DISKON DETAIL','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'data' => $user,'datas' => $userss]);
    }
    public function add_diskon_d(Request $request){
        DB::insert('INSERT INTO diskon_d (id,id_produk,diskon,min,max) VALUES(?,?,?,?,?)',[$request->id,$request->id_produk,$request->diskon,$request->min,$request->max]);
        return redirect(route('diskon_d'));
    }
    public function delete_diskon_d(Request $request){
        DB::delete('DELETE FROM diskon_d WHERE id=?',[$request->del]);
        return redirect(route('diskon_d'));
    }
    public function edit_diskon_d(Request $request){
        DB::UPDATE('UPDATE diskon_d SET id=? ,id_produk=?,diskon=?,min=?,max=? WHERE id=?',[$request->id,$request->id_produk,$request->diskon,$request->min,$request->max,$request->del]);
        return redirect(route('diskon_d'));
    }
    
    
    public function order_d(Request $request){
        $users = DB::select('select *,produk.harga AS harga,order_d.id AS id from order_h JOIN order_d ON order_d.id_order_h = order_h.id JOIN produk ON order_d.id_produk=produk.id');
        $user = DB::select('select * from diskon_d');
        $userss = DB::select('select * from produk');
        $usersss = DB::select('select * from diskon_d');
        return view('admin/order_d', ['title' => 'ORDER DETAIL','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'data' => $user,'datas' => $userss,'datass' => $usersss]);
    }
    public function add_order_d(Request $request){
        DB::insert('INSERT INTO order_d (id_order_h,id_produk,jumlah,harga,diskon) VALUES(?,?,?,?,?)',[$request->id_order_h,$request->id_produk,$request->jumlah,0,$request->diskon]);
        return redirect(route('order_d'));
    }
    public function delete_order_d(Request $request){
        DB::delete('DELETE FROM order_d WHERE id=?',[$request->del]);
        return redirect(route('order_d'));
    }
    public function edit_order_d(Request $request){
        DB::UPDATE('UPDATE order_d SET id_order_h=?,id_produk=?,jumlah=?,harga=?,diskon=? WHERE id=?',[$request->id_order_h,$request->id_produk,$request->jumlah,$request->harga,$request->diskon,$request->del]);
        return redirect(route('order_d'));
    }
    
}
