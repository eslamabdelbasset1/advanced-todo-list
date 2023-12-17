<?php

namespace App\Http\Controllers;

use App\Contracts\ITodoRepositoryService;
use App\Models\Todo;

class TodoController extends Controller
{
    protected mixed $todoRepository;
    public function __construct(ITodoRepositoryService $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        $todos = $this->todoRepository->getAllTodo();
        return view('index',['todos' => $todos]);
    }

    public function store()
    {
        $this->todoRepository->storeTodo();
        return redirect('/');
    }

    public function update(Todo $todo)
    {
        $this->todoRepository->updateTodo($todo);
        return redirect('/');
    }
    public function destroy(Todo $todo)
    {
        $this->todoRepository->deleteTodo($todo);
        return redirect('/');
    }
}
