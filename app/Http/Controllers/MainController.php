<?php

namespace App\Http\Controllers;

use App\Region;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index(Request $request)
    {
       
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $validator = Validator::make($input,[
                'region'=>'required',
                'brand'=>'required',
                'date'=>'required',
                'region2'=>'required',
                'date2'=>'required',
            ]);
    
            if($validator->fails())
            {
                return redirect()->route('index')->withErrors($validator)->withInput();
            }
            
            $price = Admin::getPriceOfRent($input['date'],$input['time'],$input['date2'],$input['time2'],$input['region'],$input['brand']);
            
            $autos = \App\Auto::all();
            $regions = Region::all()->where('status','=',1);
            $data = [
                'autos'=>$autos,
                'regions'=>$regions,
                'price'=>$price,
            ];
            
            return view('main.index',$data);
           
        }
        
        if(view()->exists('main.index'))
        {
            $autos = \App\Auto::all();
            $regions = Region::all()->where('status','=',1);
            $data = [
                'title'=>'Auto',
                'autos'=>$autos,
                'regions'=>$regions,
            ];
            return view('main.index',$data);
        }
        abort(404);
        
    }
}
