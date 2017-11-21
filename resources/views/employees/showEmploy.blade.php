@extends('layouts.base')

@section('content')

    <div class="list">
        <h2>{{$employee->name}}</h2>
        El. paštas:
        {{$employee->email}}<br>
        Kompanija:
        {{$employee->company->name}} <br><br>

        <a href="{{url('admin/employees')}}">Grįžti į darbuotojų sąrašą</a>
    </div>



@stop