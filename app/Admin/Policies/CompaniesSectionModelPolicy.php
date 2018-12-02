<?php

namespace Admin\Policies;

use App\Http\Sections\Companies;
use App\Models\Company;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompaniesSectionModelPolicy
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
    public function before(User $user, $ability, Companies $section, Company $item = null)
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
    public function display(User $user, Companies $section, Company $item)
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
    public function edit(User $user,Companies $section, Company $item)
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
    public function delete(User $user, Companies $section, Company $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }

    public function create(User $user,Companies $section, Company $item)
    {
        if($user->isSuperAdmin()){
        return true;
        }
        else
            false;
    }
}
