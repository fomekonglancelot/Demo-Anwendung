<?php

namespace App\Http\Controllers;

use App\DTO\Converter;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::Latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Converter $converter)
    {

        //validate Data
        $data = $this->validateForm($request);

        //determined Country
        $country = $converter->determinedCountry($request->get('currency'));

        // transform Data
        $data['height'] = $converter->numberFormat($country, $request->get('height') ) . $request->get('unit');
        $data['pay'] = $converter->numberFormat($country, $request->get('pay') ) . $converter->currency($country) ;
        $data['password'] = bcrypt($request->get('password'));

        //save new User
        User::create($data);

        // redirect to the Route index
        return redirect()->route('users.index')->with('message', 'User created Successfully');
    }

    public function validateForm(Request $request): array
    {
       return $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
            'height'=>'required|numeric',
            'pay'=>'required|numeric',
        ]);
    }
}
