<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->admin()) {
            if (
                $request->path() == 'user/plans' ||
                $request->path() == 'user/terms' ||
                $request->path() == 'payments' ||
                $request->path() == 'analysis' ||
                $request->path() == 'pending/analysis'
            ) {
                return redirect()->to('dashboard');
            }

            if ($request->path() == 'dashboard')
            {
                return redirect()->to('admin/cars');
            }

            return $next($request);
        }

        if ($request->path() == 'user/plans') {

            if (!auth()->user()->missingPlan()) {
                return redirect()->to('dashboard');
            }

        } else {
            if (auth()->user()->missingPlan()) {
                return redirect()->to('user/plans');
            }

            if ($request->path() == 'user/terms') {
                if (auth()->user()->missingPlan()) {
                    return redirect()->to('user/terms');
                }
            } else {
                if (!auth()->user()->userTermsAccepted()) {
                    return redirect()->to('user/terms');
                }

                if (!auth()->user()->needsPayment() && $request->path() == 'payment') {
                    return redirect()->to('dashboard');
                } else if (auth()->user()->needsPayment() && $request->path() != 'payment') {
                    return redirect()->to('payment');
                }

                if (!auth()->user()->needsAnalysis() && $request->path() == 'analysis') {
                    return redirect()->to('dashboard');
                } else if (auth()->user()->needsAnalysis() && $request->path() != 'analysis') {
                    return redirect()->to('analysis');
                }

                if (!auth()->user()->pendingAnalysis() && $request->path() == 'pending/analysis') {
                    return redirect()->to('dashboard');
                } else if (auth()->user()->pendingAnalysis() && $request->path() != 'pending/analysis') {
                    return redirect()->to('pending/analysis');
                }

                if (!auth()->user()->reprovedAnalysis() && $request->path() == 'reproved/analysis') {
                    return redirect()->to('dashboard');
                } else if (auth()->user()->reprovedAnalysis() && $request->path() != 'reproved/analysis') {
                    return redirect()->to('reproved/analysis');
                }

            }

        }

        return $next($request);
    }
}