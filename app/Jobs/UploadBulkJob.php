<?php

namespace App\Jobs;

use App\Http\Controllers\ApiController;
use App\Models\UploadBulk;
use App\Models\UploadBulkDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class UploadBulkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $id = $this->id;

        $api  = new ApiController();
        $data = UploadBulkDetail::where('upload_bulk_id', $id)->where('status', 0)->get();
        $cekError   = 0;
        $cekSucces  = 0;
        $this->updateParentStartTime($id);

        foreach ($data as $point){
            $request_data = new Request;
            $request_data["phone"] = $point->phone_number;
            $request_data["adjust"] = convertNumber($point->adjust_point);
            if (substr($request_data["phone"], 0, 1) !== '0') {
                $request_data["phone"] = '0'.$request_data["phone"];
            }
            
            if ($point->type == "redeem"){
                $content = $api->redemptApi($request_data)->getContent();
                // dump($content, 'redemt');
                $array = json_decode($content, true);
                if ($array['code'] == "success"){
                    if (strpos($content, '"code":"0","message":"Success"') !== false) {
                        $this->updateStatus($point->id, 1, $content);
                        $cekSucces++;
                        $this->updateParentSuccess($id);
                    }else{
                        $this->updateStatus($point->id, 2, $content);
                        $this->updateParentFailed($id);
                        $cekError++;
                    }
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
                    if (strpos($content, '"code":"0","message":"Success"') !== false) {
                        $this->updateStatus($point->id, 1, $content);
                        $this->updateParentSuccess($id);
                        $cekSucces++;
                    }else{
                        $this->updateStatus($point->id, 2, $content);
                        $this->updateParentFailed($id);
                        $cekError++;
                    }
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
