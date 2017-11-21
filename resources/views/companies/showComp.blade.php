@extends('layouts.base')

@section('content')

    <div class="list mt-30">

        <h2>{{$company->name}}</h2>
        <img src={{asset('storage/'.$company->logo)}} alt="Logotipas"> <br>
        {{$company->address}}


        <div class="mt-30">
            <h4>Kompanijos darbuotojai:</h4>

            @foreach($employees as $employee)
                {{$employee->name}}<br>
            @endforeach
        </div>
    </div>
@stop