<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Quote;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=Quote  $odel=Quote
     * @return mixed
     */
    public function update(User $user, Quote $quote)
    {
        return $quote->user_id == $user->id;
    }

}
