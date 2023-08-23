@extends('Todos.todo-layout')


<a href="{{route('todos.index')}}" class="badge bg-light">Back </a>


<div class="row">
    <div class="col-6">
        id
    </div>
    <div class="col-6">
        {{ $todo->id }}
    </div>
    <div class="col-6">
        title
    </div>
    <div class="col-6">
        {{ $todo->title }}
    </div>
    <div class="col-6">
        desc
    </div>
    <div class="col-6">
        {{ $todo->desc }}
    </div>
</div>
