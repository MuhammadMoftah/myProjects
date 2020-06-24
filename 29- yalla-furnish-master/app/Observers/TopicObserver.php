<?php

namespace App\Observers;

/**
 * Observes the Board model
 */
class TopicObserver
{

    public function deleted($topic)
    {
        $topic->saves()->delete();
        $topic->shares()->delete();
        $topic->likes()->delete();
        $topic->updates()->delete();
        $topic->comments()->delete();
    }
}
