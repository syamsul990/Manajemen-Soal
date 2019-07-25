<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendPasswordGuru;
use App\User;
use App\Guru;
use Storage;
use Avatar;
use App\Ujian;
use App\Soal;
class GuruController extends Controller
{
    public function index(Request $request)
    {

        $data_guru = \App\Guru::all();
        // dd($data_guru);
        return view('/admin/guru/index',compact('data_guru'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        //randmon password
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < 5; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
        //  $data['user_id']= auth()->id();
         $data['password'] = $randomString;
         $data['send_password'] = $randomString;
         $data['password'] = Hash::make($data['password']);
         $data['level'] = '2';
         $data_guru = Guru::create($data);

         $user = User::create([
             'name' => $data['nama_lengkap'],
             'email' => $data['email'],
             'password' => $data['password'],
             'level' => $data['level'],
             'avatar' => 'avatar.png',
         ]);
        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$user->_id.'/avatar.png', (string) $avatar);

         $user->send_password_guru = $randomString;
         $user->notify(new SendPasswordGuru($user));
         return redirect('/home')->with('sukses','Data Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        $data_guru = \App\Guru::find($id);
        return view('/admin/guru/edit',compact('data_guru'));
    }

    public function update(Request $request,$id)
    {
        $data_guru = \App\Guru::find($id);
        $data_guru->update($request->all());
        return redirect('/admin/guru')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $data_guru = \App\Guru::find($id);
        $data_guru->delete($data_guru);

        return redirect('/admin/guru')->with('sukses','Data Berhasil Dihapus');
    }

    public function soal(Request $request){

        if($request->has('jum_soal')){
            \App\Ujian::create($request->all());
            $jum_soal = $request->jum_soal;
            return view('guru/input_soal', compact('jum_soal'));
        }
        return view('guru/tambah_soal');
    }

    public function inputSoal(Request $request){

            $input = $request->all();
            for($i = 1; $i <= $input['jum_soal']; $i++){
                $soal = [
                    'soal' => $input['soal' . $i],
                    'jawaban1' => $input['jawaban1-soal' . $i],
                    'jawaban2'=> $input['jawaban2-soal' . $i],
                    'jawaban3' => $input['jawaban3-soal' . $i],
                    'jawaban4'=> $input['jawaban4-soal' . $i],
                    'jawaban_benar' => $input['jawaban_benar-soal' . $i]
                ];
                Soal::create($soal);
            }

            return view('/home');

=======

class GuruController extends Controller
{
    public function index()
    {
        $guru = \App\Guru::all();
        
        return view('guru/index');
    }

    public function soal(Request $request){
        return view('guru/soal');
    }

    public function inputSoal(Request $request){
        if($request->has('jum_soal')){
            $jum_soal = $request->jum_soal;

            return view('guru/input_soal', compact('jum_soal'));
        }
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }
}
