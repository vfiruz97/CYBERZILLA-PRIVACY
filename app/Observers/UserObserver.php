<?php

namespace App\Observers;

use App\Model\{User, UserRole};

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Model\User  $user
     *
     * Регистрация роль пользователя
     * по умолчанию всем новым зарегистриванным пользователям равно 2
     * @return void
     */
    public function creating(User $user)
    {
        //$user->password = \Hash::make($user->password);
    }

    public function created(User $user)
    {
        $userRole = new UserRole();
        $userRole->user_id = $user->id;
        $userRole->role_id = 2;
        $userRole->slug = 'пользователь';
        $userRole->save();
    }

    /**
     * Handle the user "updating" event.
     *
     * @param  \App\Model\User  $user
     * @return boolean
     */
    public function updating(User $user)
    {
        if($user->password == null)
            $user->password = $user->getOriginal('password');
        else
            $user->password = \Hash::make($user->password);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Model\User  $user
     * @return void
     */
    public function updated(User $user)
    {
       //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Model\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Model\User  $user
     * @return void
     */
    public function restored(User $user)
    {
       //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Model\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
