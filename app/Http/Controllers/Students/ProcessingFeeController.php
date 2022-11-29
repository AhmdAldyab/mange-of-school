<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ProcessingFee;
use Illuminate\Http\Request;
use App\Repository\ProcessingFeeRepositoryInterface;

class ProcessingFeeController extends Controller
{
    protected $processingFee;
    public function __construct(ProcessingFeeRepositoryInterface $processingFee)
    {
        $this->processingFee=$processingFee;   
    }
    public function index()
    {
        return $this->processingFee->index();
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
        return $this->processingFee->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->processingFee->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->processingFee->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcessingFee $processingFee)
    {
        return $this->processingFee->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->processingFee->delete($request);
    }
}
