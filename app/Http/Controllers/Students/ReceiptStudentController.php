<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ReceiptStudent;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $Receipt;
    public function __construct(ReceiptStudentsRepositoryInterface $Receipt)
    {
        $this->Receipt=$Receipt;
    }
    public function index()
    {
        return $this->Receipt->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Receipt->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Receipt->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Receipt->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Receipt->delete($request);
    }
}
