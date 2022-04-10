<?php



namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\students;
use Illuminate\Support\Facades\Auth;
class studentsAuthController extends Controller
{
    /**
     * Display students login view
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::guard('students')->check()) {
            return redirect()->route('students.dashboard');
        } else {
            return view('auth.studentsLogin');
        }
    }
    public function registration()
    {
        return view('auth.students_registration');
    }
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("/students/dashboard")->withSuccess('have signed-in');
    }
 
 
    public function create(array $data)
    {
      return students::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'username' => $data['username'],
        'surname' => $data['surname'],
        'telephone' => $data['telephone'],
        'nif' => $data['nif'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    /**
     * Handle an incoming admin authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        
        $this->validate($request, [
            'username' => 'required',
            'pass' => 'required',
        ]);

        if(auth()->guard('students')->attempt([
            'username' => $request->username,
            'password' => $request->pass,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/students/dashboard'));
        } else {
            return redirect()->back()->withError('Credentials '.$request->username.' -- '.bcrypt($request->pass).' doesn\'t match.');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('students')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
