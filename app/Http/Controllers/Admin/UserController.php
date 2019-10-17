<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController as BaseController;
use App\Model\{User, UserRole, Role, City};
use App\Repositories\{UserRepository, CityRepository};

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
    public function store(Request $request)
    {
        dd(__METHOD__);
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
    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
