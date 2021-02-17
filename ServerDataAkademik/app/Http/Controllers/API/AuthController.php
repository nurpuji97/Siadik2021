<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * kelas Api/AuthController
 * 
 * kelas ini untuk Autentikasi RestAPI laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */
class AuthController extends Controller
{

    /**
     * fungsi untuk login Auth sistem
     * 
     * @param Request $request valid Request objek
     * @throws ValidationException if ValidationException with Messages email
     * @return json @ : success, user : data user, token : kode token 
     */
    public function login(Request $request)
    {
        // check user
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect. '],
            ]);
        }

        // token
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Success',
            'user' => $user,
            'token' => $token
        ], 200);
    }


    /**
     * fungsi untuk logout Auth sistem
     * 
     * @param Request $request valid Request objek
     * @return json message : berhasil logout. keluar dari sistem 
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        // delete user
        $user->currentAccessToken()->delete();

        return Response()->json([
            'message' => 'Berhasil Logout'
        ], 200);
    }
}
