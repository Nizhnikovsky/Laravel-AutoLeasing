<?php

namespace App\Http\Controllers;

use App\Capitals;
use App\Price;
use App\ClassAuto;
use App\Region;
use App\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Builder\Class_;


class AdminController extends Controller
{
    public function index()
    {
        if(view()->exists('admin.index'))
        {
            $autos = \App\Auto::all();
                //->where('autos','status',1);
        
            $data = [
                'title'=>'Auto',
                'autos'=>$autos
            ];
            return view('admin.index',$data);
        }
        abort(404);
        
    }
    
    public function createAuto(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
        
            $validator = Validator::make($input,[
                'brand'=>'required|max:20',
                'model'=>'required|max:10',
                'color'=>'required|max:20',
                'volume'=>'required|float',
                ]);
        
            if($validator->fails())
            {
                return redirect()->route('admin.create_auto')->withErrors($validator)->withInput();
            }
            $auto = new Auto();
            $auto->fill($input);
        
            if($auto->save())
            {
                return redirect('admin')->with('status','Автомобиль создан');
            }
        }
        
        if(view()->exists('admin.create_auto'))
        {
            $regions = Region::all();
            $class = ClassAuto::all();
            $data = ['title'=>'Страница создания автомобиля',
                'regions'=>$regions,
                'class'=>$class,
            ];
            return view('admin.create_auto',$data);
        }
        abort(404);
        
    }
    
    public function createRegion(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
        
            $validator = Validator::make($input,[
                'title'=>'required',
                'region'=>'required',
            ]);
        
            if($validator->fails())
            {
                return redirect()->route('admin.create_region')->withErrors($validator)->withInput();
            }
            $region = new Region();
            $region->fill($input);
            
            if($region->save())
            {
                return redirect('admin')->with('status','Регион создан');
            }
        }
        if(view()->exists('admin.create_region'))
        {
            $capitals = Capitals::all();
            $class = ClassAuto::all();
            $data = ['title'=>'Страница создания региона',
                'capitals'=>$capitals,
                'class'=>$class,
            ];
            return view('admin.create_region',$data);
        }
        abort(404);
    }
    
    public function createPrice(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
            
            $validator = Validator::make($input,[
                'price'=>'required',
                'region'=>'required',
                'class'=>'required'
            ]);
            
            if($validator->fails())
            {
                return redirect()->route('admin.create_price')->withErrors($validator)->withInput();
            }
            
            $price = new Price();
            $price->fill($input);
            
            if($price->save())
            {
                return redirect('admin')->with('status','Цена создана');
            }
        }
        if(view()->exists('admin.create_price'))
        {
            $regions = Region::all();
            $class = ClassAuto::all();
            $data = ['title'=>'Страница создания цены',
            'regions'=>$regions,
             'class'=>$class,
            ];
            return view('admin.create_price',$data);
        }
        else
        abort(404);
    }
}

