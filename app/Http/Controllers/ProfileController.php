<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        $users = User::whereNot('username','admin')->get();

        return view('profile.index', ['users' => $users,]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, User $employee): View
    {
        if($employee->username == 'admin'){
            return abort(404);
        }
        if(!$employee->id){
            $employee = $request->user();
        }
        return view('profile.edit', [
            'user' => $employee,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function create(): View
    {
        return view('profile.create');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $employee): RedirectResponse
    {
        if(!$employee->id){
            $employee = $request->user();
        }
        $employee->fill($request->validated());

        $employee->save();

        return Redirect::route('employees.edit',[
            'employee' => $employee,
        ])->with('success', 'Successfully Updated');
    }

    /**
     * Update the user's profile information.
     */
    public function store(ProfileCreateRequest $request): RedirectResponse
    {
        $employee = new User();
        $employee->fill($request->validated());
        $employee->save();

        return redirect()->route('employees.edit',[
            'employee' => $employee,
        ])->with('success', 'Successfully Created');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, User $employee): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        if($employee->id == $request->user()->id){
            return back()->withErrors(['Cannot delete active user!' ])->withInput();
        }
        $employee->delete();

        return Redirect::route('employees.index')->with('success','Successfully Deleted!');
    }
}
