@extends('layouts.base')
@section('content')

    <h2>Naujas darbuotojas</h2>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br />
        @endforeach
        <br />
    @endif

    {!! Form::open(array('url' => '/admin/employees')) !!}
    Vardas, Pavardė:
    <br>
    {!! Form::text('name') !!}
    <br><br>
    El. paštas:
    <br>
    {!! Form::text('email') !!}
    <br><br>
    Kompanija:
    <br>
    {!! Form::select('company_id', $companies) !!}
    <br><br>
    {!! Form::submit('Saugoti') !!}
    {!! Form::close() !!}


@stop