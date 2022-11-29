<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Fee_invoice;
use Illuminate\Http\Request;
use App\Repository\FeeInvoicesRepositoryInterface;

class FeeInvoiceController extends Controller
{
    protected $Fees_Invoices;
    public function __construct(FeeInvoicesRepositoryInterface $Fees_Invoices)
    {
        $this->Fees_Invoices=$Fees_Invoices;
    }
    public function index( )
    {
        return $this->Fees_Invoices->index();
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        return $this->Fees_Invoices->store($request);
    }

    public function show($id)
    {
        return $this->Fees_Invoices->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Fees_Invoices->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee_invoice $fee_invoice)
    {
        return $this->Fees_Invoices->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Fees_Invoices->delete($request);
    }
}
