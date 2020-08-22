<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * __construct add middlewares
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'update_avatar'
        ]]);
    }
    /**
     * update avatar of user
     *
     * @param  mixed $request
     * @return void
     */
    public function update_avatar(Request $request)
    {
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
            $user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }
    /**
     * login user
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $remember = null;
        if($request->input('remember')==="true"||$request->input('remember')==="false"){
            if($request->input('remember')==="true"){
                $remember=true;
            }
            if($request->input('remember')==="false"){
                $remember=false;
            }
        }
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            if (auth()->attempt(array('email' => $request->input('email'),
            'password' => $request->input('password')),$remember))
            {
                return response()->json('success');
            }
            return response()->json([
                'error' => [
                    'email' => 'Les identifiants sont incorrects.'
                ]
            ]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
    /**
     * register new user
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:10','min:2','regex:/^\S*$/u','regex:/^[a-zA-Z ]+$/'],
            'middlename' => ['max:10','regex:/^\S*$/u','regex:/^[a-zA-Z ]+$/'],
            'lastname' => ['required', 'string', 'max:10','min:2','regex:/^\S*$/u','regex:/^[a-zA-Z ]+$/'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ],[
            'firstname.required' => 'Le champ Nom est obligatoire.',
            'lastname.required' => 'Le champ Nom de famille est obligatoire.',
            'firstname.regex' => 'Le champ Nom est invalide.',
            'lastname.regex' => 'Le champ Nom de famille est invalide.',
            'firstname.min' => 'Le champ Nom doit contenir au moin 2 lettres.',
            'lastname.min' => 'Le champ Nom de famille doit contenir au moin 2 lettres.',
            'firstname.max' => 'Le champ Nom ne peux pas depasser 10 lettres.',
            'lastname.max' => 'Le champ Nom de famille ne peux pas depasser 10 lettres.',
            'email.email' => 'Le format de votre email est invalide.',
            'password.confirmed' => 'Les deux mots de passes ne se corréspondent pas.',
            'password.min' => 'Votre mot de passe doit au moin contenir 5 lettres.'
        ]);
        if($request->input('cgu') == "true"){
            if ($validator->passes()) {
                $user = User::create([
                    'firstname' => $request->input('firstname'),
                    'middlename' => $request->input('middlename'),
                    'lastname' => $request->input('lastname'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
                Auth::login($user);
                $user->sendEmailVerificationNotification();
                return response()->json('success');
            }
             return response()->json(['error'=>$validator->errors()->all()]);
        } else {
            return response()->json([
                'error' => [
                    'cgu' => 'Vous devez accepter les conditions générales d\'utilisation.'
                ]
            ]);
        }

    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if($validator->passes()){
            $user = User::where('email', '=', $request->input('email'))->first();

            if($user === null) {
                return response()->json([
                    'error' => [
                        'email' => 'Votre email est introuvable.'
                    ]
                ]);
            }

            DB::table('password_resets')->insert([
                'email' => $request->input('email'),
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();

            $user->sendPasswordResetNotification($tokenData->token);
            return response()->json('success');
           
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function resetPasswordConfirm(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required'
            ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
    // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return redirect()->route('welcome');

        $user = User::where('email', $tokenData->email)->first();
    // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
    //Hash and update the new password
        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        return redirect()->route('welcome');

    }
}
