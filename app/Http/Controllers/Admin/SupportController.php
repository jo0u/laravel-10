<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {

        
        $supports = $support->all();

       
        return view('admin.supports.index', compact('supports'));
    }



    public function show(string|int $id, Support $support)
    {
       //$support = Support::find($id);
       //$support = Support::findOrFail($id);
       //$support = Support::where('id', '=' ,$id)->first();
       
       if(! $support = Support::find($id)){
        return back();
       }

    
       
       return view('admin.supports.show',compact('support'));
    }


    public function create()
    {
        return view('admin.supports.create');
    }



    public function store(StoreUpdateSupport $request, Support $support)
    {
     $data = $request->validated();
     $data['status'] = 'a';

    $support->create($data);
    
    return redirect()->route('supports.index');
     
    }

    public function edit(Support $support ,string|int $id)
    {
        if(! $support = $support->where('id',$id)->first()){
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request,Support $support,string|int $id)
    {
          if(! $support = $support->find($id)){
        return back();
       }


       $support->update($request->validated());


       return redirect()->route('supports.index');

    }

    public function destroy(string|int $id, Support $support)
    {
            if(! $support = $support->find($id)){
        return back();
       }

       $support->delete();

       return redirect()->route('supports.index');
    }


}
