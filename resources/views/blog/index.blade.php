@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <livewire:navigation/>
    <livewire:publications :tagId="$tagId ?? null"/>
@endsection
