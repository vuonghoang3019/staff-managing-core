<?php

namespace Backend\Http\Controllers;

use Backend\Repositories\Payment\PaymentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPaymentController extends FrontendController
{

    private $paymentRepo;

    public function __construct(PaymentRepositoryInterface $paymentRepo)
    {
        parent::__construct();
        $this->paymentRepo = $paymentRepo;
    }

    public function index()
    {
        $courses = $this->paymentRepo->getCourse();
        $payments = $this->paymentRepo->paginate();
        return view('backend::payment.index', compact('payments', 'courses'));
    }

    public function searchClassroom(Request $request)
    {
        return $this->paymentRepo->search($request);
    }

    public function searchName(Request $request)
    {
        return $this->paymentRepo->search($request);
    }
}
