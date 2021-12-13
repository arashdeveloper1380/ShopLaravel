@extends('backend.layouts.admin_master')

@section('content')
    <h2 style="color: cornflowerblue">خوش امدید <span>{{ Auth::User()->name }}</span></h2>
@endsection