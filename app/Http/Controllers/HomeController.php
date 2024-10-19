<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        $filteredDate = $r->date ?? date('Y-m-d');


        $carbonDate = Carbon::createFromDate($filteredDate);

        $tasks['date_as_string'] = $carbonDate->translatedFormat('d') . ' de ' . ucfirst($carbonDate->translatedFormat('M'));

        $tasks['date_prev_button'] = $carbonDate->copy()->subDay()->format('Y-m-d');
        $tasks['date_next_button'] = $carbonDate->copy()->addDay()->format('Y-m-d');

        $tasks['tasks'] = Task::whereDate('due_date', $filteredDate)->get();

        $authUser = Auth::user();

        $tasksForDate = Task::whereDate('due_date', $filteredDate)
            ->get();
        $tasks['authUser'] = $authUser;
        $tasks['tasks'] = $tasksForDate;
        $tasks['tasks_count'] = $tasksForDate->count();
        $tasks['undone_tasks_count'] = $tasksForDate->where('is_done', false)->count();
        return view('home',  $tasks);
    }
}
