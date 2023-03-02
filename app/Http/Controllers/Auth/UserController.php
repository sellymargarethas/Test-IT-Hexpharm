<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Hash;
date_default_timezone_set("Asia/Bangkok");
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function index(Request $request){
        $users = DB::select('select * from matkul');
        $list = DB::select('select * from list_matkul WHERE id_user=?',[$request->session()->get('id')]);
        $ada=array();
        $adas=array();
        $tidak=array();
        foreach($users as $a){
          $check = DB::select('select * from list_matkul WHERE id_user=? AND id_matkul=?',[$request->session()->get('id'),$a->id]);
          if(isset($check[0])){
            $users = DB::select('select ujian.id AS id,ujian.tanggal AS tanggal,ujian.durasi AS durasi,matkul.nama AS nama_matkul,ujian.nama AS nama_ujian  from ujian JOIN matkul ON ujian.id_matkul = matkul.id WHERE matkul.id = ? ',[$check[0]->id_matkul]);
          foreach($users as $b){
              array_push($ada,$b);
            }
          }
        }
        $users = DB::select('select * from pengumuman');
        return view('admin/home', ['title' => 'PENGUMUMAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'ada' => $ada,'tidak' => $tidak]);
    }
    
    public function matkul(Request $request){
        $users = DB::select('select * from matkul');
        $list = DB::select('select * from list_matkul WHERE id_user=?',[$request->session()->get('id')]);
        $ada=array();
        $tidak=array();
        foreach($users as $a){
          $check = DB::select('select * from list_matkul WHERE id_user=? AND id_matkul=?',[$request->session()->get('id'),$a->id]);
          if(isset($check[0])){
            array_push($ada,$a);
          }
          else{
            array_push($tidak,$a);
            
          }
        }
        return view('user/matkul', ['title' => 'MATA KULIAH','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'ada' => $ada,'tidak' => $tidak]);
    }
    public function enroll_matkuls(Request $request){
        DB::delete('DELETE FROM list_matkul WHERE id_matkul=? AND id_user=?',[$request->del,$request->session()->get('id')]);
        return redirect(route('matkuls'));
    }
    public function enroll_matkul(Request $request){
        DB::insert('INSERT INTO list_matkul (id_matkul,id_user) VALUES(?,?)',[$request->del,$request->session()->get('id')]);
        return redirect(route('matkuls'));
    }
    public function ujian(Request $request){
        $users = DB::select('select * from matkul');
        $list = DB::select('select * from list_matkul WHERE id_user=?',[$request->session()->get('id')]);
        $ada=array();
        $adas=array();
        $tidak=array();
        foreach($users as $a){
          $check = DB::select('select * from list_matkul WHERE id_user=? AND id_matkul=?',[$request->session()->get('id'),$a->id]);
          if(isset($check[0])){
            $users = DB::select('select ujian.id AS id,ujian.tanggal AS tanggal,ujian.durasi AS durasi,matkul.nama AS nama_matkul,ujian.nama AS nama_ujian  from ujian JOIN matkul ON ujian.id_matkul = matkul.id WHERE matkul.id = ?',[$check[0]->id_matkul]);
            foreach($users as $b){
              array_push($ada,$b);
            }
          }
        }
        foreach($ada as $a){
          $check = DB::select('select  ujian.id AS id,ujian.nama AS nama_ujian,ujian_kerja.status,ujian_kerja.jam_mulai AS jam_mulai,ujian_kerja.jam_selesai AS jam_selesai,matkul.nama AS nama_matkul,  ujian_kerja.jawaban, ujian_kerja.feedback,ujian.tanggal AS tanggal,ujian.durasi AS durasi from ujian_kerja JOIN ujian ON ujian.id = ujian_kerja.id_ujian JOIN users ON users.id = ujian_kerja.id_user JOIN matkul ON ujian.id_matkul = matkul.id WHERE id_user=? AND id_ujian=?',[$request->session()->get('id'),$a->id]);
          if(isset($check[0])){
            array_push($adas,$check[0]);
          }
          else{
            array_push($tidak,$a);
          }
        }
        return view('user/ujian', ['title' => 'UJIAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'ada' => $adas,'tidak' => $tidak]);
    }
    public function kerjakan(Request $request){
      $p=0;
       $a = DB::select("SELECT COUNT(*) as jumlah FROM soal_pg WHERE id_ujian=?",[$request->id_ujian]);
       $b = DB::select("SELECT COUNT(*) as jumlah FROM soal_isian WHERE id_ujian=?",[$request->id_ujian]);
       $c = $a[0]->jumlah + $b[0]->jumlah;
      if($request->get('z')!==null){
        
      }
      else  if($request->get('jawaban')!="$%^"){
          $a = DB::select("SELECT * FROM ujian_kerja WHERE id_ujian=?",[$request->id_ujian]); 
          $data=explode(",",$a[0]->jawaban);
          $data[$request->no-2]= $request->jawaban;
          $p = DB::select("SELECT COUNT(*) as jumlah FROM soal_pg WHERE id_ujian=?",[$request->del]);
           $b = DB::select("SELECT COUNT(*) as jumlah FROM soal_isian WHERE id_ujian=?",[$request->del]);
           $c = $p[0]->jumlah + $b[0]->jumlah;
           $str="";
            for($i=0;$i<$c;$i++){
              if($data[$i]=="none" && $i!=$c-1){
                $p=1;
              }
              $str.=$data[$i];
              if($i!=$c-1){
                $str.=",";
              }
            }
          DB::update("UPDATE ujian_kerja SET jawaban=? WHERE id_ujian=?",[$str,$request->id_ujian]);
         
      if($request->no>$c){
          DB::update("UPDATE ujian_kerja SET status=1 WHERE id_ujian=?",[$request->id_ujian]);
          return redirect(route('ujians'));
      }
       }
      if($request->no!=$c){
        $tipe="Next";
      }
      else{
        $tipe="Submit";
      }
        $data=array();
        $tipes="";
        $check = DB::select('select  * FROM soal_pg WHERE id_ujian=? AND no=?',[$request->del,$request->no]);
        if(isset($check[0])){
          $tipes="pg";
          array_push($data,$check[0]);
        }
        else{
          $tipes="isian";
          $check = DB::select('select  * FROM soal_isian WHERE id_ujian=? AND no=?',[$request->del,$request->no]);
          array_push($data,$check[0]);
        }
        return view('user/kerjakan', ['p' => $p,'del' => $request->del,'title' => 'SOAL NO'.$request->no,'tipes' => $tipes,'tipe' => $tipe,'name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data' => $data]);
    }
    public function add_soal_isian(Request $request){
        $a= strtotime($request->jam)+time();
        
       $p = DB::select("SELECT COUNT(*) as jumlah FROM soal_pg WHERE id_ujian=?",[$request->del]);
       $b = DB::select("SELECT COUNT(*) as jumlah FROM soal_isian WHERE id_ujian=?",[$request->del]);
       $c = $p[0]->jumlah + $b[0]->jumlah;
       $str="";
        for($i=0;$i<$c;$i++){
          $str.="none";
          if($i!=$c-1){
            $str.=",";
          }
        }
        print_r($str);
       DB::insert('INSERT ujian_kerja (id_ujian,id_user,feedback,jawaban,jam_mulai,jam_selesai,status) VALUES (?,?,?,?,?,?,?)', [$request->del,$request->session()->get('id'),"-",$str,strftime("%X",time()),strftime("%X",$a),"0"]);
       return redirect(route('ujians'));
    }
    public function feedback(Request $request){
        DB::UPDATE('UPDATE ujian_kerja SET feedback=? WHERE id_ujian=?',[$request->feedback,$request->del]);
        return redirect(route('ujians'));
    }
    public function ujian_kerja(Request $request){
        $file = $request->file('jawaban');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        DB::insert('INSERT INTO ujian_kerja (id_ujian,id_user,feedback,jawaban) VALUES(?,?,?,?)',[$request->del,$request->session()->get('id'),$request->feedback,$file->getClientOriginalName()]);
        return redirect(route('ujians'));
    }
    
    
    public function tugas(Request $request){
        $users = DB::select('select * from matkul');
        $list = DB::select('select * from list_matkul WHERE id_user=?',[$request->session()->get('id')]);
        $ada=array();
        $adas=array();
        $tidak=array();
        foreach($users as $a){
          $check = DB::select('select * from list_matkul WHERE id_user=? AND id_matkul=?',[$request->session()->get('id'),$a->id]);
          if(isset($check[0])){
            $users = DB::select('select tugas.id AS id,matkul.nama AS nama_matkul,tugas.nama AS nama_tugas, tugas.soal AS soal from tugas JOIN matkul ON tugas.id_matkul = matkul.id WHERE matkul.id = ?',[$check[0]->id_matkul]);
            foreach($users as $b){
              array_push($ada,$b);
            }
          }
        }
        foreach($ada as $a){
          $check = DB::select('select  tugas.id AS id,tugas.nama AS nama_tugas,matkul.nama AS nama_matkul, tugas.soal AS soal, tugas_kerja.jawaban from tugas_kerja JOIN tugas ON tugas.id = tugas_kerja.id_tugas JOIN users ON users.id = tugas_kerja.id_user JOIN matkul ON tugas.id_matkul = matkul.id WHERE id_user=? AND id_tugas=?',[$request->session()->get('id'),$a->id]);
          if(isset($check[0])){
            array_push($adas,$check[0]);
          }
          else{
            array_push($tidak,$a);
          }
        }
        return view('user/tugas', ['title' => 'tugas','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'ada' => $adas,'tidak' => $tidak]);
    }
    public function tugas_kerja(Request $request){
        $file = $request->file('jawaban');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        DB::insert('INSERT INTO tugas_kerja (id_tugas,id_user,jawaban) VALUES(?,?,?)',[$request->del,$request->session()->get('id'),$file->getClientOriginalName()]);
        return redirect(route('tugass'));
    }
    
}
