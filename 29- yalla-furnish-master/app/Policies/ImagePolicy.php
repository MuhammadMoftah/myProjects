<?php

namespace App\Policies;

use App\Admin;
use App\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any images.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the image.
     *
     * @param  \App\Admin  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function view(Admin $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can create images.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the image.
     *
     * @param  \App\Admin  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function update(Admin $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can delete the image.
     *
     * @param  \App\Admin  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function delete(Admin $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can restore the image.
     *
     * @param  \App\Admin  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function restore(Admin $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the image.
     *
     * @param  \App\Admin  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function forceDelete(Admin $user, Image $image)
    {
        //
    }
}
