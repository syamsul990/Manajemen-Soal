<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendPasswordGuru;
use App\User;
use App\Guru;
use Storage;
use Avatar;
use App\Ujian;
use App\Soal;
use App\Mapel;
use App\Notifications\ChangePassword;
use Validator;
use Illuminate\Support\Facades\DB;
use File;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $data_guru = DB::table('users')
        ->join('guru', 'users.id', '=', 'guru.user_id')
        ->select('users.*', 'guru.*')
        ->paginate(10);

        // dd($data_guru);
        return view('/admin/guru/index',compact('data_guru'));
    }

    public function multimedia(Request $request)
    {
        $data_guru = DB::table('users')
        ->join('guru', 'users.id', '=', 'guru.user_id')
        ->select('users.*', 'guru.*')
        ->where('guru.jurusan', 'Multimedia')
        ->paginate(10);
        return view('admin.guru.multimedia',compact('data_guru'));
    }
    public function pemasaran(Request $request)
    {
        $data_guru = DB::table('users')
        ->join('guru', 'users.id', '=', 'guru.user_id')
        ->select('users.*', 'guru.*')
        ->where('guru.jurusan', 'Pemasaran')
        ->paginate(10);
        return view('admin.guru.pemasaran',compact('data_guru'));
    }
    public function akuntansi(Request $request)
    {
        $data_guru = DB::table('users')
        ->join('guru', 'users.id', '=', 'guru.user_id')
        ->select('users.*', 'guru.*')
        ->where('guru.jurusan', 'Akuntansi')
        ->paginate(10);
        return view('admin.guru.Akuntansi',compact('data_guru'));
    }
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $data = $request->all() ;
        //randmon password
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < 5; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         $data['password'] = $randomString;
         $data['send_password'] = $randomString;
         $data['password'] = Hash::make($data['password']);
         $data['level'] = '2';

         $user = User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => $data['password'],
             'level' => $data['level'],
             'avatar' => 'avatar.png',
         ]);
         $data['user_id'] = $user->id;
         $data = Guru::create($data);
         $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
         Storage::put('public/avatars/'.$user->id.'/avatar.png', (string) $avatar);

         $user->send_password_guru = $randomString;
         $user->notify(new SendPasswordGuru($user));
         return redirect('/home')->with('sukses','Data Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        $data_guru = \App\Guru::find($id);
        $user = User::find($data_guru->user_id);
        return view('/admin/guru/edit',compact('data_guru','user'));
    }

    public function update(Request $request,$id)
    {
        $data_guru = \App\Guru::find($id);
        $data_guru->update($request->all());
        $user = User::find($data_guru->user_id);
        $user->update(['name' => $request->name]);
        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$user->id.'/avatar.png', (string) $avatar);
        return redirect('/admin/guru');
    }


    public function delete($id)
    {
        $guru = Guru::find($id);
        $user = User::find($guru->user_id);
        $guru->delete();
        $user->delete ();
        return redirect('/admin/guru');
    }

    public function soal(Request $request){
        $mapel = Mapel::get();
        if($request->has('jum_soal') && $request->has('kd_mapel')){
            \App\Ujian::create($request->all());
            $jum_soal = $request->jum_soal;
            $kd_mapel =  $request->kd_mapel;
            return view('guru/input_soal', compact('jum_soal', 'kd_mapel'));
        }
        return view('guru/tambah_soal', compact('mapel'));
    }

    public function inputSoal(Request $request){

            $input = $request->all();
            for($i = 1; $i <= $input['jum_soal']; $i++){

                $soal = [
                    'ujian' =>$input['ujian'],
                    'soal' => $input['soal' . $i],
                    'jawaban1' => $input['jawaban1-soal' . $i],
                    'jawaban2'=> $input['jawaban2-soal' . $i],
                    'jawaban3' => $input['jawaban3-soal' . $i],
                    'jawaban4'=> $input['jawaban4-soal' . $i],
                    'jawaban_benar' => $input['jawaban_benar-soal' . $i]
                ];
                $soal['kd_mapel'] = $request->kd_mapel;
                if($request->hasFile("image$i")){
                    $file = $request->file("image$i");
                    $name = time() . $file->getClientOriginalName();
                    $path = "public/soal/$name";
                    Storage::put($path, File::get($file->getRealPath()));
                    $soal['image'] = $name;
                }
                Soal::create($soal);
            }
            return view('/dashboard');
    }

    public function ubah_password($id)
    {
        $user = User::find($id);
        return view('/layouts/ubah_password', compact('user'));
    }

    public function resetPassword(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => 'required'
        ]);

        if ($validator->fails()) {
            return view('/home')->withErrors(['password_lama'=>'Semua Inputan Harus di Isi !']);
        }

        if ($request->password_baru !== $request->konfirmasi_password ){

            return view('/home')->withErrors(['konfirmasi_password'=>'Password Tidak Sesuai']);
        }

        if (!Hash::check($request->password_lama, User::find($id)->makeVisible('password')->password)) {
            return view('/home')->withErrors(['password_lama'=>'Password Lama Anda Salah!']);
        }
        $user =  User::find($id);
        $user->password=Hash::make($request->password_baru);
        $user->save();
        $user->change_password = ($request->password_baru);
        $user->notify(new ChangePassword($user));
        return redirect('/home');
    }
}
