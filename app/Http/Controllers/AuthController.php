<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;
use App\Siswa;
use App\Histori;
use Carbon\Carbon;
use DB;

class AuthController extends Controller
{
    public function login(Request $request){

        $user = User::where('email', $request['email'])->first();
        $siswa = Siswa::where('user_id',$user->id)->first();
        $token = str_random(20);
        $valid = $this->validasiToken($request['email']);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'message'=> 'Email or password is wrong',
                    'status_code'=> 500
                ]
            ]);
        }

         if (!User::where('email', $request['email'])->exists()) {
        	return response()->json([
                'data' => [],
                'meta' => [
                    'message'=>"Canot find email",
                    'status_code'=> 404,
                ]
            ]);
        }if (!Hash::check($request['password'], User::where('email', $request['email'])->first()->makeVisible('password')->password)) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'message'=>"Combination of email and password is wrong",
                    'status_code'=> 404,
                ]
            ]);
        }if ($user->level !== 3 ) {
            return response()->json([
                'data' => null,
                'meta' => [
                    'message'=>"Anda Tidak Berhak Mengakses Halaman Ini",
                    'status_code'=> 406,
                ]
            ]);

        }if($valid==1){
            $this->updateToken($token,$request["email"]);
            return response()->json([
                'data' => [
                    'nama_lengkap' => $user->name,
                    'nis' => $siswa['NIS'],
                    'jk' => $siswa['jenis_kelamin'],
                    'kelas' => $siswa['kelas'],
                    'jurusan' => $siswa['jurusan'],
                    'semester' => $siswa['semester'],
                    'thn_angkatan' => $siswa['thn_angkatan'],
                    'email' => $user->email,
                    'password' =>$user->password,
                    'token'=>$token,
                    'avatar' => $user['avatar'],
                    'id' => $user->id
                ],
                'meta' => [
                    'message'=>"success",
                    'status_code'=> 200,
                ]
            ]);
           }

        else{
            return response()->json([
                'data' => null,
                'meta' => [
                    'message'=>"Anda Masih Login !",
                    'status_code'=> 400,
                ]
            ]);
        }


    }
    public function getMapelUjian(Request $request){
        $jurusan = $request->jurusan;
        $jenis_ujian = $request->jenis_ujian;
        $semester = $request->semester;
        $time = Carbon::now();
        $time->toDateTimeString();

        $dataMapel = DB::table('matapelajaran')
        ->where('ujian.jurusan', $jurusan)
        ->where('ujian.jenis_ujian', $jenis_ujian)
        ->where('ujian.semester', $semester)
        ->where('ujian.waktu_mulai', '<=', $time)
        ->where('ujian.waktu_selesai', '>=', $time)
        ->join('ujian', 'matapelajaran.kd_mapel', '=', 'ujian.kd_mapel')
        ->select('ujian.*', 'matapelajaran.nama_pelajaran')
        ->get();

        if(count($dataMapel)>0){
            $data = array('status'=>'200','data'=>$dataMapel, 'message'=>'Ujian tersedia!');
            return response()->json($data);
        } else {
            return response()->json(array('status'=>'400', 'data'=>'NO DATA', 'message'=>'Ujian tidak tersedia'));
        }

    }

    public function getSoal(Request $request){
        $kd_mapel = $request->kd_mapel;
        $jum_soal = $request->jum_soal;
        $jenis_ujian = $request->jenis_ujian;
        $jurusan = $request->jurusan;

        $dataSoal = DB::table('soal')
        ->where('kd_mapel', $kd_mapel)
        ->where('ujian', $jenis_ujian)
        ->inRandomOrder()
        ->limit($jum_soal)
        ->get()
        ->toArray();
        $no=1;
        if(count($dataSoal)>0){
            foreach($dataSoal as $soal){
                  $datas[] = (object) array_merge((array) $soal, array('nomor' => $no));
              $no++;
            }
            $data = array('status'=>'200','data'=>$datas, 'message'=>'Soal Tersedia!');

          return response()->json($data);
        } else {
            return response()->json(array('status'=>'400', 'data'=>'NO DATA', 'message'=>'Soal tidak tersedia!'));
        }
    }

    public function getRiwayat(Request $request){
        $NIS = $request->nis;
        $jenis_ujian = $request->jenis_ujian;

        $dataRiwayat = DB::table('matapelajaran')
        ->where('histori_ujian.NIS', $NIS)
        ->where('histori_ujian.jenis_ujian', $jenis_ujian)
        ->join('histori_ujian', 'matapelajaran.kd_mapel', '=', 'histori_ujian.kd_mapel')
        ->select('histori_ujian.*', 'matapelajaran.nama_pelajaran', 'matapelajaran.kelas')
        ->get();

            if(count($dataRiwayat)>0){
                $data = array('status'=>'200','data'=>$dataRiwayat, 'message'=>'Riwayat ujian tersedia!');
              return response()->json($data);
            } else {
                return response()->json(array('status'=>'400', 'data'=>'NO DATA', 'message'=>'Riwayat ujian tidak tersedia!'));
            }
        }

    public function getNilai(Request $request){
        $jum_benar = $request->jum_benar;
        $jum_soal = $request->jum_soals;
        $NIS = $request->nis;
        $semester = $request->semesters;
        $kelas = $request->kls;
        $jenis_ujian = $request->jenis_ujians;
        $kd_mapel = $request->kd_mapels;
        $tanggal = Carbon::now();
        $tanggal->toDateString();
        $time = $request->time;

        $nilai = ($jum_benar/$jum_soal)*100;

        $histori = array(
            'NIS'=>$NIS,
            'kd_mapel'=>$kd_mapel,
            'jenis_ujian'=>$jenis_ujian,
            'nilai'=>$nilai,
            'waktu'=>$time,
            'tanggal'=>$tanggal,
            'semester'=>$semester,
            'kelas'=>$kelas
        );

        Histori::create($histori);
        $respon = array('status'=>'200','Data'=>'NO DATA','message'=>'Sukses!');
        return response()->json($respon);
        }

        public function resetPassword(Request $request){
            $email = $request->email;
            $password = $request->password;

            if(User::where('email',$email)->where('level',3)->exists()){
                $reset = ['password'=>Hash::make($password)];
                User::where('email',$email)->update($reset);

                $respon = array('status'=>200,'data'=>'No Data', 'messages'=>'Update Sukses!');
                return response()->json($respon);
            } else {
                $respon = array('status'=>400,'data'=>'No Data', 'messages'=>'Email Tidak Terdaftar!');
                return response()->json($respon);
            }
        }

        public function validasiToken($email){
            $ser = User::where('email',$email)->get();
            // dd($ser);

            foreach($ser as $sr){
                if(!empty($sr->remember_token)){
                    return $responseData = 0;
                } else {
                    return $responseData = 1;
                }
            }

        }



        public function getLogouts(Request $request){
            $email = $request->email;
            $token = $request->token;

                $this->updateToken('',$email);
                $responseData = $this->responses('200', 'NO DATA', 'Logout Berhasil!');


            return json_encode($responseData);
        }


        public function updateToken($token,$email){
            $ins =  DB::table('users')
            ->where('email',$email)
            ->update(['remember_token'=>$token]);
            return $ins;
        }


        public function responses($status,$data,$message){
            return array('status'=>$status,'data'=>$data,'message'=>$message);
        }



}
