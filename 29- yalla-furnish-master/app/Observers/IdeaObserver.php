<?php

namespace App\Observers;

/**
 * Observes the Board model
 */
class IdeaObserver
{

    public function deleted($idea)
    {
        $idea->saves()->delete();
        $idea->shares()->delete();
        $idea->likes()->delete();
        $idea->updates()->delete();
        $idea->comments()->delete();
        $idea->paragraphs()->delete();
    }
}
