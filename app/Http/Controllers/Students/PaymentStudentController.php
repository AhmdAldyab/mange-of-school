<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller; 
use App\Models\PaymentStudent;
use App\Repository\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentStudentController extends Controller
{
    protected $PaymentStudent; 
    public function __construct(PaymentRepositoryInterface $PaymentStudent)
    {
        $this->PaymentStudent=$PaymentStudent;
    }
    public function index()
    {
        return $this->PaymentStudent->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->PaymentStudent->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->PaymentStudent->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->PaymentStudent->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentStudent $paymentStudent)
    {
        return $this->PaymentStudent->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->PaymentStudent->delete($request);
    }
}
