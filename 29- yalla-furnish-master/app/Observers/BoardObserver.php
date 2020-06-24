<?php

namespace App\Observers;

/**
 * Observes the Board model
 */
class BoardObserver
{

    public function deleted($board)
    {
        $board->items()->delete();
    }
}
