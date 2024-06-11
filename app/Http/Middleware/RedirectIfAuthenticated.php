<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Gráficos
// use ArielMejiaDev\LarapexCharts\LarapexChart as Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;



class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    
    //  public function __construct(LarapexChart $chart)
    //  {
    //      $this->chart = $chart;
    //  }
 
    //      public function index(Chart $chart)
    //  {
         
    //      return view('livewire.modulo.modulo-component1', ['chart' => $chart->build()]);
    // //  }
    // public $chart;

    // public function __construct(LarapexChart $chart)
    // {
    //     $this->chart = $chart;
    // }

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

    

    // return view('livewire.modulo.modulo-component1', ['chart' => $this->chart->build()]);

    return $next($request);
    // }

    // public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    // {

    //     return $this->chart->areaChart()
    //         ->setTitle('Sales during 2021.')
    //         ->setSubtitle('Physical sales vs Digital sales.')
    //         ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
    //         ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
    //         ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
