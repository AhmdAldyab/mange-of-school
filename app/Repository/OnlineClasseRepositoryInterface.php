<?php 

namespace App\Repository;

interface OnlineClasseRepositoryInterface
{
    public function index();

    public function create();

    public function indirectCreate();

    public function store($request);

    public function storeIndirect($request);

    public function destroy($request);
    
}