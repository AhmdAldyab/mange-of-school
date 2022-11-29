<?php 

namespace App\Repository;

interface StudentGradeautedRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function update($request);

    public function delet($request);

}