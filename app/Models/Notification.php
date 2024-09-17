<?php

namespace App\Models;

use App\Http\Resources\DoctorResource;
use App\Http\Resources\PatientResource;

use App\Http\Traits\Api_Trait;
use App\Http\Traits\NotificationFirebaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\PushFireBaseNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class Notification extends Model
{
    use HasFactory,NotificationFirebaseTrait;
    protected $guarded=[];

    public function mainService(){
        return $this->belongsTo(MainService::class,'main_service_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'user_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'user_id');
    }


    protected static function booted()
    {
        parent::booted();
    
        static::created(function ($model) {
            $doctor = Doctor::where('id', $model->user_id)->first();
            $patient = Patient::where('id', $model->user_id)->first();
            $row = [];
            if($doctor) {
                $row = DoctorResource::make($doctor)->resolve();
            } 
            $parent_ides = [$model->user_id];
            
            //dd($row);
            
            // $notificationObject = [
            //     'title' => $model->title,
            //     'body' => $model->body,
            //     'type' => $model->type,
            //     'user_id' => $model->user_id,
            //     'user_type' => $model->user_type,
            //     'date' => $model->date,
            //     'doctor' => $row,  // Pass as array
            //     'foreign_id' => $model->foreign_id,
            // ];
            //dd(DoctorResource::make($doctor));
             FacadesNotification::send($patient ?? $doctor, new PushFireBaseNotification([
                    'title' => $model->title,
                    'body' => $model->body,
                    'type' => $model->type,
                    'user_id'=>$model->user_id,
                    'user_type'=>$model->user_type,
                    'date'=>$model->date,
                    'doctor'=>$row,
                    'foreign_id'=>$model->foreign_id,
            ]));
         
        });
    }

}
