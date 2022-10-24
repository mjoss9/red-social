<?php

namespace App\Traits;

trait Reportable {

    public function hasReport($query) {
        return (bool) $query->reports
            ->where('report',1)
            ->where('reportable_id', $query->id)
            ->where('reportable_type', get_class($query))
            ->where('user_id', $this->id)
            ->count();
    }

    public function report($query){
        if($this->hasReport($query)){
            return back();
        }
        else {
            $query->reports()->create([
                'user_id' => $this->id,
                'report' => 1,
            ]);
            return back();
        }
    }
}