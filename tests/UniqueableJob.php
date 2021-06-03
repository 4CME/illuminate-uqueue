<?php

namespace Mingalevme\Tests\Illuminate\UQueue;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mingalevme\Illuminate\UQueue\Jobs\Uniqueable;

class UniqueableJob implements Uniqueable, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public static $test;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function uniqueable($event)
    {
        return md5(json_encode($event));
    }

    public function handle()
    {
        static::$test = true;
    }
}
