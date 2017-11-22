@extends('layouts.base')
@section('content')

<div id="m-b-md">
    <h2>Nauja kompanija</h2>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
        <br/>
    @endif

    {!! Form::open(array('url' => '/admin/companies', 'files' => true ))!!}
    Kompanijos pavadinimas: <br/>
    {!! Form::text('name') !!}<br/><br/>
    Adresas:<br/>
    {!! Form::text('address') !!}<br/><br/>
    Logotipas<br/>
    {!! Form::file('logo') !!}<br/><br/>

    {!! Form::submit('Saugoti') !!}
    {!! Form::close() !!}

</div>
@stop