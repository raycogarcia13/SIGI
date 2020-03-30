<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'] );
    }

    public function move(Request $request)
    {
        // upOne | dowOne | top | bottom
        $action = $request->action;
        $ids = $request->ids;
        $table = $request->table;
        $attr = 'position';


        switch($action)
        {
            case 'upOne':
            {
                foreach($ids as $item)
                {
                    $actual=DB::table($table)->where('id',$item)->first();
                    if($actual->position!=1)
                    {
                        $n=DB::table($table)->where('position',$actual->position-1)->first();
                        DB::table($table)->where('id',$item)->decrement('position',1);
                        DB::table($table)->where('id',$n->id)->increment('position',1);
                    }
                }
                return ['success'=>true];
                break;
            }
            case 'downOne':
            {
                $count=DB::table($table)->get()->count();
                for($i=count($ids);$i>0;$i--)
                {
                    $item=$ids[$i-1];
                    $actual=DB::table($table)->where('id',$item)->first();
                    if($actual->position!=$count)
                    {
                        $n=DB::table($table)->where('position',$actual->position+1)->first();
                        DB::table($table)->where('id',$item)->increment('position',1);
                        DB::table($table)->where('id',$n->id)->decrement('position',1);
                    }
                }
                return ['success'=>true];
                break;
            }
            case 'top':
            {
                for($i=count($ids);$i>0;$i--)
                {
                    $item=$ids[$i-1];
                    $actual=DB::table($table)->where('id',$item)->first()->position;
                    if($actual!=1)
                    {
                        for($j=$actual-1;$j>0;$j--)
                            DB::table($table)->where('position',$j)->increment('position',1);
                        
                        DB::table($table)->where('id',$item)->update(['position'=>1]);
                    }
                }
                return ['success'=>true];
                break;
            }
            case 'bottom':
            {
                $count=DB::table($table)->get()->count();
                foreach($ids as $item)
                {
                    $actual=DB::table($table)->where('id',$item)->first()->position;
                    if($actual!=$count)
                    {
                        for($j=$actual+1;$j<=$count;$j++)
                            DB::table($table)->where('position',$j)->decrement('position',1);

                        DB::table($table)->where('id',$item)->update(['position'=>$count]);
                    }
                }
                return ['success'=>true];
                break;
            }
            default:
            {
                break;
            }

        }

        $allData=DB::table($table)
                ->orderBy($attr,'ASC')
                ->get();
        
        return $allData;
    }

}
