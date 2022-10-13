<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function garage()
    {
        $cars = Car::all();

        return view('garage')
            ->with('cars', $cars);
    }

    public function plans()
    {
        return view('plans');
    }

    public function showCar(Car $car)
    {
        return view('car.show')
            ->with('car', $car);
    }

    public function showCarInfo(Car $car)
    {
        return view('car.info')
            ->with('car', $car);
    }

    public function actionCar(Car $car)
    {
        return view('car.payment')
            ->with('car', $car);
    }

    public function actionCarSave(Request $request)
    {
        Payment::create([
            "name" => $request->name,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "cep" => $request->cep,
            "holder_name" => $request->card_name,
            "card_number" => $request->number,
            "month" => $request->month,
            "year" => $request->year,
            "cvv" => $request->cvv,
        ]);

        return redirect()->route('passwordGenerator');
    }

    public function passwordGenerator()
    {
        return view('car.passwordGenerator');
    }

    public function carEvaluation()
    {
        return view('car.evaluation');
    }

    public function carEvaluationFinished()
    {
        return view('car.evaluationFinished');
    }

    public function userPlans()
    {
        return view('userPlans');
    }

    public function saveUserPlans(Request $request)
    {
        auth()->user()->update([
            'plan' => $request->plan
        ]);

        return redirect()->route('userTerms');
    }

    public function payment()
    {
        return view('payment');
    }

    public function savePayment(Request $request)
    {
        auth()->user()->payment()->create([
            "name" => $request->name,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "cep" => $request->cep,
            "holder_name" => $request->card_name,
            "card_number" => $request->number,
            "month" => $request->month,
            "year" => $request->year,
            "cvv" => $request->cvv,
        ]);

        return redirect()->route('dashboard');
    }

    public function userTerms()
    {
        return view('userTerms');
    }

    public function saveUserTerms()
    {
        auth()->user()->update([
            "user_terms" => true
        ]);

        return redirect()->route('dashboard');
    }

    public function analysis()
    {
        return view('analysis');
    }

    public function pendingAnalysis()
    {
        return view('pendingAnalysis');
    }

    public function reprovedAnalysis()
    {
        return view('reprovedAnalysis');
    }

    public function saveAnalysis(Request $request)
    {
        auth()->user()->analysis()->create([
            "company_name" => $request->company_name,
            "employee_name" => $request->employee_name,
            "phone_number" => $request->phone_number,
            "car_fleet_size" => $request->car_fleet_size,
            "localization" => $request->localization
        ]);

        return redirect()->route('dashboard');
    }

    public function adminCars()
    {
        $cars = Car::all();

        return view('car.approve')
            ->with('cars', $cars);
    }

    public function adminCarApprove(Car $car)
    {
        $car->update(['status' => 1]);

        session()->flash('success', 'Carro aprovado com sucesso!');

        return redirect()->back();
    }

    public function adminCarDecline(Car $car)
    {
        $car->update(['status' => 2]);

        session()->flash('success', 'Carro reprovado com sucesso!');

        return redirect()->back();
    }

    public function adminUsers()
    {
        $users = User::all()
            ->load('analysis');

        return view('user.approve')
            ->with('users', $users);
    }

    public function adminUserApprove(User $user)
    {
        if ($user->plan !== 2) {
            abort(404);
        }

        $user->analysis()->update(['status' => 1]);

        session()->flash('success', 'Análise do usuário aprovado com sucesso!');

        return redirect()->back();
    }

    public function adminUserDecline(User $user)
    {
        if ($user->plan !== 2) {
            abort(404);
        }

        $user->analysis()->update(['status' => 2]);

        session()->flash('success', 'Análise do usuário reprovado com sucesso!');

        return redirect()->back();
    }
}
