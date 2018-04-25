<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserUpdateRequest;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Show the user main view
     *
     * @return Response
     */
    public function index()
    {
        return view('user.main', []);
    }

    /**
     * Show the user add view with a form to create user
     * [C]RUD
     *
     * @return Response
     */
    public function add()
    {
        App::setLocale('es');

        $data['countries'] = Country::orderBy('langES', 'ASC')->get(['alpha2', 'langES']);
        $data['userCountry'] = $this->getCountry();

        return view('user.add', $data);
    }

    /**
     * Add user to database and return View to index
     * [C]RUD
     *
     * @return Response
     */
    public function submit(UserAddRequest $request)
    {
        // create new user
        $user = new User();
        $user->username  = $request->get('username');
        $user->name      = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->password  = $request->get('password');
        $user->country   = $request->get('country');
        $user->description = $request->get('description');
        $user->email     = $request->get('email');
        $user->save();

        // redirect to home with a feedback depending on user ID
        if ($user && $user->id) {
            return redirect('/')->with('message', 'User was successful added!');
        } else {
            return redirect('/')->with('error', 'Something was wrong on create user!');
        }

;
    }

    /**
     * Show the user edit view with a form to edit user
     * CR[U]D
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['countries'] = Country::orderBy('langES', 'ASC')->get(['alpha2', 'langES']);
        $data['user']      = User::find($id);

        return view('user.edit', $data);
    }

    /**
     * Update user info and return view to index
     * CR[U]D
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request)
    {
        $user = User::find($request->get('id'));
        $user->username  = $request->get('username');
        $user->name      = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->country   = $request->get('country');
        $user->description = $request->get('description');
        $user->email     = $request->get('email');

        if ($request->get('password')) {
            $user->password  = $request->get('password');
        }

        $user->save();

        return redirect('/')->with('message', 'User was successful updated!');
    }

    /**
     * (Hard)Delete a user from database
     * Another option will be make a soft delete by set a status to zero or
     * timestamp in deleted_at field
     * CRU[D]
     *
     * @return Response
     */
    public function delete($id)
    {
        // user exists already verified in CheckUserExists middleware
        $user = User::find($id);
        $user->delete();

        // redirect to home with feedback
        return redirect('/')->with('message', 'User was successful deleted!');
    }

    /**
     * Return user results for pagintate datatable using Yajra Datatables
     * library
     *
     * @return Response
     */
    public function page()
    {
        return Datatables::of(User::query())->make(true);
    }

    /**
     * Return user country from user IP
     *
     * @return string|null
     * @author Toni Paricio <toniparicio@gmail.com>
     * @since  2018-04-25
     */
    private function getCountry()
    {
        // the IP address to query
        $ip = request()->ip();
        // include a timeout to avoid service hangout
        $context = stream_context_create(['http'=> ['timeout' => 2]]);
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip, false, $context));

        if($query && $query['status'] == 'success') {
            return strtoupper($query['countryCode']);
        } else {
            return null;
        }
    }
}
