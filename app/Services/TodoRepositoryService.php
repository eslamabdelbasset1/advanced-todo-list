<?php

namespace App\Services;
use App\Contracts\ITodoRepositoryService;
use App\Models\Todo;

class TodoRepositoryService implements ITodoRepositoryService
{
    public function getAllTodo(): \Illuminate\Database\Eloquent\Collection
    {
        return Todo::all();
    }
    public function storeTodo()
    {
        $attributes = \request()->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);
       return Todo::create($attributes);
    }
    public function updateTodo(Todo $todo): void
    {
        $todo->update(['isDone' => true]);
    }
    public function deleteTodo(Todo $todo): void
    {
        $todo->delete();
    }
}
