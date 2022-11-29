<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\online_classe;
use App\Repository\OnlineClasseRepositoryInterface;
use Illuminate\Http\Request;

class OnlineClasseController extends Controller
{
    protected $OnlineClasse;
    public function __construct(OnlineClasseRepositoryInterface $OnlineClasse)
    {
        $this->OnlineClasse=$OnlineClasse;
    }
    public function index()
    {
        return $this->OnlineClasse->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->OnlineClasse->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->OnlineClasse->store($request);
    }

    public function storeIndirect(Request $request)
    {
        return $this->OnlineClasse->storeIndirect($request);
    }

    public function indirectCreate()
    {
        return $this->OnlineClasse->indirectCreate();
    }

    public function destroy(Request $request)
    {
        return $this->OnlineClasse->destroy($request);
    }
}
