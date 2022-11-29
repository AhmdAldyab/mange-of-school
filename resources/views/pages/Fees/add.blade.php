@extends('layouts.master')
@section('css')

@section('title')
    اضافة رسوم جديدة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> اضافة رسوم جديدة</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active"> اضافة رسوم جديدة</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('Fee.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">الاسم باللغة العربية</label>
                            <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label for="inputEmail4">الاسم باللغة الانجليزية</label>
                            <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">المبلغ</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">المرحلة الدراسية</label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">الصف الدراسي</label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">السنة الدراسية</label>
                            <select class="custom-select mr-sm-2" name="year">
                                <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">نوع الرسوم</label>
                            <select class="custom-select mr-sm-2" name="Fee_type">
                                <option value="1">الرسوم الدراسية</option>
                                <option value="2">رسوم باص</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">ملاحظات</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">تاكيد</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
