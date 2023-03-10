<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Post $post)
    {
        return $user->admin || $user->id == $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->admin || $user->id == $post->user_id;
    }
}
