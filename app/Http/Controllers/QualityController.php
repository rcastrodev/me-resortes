<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class QualityController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'calidad')->first();
    }

    public function content()
    {
        $page       = $this->page;
        $section1   = $page->sections()->where('name', 'section_1')->first()->contents()->first();
        return view('administrator.quality.content', compact('section1'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    private function rules(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'Imagen requerida',
        ]);
    }

    public function store(Request $request)
    {
        $this->rules($request);
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/quality', 'custom');
        Content::create($data);

        return response()->json([], 201);
    }

    public function store2(Request $request)
    {
        $this->rules($request);
        $data = $request->all();
        
        $data['image'] = $request->file('image')->store('images/quality', 'custom');

        if($request->hasFile('content_3'))            
            $data['content_3'] = $request->file('content_3')->store('images/quality','custom');

        Content::create($data);

        return back();
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }        

        $element->update($data);

        return response()->json([], 200);
    }

    public function update2(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }   
        
        if($request->hasFile('content_3')){
            if(Storage::disk('custom')->exists($element->content_3))
                Storage::disk('custom')->delete($element->content_3);
            
            $data['content_3'] = $request->file('content_3')->store('images/quality','custom');
        } 

        $element->update($data);

        return back();
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }   

        $element->update($data);
        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image); 

        if(Storage::disk('custom')->exists($element->content_3))
            Storage::disk('custom')->delete($element->content_3); 

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function itemGetList()
    {
        $elements = Content::where('section_id', 10)->orderBy('order', 'ASC')->get();

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function certificationsGetList()
    {
        $elements = Content::where('section_id', 11)->orderBy('order', 'ASC')->get();

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($element){
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element-multi" onclick="findContent2('.$element->id.', 1)"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }

    public function machineryGetList()
    {
        $elements = Content::where('section_id', 12)->orderBy('order', 'ASC')->get();

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($element){
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {

            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element-multi" onclick="findContent2('.$element->id.', 2 )"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}

