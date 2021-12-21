<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiController;
use App\Models\UploadBulk;
use App\Models\UploadBulkDetail;
use App\Repository\Task\EloquentTaskRepository;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;

class UploadBulkManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:uploadBulk {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    protected $eloquentTask;

    function __construct(EloquentTaskRepository $eloquentTask)
    {
        $this->eloquentTask = $eloquentTask;
        parent::__construct();
    }

    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->option('id');
        // dd($this->option('id'));
        $api  = new ApiController($this->eloquentTask);
        $data = UploadBulkDetail::where('upload_bulk_id', $id)->get();
        $cekError   = 0;
        $cekSucces  = 0;
        $this->updateParentStartTime($id);

        foreach ($data as $point){
            $request_data = new Request;
            $request_data["phone"] = $point->phone_number;
            $request_data["adjust"] = $point->adjust_point;
            if (substr($request_data["phone"], 0, 1) !== '0') {
                $request_data["phone"] = '0'.$request_data["phone"];
            }
            
            if ($point->type == "redeem"){
                $content = $api->redemptApi($request_data)->getContent();
                // dump($content, 'redemt');
                $array = json_decode($content, true);
                if ($array['code'] == "success"){
                    $this->updateStatus($point->id, 1, $content);
                    $cekSucces++;
                    $this->updateParentSuccess($id);
                }else{
                    $this->updateStatus($point->id, 2, $content);
                    $this->updateParentFailed($id);
                    $cekError++;
                }
            }
            if ($point->type == "earning"){
                $content = $api->earningApi($request_data)->getContent();
                // dump($content, 'earning');
                $array = json_decode($content, true);
                if ($array['code'] == "success"){
                    $this->updateStatus($point->id, 1, $content);
                    $this->updateParentSuccess($id);
                    $cekSucces++;
                }else{
                    $this->updateStatus($point->id, 2, $content);
                    $this->updateParentFailed($id);
                    $cekError++;
                }
            }
        }
        $this->updateParentFinishTime($id);
    }

    
    public function updateStatus($id, $tipe, $response){
        $dPM = UploadBulkDetail::find($id);
                                 
        $dPM->status        = $tipe;
        $dPM->response      = $response;
        $dPM->save();
    }

    public function updateParentStartTime($id)
    {
        $dPM = UploadBulk::find($id);
                                 
        $dPM->start_time    = now();
        $dPM->save();
    }
    public function updateParentSuccess($id)
    {
        $dPM = UploadBulk::find($id);
        $success        = ++$dPM->success;
        $dPM->success   = $success;
        $dPM->save();
    }

    public function updateParentFailed($id)
    {
        $dPM = UploadBulk::find($id);
                                 
        $failed         = ++$dPM->failed;
        $dPM->failed    = $failed;
        $dPM->save();
    }

    public function updateParentFinishTime($id)
    {
        $dPM = UploadBulk::find($id);
                                 
        $dPM->end_time    = now();
        $dPM->save();
    }
}
