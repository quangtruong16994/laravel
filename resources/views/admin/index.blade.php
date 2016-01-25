@extends('layouts.master')

@section('title', 'Trang chủ')

@section('user', Auth::user()["fullname"])

@section('active-menu-home', 'class="active"')