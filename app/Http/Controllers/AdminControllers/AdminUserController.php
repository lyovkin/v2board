<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;

class AdminUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $page = Paginator::resolveCurrentPage();
		$users = User::orderBy('id', 'desc');

        if ($request->input('id')) {
            $users = $users->where('id', '=', $request->input('id'));
        }

        if ($request->input('email')) {
            $users = $users->where('email', 'LIKE', '%'.$request->input('email').'%');
        }

        if ($request->input('user_name')) {
            $users = $users->where('user_name', 'LIKE', '%'.$request->input('user_name').'%');
        }

        $users = $users->paginate(10);

        return view('admin.user.index', [
            'users' => $users,
            'f_id' => $request->input('id'),
            'f_email' => $request->input('email'),
            'f_user_name' => $request->input('user_name'),
            'page' => $page
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(User $user)
	{
        $roles = Role::orderBy('id', 'asc')->get();
		return view('admin.user.create', ['user' => $user, 'roles'=> $roles]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\UserRequest $request, Registrar $registrar)
	{
        $data = $request->all();
        if (!array_key_exists('roleCheck', $data)) $data['roleCheck'] = [];
        $user = $registrar->create($data);

        $user->roles()->sync($data['roleCheck']);
        \ProfileService::createProfile($request, $user['id']);

        \Session::flash('message', 'Пользователь создан');
        return redirect()->route('admin.user.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
	public function edit(User $user)
	{
        $roles = Role::orderBy('id', 'asc')->get();

        $page = $_SERVER['HTTP_REFERER'];

        return view('admin.user.edit', ['user' => $user, 'roles'=> $roles])->with('page', $page);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param Requests\UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(User $user, Requests\UserRequest $request)
	{
        $data = $request->all();

        // If no one checkbox was checked we need to set 'roleCheck' as empty array to avoid error
        if (!array_key_exists('roleCheck', $data)) $data['roleCheck'] = [];

        if ($user->update($data)) {
            $user->roles()->sync($data['roleCheck']);
            \ProfileService::updateProfile($request, $user->profile);
        }
        \Session::flash('message', 'Пользователь обновлен');
        $page = $request->page;
        return redirect($page);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
	public function destroy(User $user)
	{
		$user->delete();
        return redirect()->back();
	}

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block(User $user){
        $user->update(\Request::all());
        return redirect()->back();
    }

}
