<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\services\ITodoRepositoryService;
//use App\services\TodoRepositoryService;
use Illuminate\Http\Request;

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
