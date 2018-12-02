<?php

namespace Admin\Policies;

use App\Http\Sections\Users;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersSectionModelPolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function before(User $user, $ability, Users $section, User $item = null)
    {
        if ($user->isSuperAdmin()) {
            if ($ability != 'display' && $ability != 'create' && !is_null($item) && $item->id <= 2) {
                return false;
            }

            return true;
        }
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function display(User $user, Users $section, User $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function edit(User $user, Users $section, User $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function delete(User $user, Users $section, User $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }

    public function create(User $user, Users $section, User $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }
}
