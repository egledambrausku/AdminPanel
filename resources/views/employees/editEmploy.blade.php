@extends('layouts.base')

@section('content')

    <h2>Darbuotojo redagavimas</h2>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br />
        @endforeach
        <br />
    @endif

    {!! Form::open(array('url' => 'admin/employees/' . $employee->id, 'method' => 'put')) !!}
    Vardas, pavardė: <br>
    {!! Form::text('name', $employee->name) !!} <br><br>
    El. paštas: <br>
    {!! Form::text('email', $employee->email) !!} <br><br>
    Kompanija: <br>
    {!! Form::select('company_id', $companies, $employee->company_id) !!}<br><br>

    {!! Form::submit('Saugoti') !!}
    {!! Form::close() !!}



@stop