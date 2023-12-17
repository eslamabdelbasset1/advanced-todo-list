<?php

namespace App\services;

use App\Models\Todo;

interface ITodoRepositoryService
{
    public function getAllTodo(): \Illuminate\Database\Eloquent\Collection;
    public function storeTodo();
    public function updateTodo(Todo $todo);
    public function deleteTodo(Todo $todo);
}
