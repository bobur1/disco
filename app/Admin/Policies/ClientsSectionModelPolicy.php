<?php

namespace Admin\Policies;

use App\Http\Sections\Clients;
use App\Models\Client;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientsSectionModelPolicy
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
    public function before(User $user, $ability, Clients $section, Client $item = null)
    {
        if ($user->isSuperAdmin()) {
            

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
    public function display(User $user, Clients $section, Client $item)
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
    public function edit(User $user,Clients $section, Client $item)
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
    public function delete(User $user, Clients $section, Client $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }

    public function create(User $user,Clients $section, Client $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }
}
