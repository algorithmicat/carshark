<?php

namespace App\Jobs;

use App\Http\Requests\CarStoreRequest;
use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ForgotCarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $car;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($car) //передаем нужные данные
    {
        // $this->car = $car;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Car $request) // исполнительный метод нашей задачи
    {
        $created_car = Car::create($request->validated());
    }
}
