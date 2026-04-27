<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\Invitation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class InviteController extends Controller
{
    public function create()
    {
        $authUser = auth()->user();

        if ($authUser->hasRole('SuperAdmin')) {
            $invitations = Invitation::whereHas("user", function($q){ $q->where("create_by", "1"); })->latest()->get();
        } else {
            $invitations = Invitation::where('company_id', $authUser->company_id)->whereHas('user', function($q){ $q->where('create_by', '0'); })->where("create_by", $authUser->id)->latest()->get();
        }
        $companies = Company::all();
        return view('invite.create', compact('companies', 'invitations', 'authUser'));
    }

    public function store(Request $request)
    {
        $authUser = auth()->user();
        $request->validate([
            'email' => 'required|email',
            'role' => 'required'
        ]);


        if ($authUser->hasRole('SuperAdmin')) {
            $company = Company::create([
                'name' => 'Company '.Str::random(5)
            ]);
            $companyId = $company->id;
            $name = "Invited Admin";
            $createBy = '1';

        } else {
            $companyId = $authUser->company_id;
            $name = "Invited Member";
            $createBy = '0';
        }

         $newUser = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make('12345'),
            'company_id' => $companyId,
            'create_by' => $createBy,
        ]);

        $role = Role::where('name', $request->role)->first();
        $newUser->roles()->attach($role->id);

        Invitation::create([
            'email' => $request->email,
            'role' => $request->role,
            'company_id' => $companyId,
            'create_by' => $authUser->id,
        ]);

        return back()->with('success', $name);
    }
}
