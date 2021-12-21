<?php
namespace App\Repository\Task;
//EloquentTaskRepositoy EloquentTaskRepositoy.php. 
use App\Repository\Task\TaskRepository;
use Illuminate\Support\Facades\DB;

class EloquentTaskRepository implements TaskRepository
{
    
    // DISINI TEMPAT BUAT QUERY UNTUK API 

    public function updateTask()
    {
        dd('farhan');
    //    $task = Task::whereId($id)->first();
    //     if ($task != null) {
    //         $task->update([
    //             'name' => $request->name,
    //             'description' => $request->description,
    //         ]);
    //         return $task;
    //     }
    //     return null;
    }

    public function get_merchant()
    {
        $users = DB::connection('sqlsrv_accsend')->select('select top 10 * from TRX_ACCSEND_M');
        dd($users);
        return 'mas hamid';
    }
}