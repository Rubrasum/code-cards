<?php

namespace App\Jobs\QuizCard;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Store implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $quizcard;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(QuizCard $quizcard)
    {
        $this->quizcard = $quizcard;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        logger(now());
    }
}
