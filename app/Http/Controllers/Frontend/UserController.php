<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseController as BaseController;
use App\Model\User;
use App\Repositories\{UserRepository, CityRepository};
use App\Http\Requests\UserUpdateRequest;

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
        return view('frontend.users.index');
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
        return view('frontend.users.show', compact('item'));
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

        return view('frontend.users.edit', compact('item', 'cities'));
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
        $item->update($data);

        if ($item) {
            return redirect()->route('user.edit', [$item->id])
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

        $result = User::destroy($id);

        if($result) {
        //    \Auth::logout();
            return redirect()
                ->route('user.index')
                ->with(['success' => "Запись id[$id] удалена."]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
