<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Rules\UniqueIfUnverified;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function SendOtp(Request $request)
    {
        $otp = rand(100000, 999999);
        $request->session()->put('otp', $otp);
        $emailData = [
            'otp' => $otp,
            'email' => $request->session()->get('user_email')
        ];
        $status = Mail::send('emails.otp', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'])->subject('OTP Verification');
        });

        echo var_dump($status);
        // echo $status = $status->statusCode();
        // die;
        // return redirect()->route('user.otp');
        $expirationTime = Carbon::now()->addMinutes(1);
        $acesstoken = Str::random(10);
        $session = Session::getFacadeRoot();
        $session->put('acesstoken', $acesstoken, $expirationTime);
        $url = '/otp/' . $acesstoken;
        return redirect($url);
    }

    public function showOtpForm($acesstoken)
    {

        if ($acesstoken == Session::get('acesstoken')) {
            return view('frontend/otp');
        } else {
            return redirect()->back();
        }

    }
    public function verifyOtp(Request $request, $acesstoken)
    {

        if ($acesstoken == Session::get('acesstoken')) {
            $request->validate([
                'otp' => [
                    'required',
                    'numeric',
                    'digits:6',
                    function ($attribute, $value, $fail) use ($request) {
                        // Check if the OTP matches with the value in the session
                        if ($value != $request->session()->get('otp')) {
                            $fail('The ' . $attribute . ' is invalid.');
                        }
                    }
                ],
            ]);
            $request->session()->forget('acesstoken');


            $email = Session::get('user_email');
            // $otpGenereted = Session::get('otp');
            $user = User::where('email', $email)->first();
            session()->forget(['user_email']);

            if (!is_null($user)) {

                $user->email_verified_at = now(); // clear OTP after successful verification
                $user->save();
                $request->session()->flash('success', 'Email verification successful. You can now login to your account.');
                return redirect(route('user.login'));
            } else {
                echo 'no user found';
                $request->session()->flash('error', 'NO user found. Please try again.');
                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }


    }

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $unverified = User::where('email', '=', $request['email'])->where('email_verified_at', '=', null)->first();
        // if (!is_null($unverified)) {
        //     $request->session()->put('user_email', $request['email']);
        //     session()->forget(['new_password']);
        //     return redirect()->route('user.SendOtp');
        // }

        $needverified = false;
        $validator = $request->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'dob' => 'required|date|before:tomorrow',
            'mobile_no' => 'required|numeric|digits:10',
            'email' => [
                'required',
                'email',
                'max:60',
                function ($attribute, $value, $fail) use ($request, &$needverified) {
                    $unverified = User::where('email', '=', $request['email'])->first();
                    if (!is_null($unverified)) {
                        if ($unverified->email_verified_at == null) {
                            $needverified = true;
                        } else {
                            $fail('The ' . $attribute . ' is already taken.');
                        }
                    }
                }
            ],
            'password' => 'required|min:7|max:14',
            'confirmation_password' => 'required|same:password',
        ]);

        if ($needverified) {
            $user = User::where('email', '=', $request['email'])->first();
        } else {

            $user = new User;
        }

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->dob = $request['dob'];
        $user->mobile_no = $request['mobile_no'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        $request->session()->put('user_email', $request['email']);
        return redirect()->route('user.SendOtp');
    }




    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprofile(Request $request)
    {
        $user_id = $request->session()->get('user_id', null);
        $user = User::find($user_id);

        $data = compact('user');
        return view('frontend/register')->with($data);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request)
    {
        $validator = $request->validate(
            [
                'first_name' => 'required|max:20',
                'last_name' => 'required|max:20',
                'dob' => 'required|date|before:tomorrow',
                'mobile_no' => 'required|numeric|digits:10',
            ]
        );

        $user_id = $request->session()->get('user_id', null);
        $user = User::find($user_id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->dob = $request['dob'];
        $user->mobile_no = $request['mobile_no'];
        $user->save();

        $request->session()->flash('success', 'Profile update successful');
        return redirect(route('home'));

    }


    public function changepassword(Request $request)
    {
        $validator = $request->validate(
            [
                'current_password' => 'required|min:7|max:14',
                'new_password' => 'required|min:7|max:14|different:current_password',
                'confirm_new_password' => 'required|min:7|max:14|same:new_password',
            ]
        );
        $id = $request->session()->get('user_id', null);
        $user = User::find($id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $request->session()->flash('success', 'Password Changed Successful');
            return redirect(route('home'));
        } else {
            $request->session()->flash('alert', 'Current Password Not Match');
            return redirect(route('user.changepassword'));
        }
    }

    public function verifyforgotOtp(Request $request, $acesstoken)
    {
        if ($acesstoken == Session::get('acesstoken')) {
            $request->validate([
                'otp' => [
                    'required',
                    'numeric',
                    'digits:6',
                    function ($attribute, $value, $fail) use ($request) {
                        // Check if the OTP matches with the value in the session
                        if ($value != $request->session()->get('otp')) {
                            $fail('The ' . $attribute . ' is invalid.');
                        }
                    }
                ],
            ]);
            $request->session()->forget('acesstoken');
            $email = Session::get('user_email');
            $user = User::where('email', $email)->first();
            session()->forget(['user_email']);
            $user->password = Hash::make(Session::get('new_password'));
            $user->save();
            session()->forget(['user_email', 'new_password']);
            $request->session()->flash('success', 'Password Reset Successful');
            return redirect(route('home'));
        } else {

            return redirect()->back();
        }

    }

    public function forgotpassword(Request $request)
    {
        $validator = $request->validate(
            [
                'email' => 'required|exists:users,email|max:60',
                'new_password' => 'required|min:7|max:14|different:current_password',
                'confirm_new_password' => 'required|min:7|max:14|same:new_password',
            ]
        );

        $request->session()->put('new_password', $request->new_password);
        $request->session()->put('user_email', $request['email']);
        return redirect()->route('user.SendOtp');
    }


    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function login(Request $request)
    {
        $validator = $request->validate(
            [
                'email' => [
                    'required',
                    'exists:users,email',
                    'max:60'
                ],
                'password' => [
                    'required',
                    'min:7',
                    'max:14',
                    function ($attribute, $value, $fail) use ($request) {
                        $user = User::where(['email' => $request['email']])->first();
                        if (!Hash::check($value, $user->password)) {
                            $fail('The ' . $attribute . ' is invalid.');
                        }
                    }
                ]
            ],
            [
                'email.exists' => 'No such Email found, Please signup first'
            ]
        );

        $user = User::where(['email' => $request['email']])->first();
        if ($user->email_verified_at == null) {
            $request->session()->flash('alert', "Your registration process is not complete. Please complete it by verifying your email.");
            $request->session()->put('user_email', $request['email']);
            return redirect()->route('user.SendOtp');
        }
        $request->session()->put('first_name', $user->first_name);
        $request->session()->put('user_id', $user->id);
        $request->session()->flash('success', 'login Successful');
        return redirect(route('home'));



    }

    public function logout(Request $request)
    {
        // session()->forget(['user_name','user_id']);
        session()->flush();
        return redirect(route('home'));
    }
}