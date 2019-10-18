<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as BaseController;
use App\Model\User;
use App\Repositories\{UserRepository, CityRepository};
use App\Http\Requests\{UserCreateRequest, UserUpdateRequest};

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;
    private $cityRepository;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');

        $this->userRepository = app(UserRepository::class);
        $this->cityRepository = app(CityRepository::class);
    }

    public function index()
    {
        $paginator = $this->userRepository->getAllWithPagination();
        return view('admin.users.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new User();
        $cities = $this->cityRepository->getAllCitiesList();

        return view('admin.users.create', compact('item', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->input();
        if(\Gate::allows('update-user')) {
            $item = (new User())->create($data);
        } else {
            $item = null;
        }

        if ($item) {
            return redirect()->route('admin.user.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->userRepository->getUserById($id);
        return view('admin.users.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->userRepository->getUserById($id);
        $cities = $this->cityRepository->getAllCitiesList();

        return view('admin.users.edit', compact('item', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $item = $this->userRepository->getUserById($id);

        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись с id=[{$id}] не найдена!"])
                ->withInput();
        }

        $data = $request->input();
        if(\Gate::allows('update-user', $id)) {
            $item->update($data);
        } else {
            $item = null;
        }

        if ($item) {
            return redirect()->route('admin.user.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == 1 )
            return back()
                ->withErrors(['msg' => 'Ошибка удаления']);
        if(\Gate::allows('delete-user', $id)) {
            $result = User::destroy($id);
        } else {
            $result = null;
        }

        if($result) {
            return redirect()
                ->route('admin.user.index')
                ->with(['success' => "Запись id[$id] удалена."]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
