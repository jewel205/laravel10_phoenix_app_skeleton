<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserService $userService,
                                RoleService $roleService,)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;

        $this->middleware('can:manage-users');
    }
    public function index()
    {
        $users = $this->userService->getAllUsers();
//        dd($users);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->getAllRoles();
        return view('users.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        DB::beginTransaction();
        try{
            $validatedInputs = $request->validated();
            $user = $this->userService->saveUser($validatedInputs);
            $user->assignRole((int)$request->input('role'));

            if (isset($request->branch)){
                $data['user_id'] = $user->id;
                $data['branch_code'] = $request->branch;
                $this->branchUserService->saveBranchUser($data);
            }

            if ($request->hasFile('item_thumbnail')){
                $userThumbnail = $request->file('item_thumbnail');
                $userThumbnailData = [
                    'user_id' => $user->id,
                    'user_thumbnail' => $userThumbnail,
                ];

                $this->userService->saveUserThumbnail($userThumbnailData);
            }

            DB::commit();
            return redirect()->route('users.index')->with('success','User created successfully.');
        }

        catch (\Exception $e) {
            DB::rollback();
            // Handle the exception or rethrow it as needed
            return back()->withError('Error occurred: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->getUserById($id);
        $userRole = $user->roles->first();
        return view('users.view',['user' => $user, 'userRole' => $userRole]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->roleService->getAllRoles();
        $userRole = $user->roles->first();
        return view('users.edit',
            [
                'user' => $user,
                'roles' => $roles,
                'userRole' => $userRole,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, User $user)
    {
        DB::beginTransaction();
        try{
            $validatedInputs = $request->validated();
            $this->userService->updateUser($validatedInputs, $user->id);
            $user->syncRoles((int)$request->input('role'));

            //            Handle User  Thumbnail
            if ($request->hasFile('item_thumbnail')){
                $userThumbnail = $request->file('item_thumbnail');
                $userThumbnailData = [
                    'user_id' => $user->id,
                    'user_thumbnail' => $userThumbnail,
                ];

                if (!is_null($user->avater_path)){
                    $this->userService->updateUserThumbnail($userThumbnailData);
                }
                else{
                    $this->userService->saveUserThumbnail($userThumbnailData);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Data update successful.');
        }
        catch (\Exception $e) {
            DB::rollback();
            // Handle the exception or rethrow it as needed
            return back()->withError('Error occurred: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function statusUpdate($id){
        $userStatusChange = $this->userService->userStatusChange($id);
        if($userStatusChange == 1){
            return redirect()->route('users.index')->with('success','User status changed.');
        }
        else
            return redirect()->route('users.index')->with('error',$userStatusChange);

    }

    public function changePassword($id){
        $user = $this->userService->getUserById($id);
        return view('users.change-password',['user' => $user]);
    }

    public function updatePassword(Request $request, $id){
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);
        $password = $request->password;
        $this->userService->userPasswordChange($id, $password);
        return redirect()->back()->with('success','User password changed,.');
    }

    public function changeOwnPassword($id)
    {
        $user = $this->userService->getUserById($id);
        return view('users.change-own-password',['user' => $user]);
    }

    public function updateOwnPassword(Request $request, $id){
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);
        $oldPassword = $request->current_password;
        $newPassword = $request->password;
        $passwordMatched = $this->userService->ownPasswordChange($id, $oldPassword, $newPassword);
        if (!$passwordMatched){
            return redirect()->back()->with('error', 'Incorrect current password!');
        }
        else
            return redirect()->back()->with('success','Password changed successfully.');
    }
}
