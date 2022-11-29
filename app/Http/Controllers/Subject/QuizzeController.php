<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Repository\QuizzeRepositoryInterface;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class QuizzeController extends Controller
{
    protected $Quizze;
    public function __construct(QuizzeRepositoryInterface $Quizze)
    {
        $this->Quizze=$Quizze;
    }
    public function index()
    {
        return $this->Quizze->index();
    }

    public function create()
    {
        return $this->Quizze->create();
    }

    public function store(Request $request)
    {
        return $this->Quizze->store($request);
    }

    public function edit($id)
    {
        return $this->Quizze->edit($id);
    }

    public function update(Request $request, Quizze $quizze)
    {
        return $this->Quizze->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Quizze->destroy($request);
    }

}
