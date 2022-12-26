<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'aplicaciones')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        return view('administrator.application.content');
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {   
        $request->validate(['image' => 'required'], ['image.required'    => 'Imagen es requerida']);
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/applications', 'custom');
        $content = Content::create($data);
        return response()->json([], 200);;
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/applications','custom');
        }        
        $element->update($data);
        return response()->json([], 200);;
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/applications','custom');
        }   

        if($request->hasFile('content_4')){
            if(Storage::disk('custom')->exists($element->content_4))
                Storage::disk('custom')->delete($element->content_4);
            
            $data['content_4'] = $request->file('content_4')->store('images/applications','custom');
        }  

        $element->update($data);
        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image); 

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()
            ->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('content', function($slider) {
            return "<div>{$slider->content_1} <br> {$slider->content_2}</div><div>{$slider->content_3}</div>";
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content'])
        ->make(true);
    }

    public function sectorGetList()
    {

        $elements = Content::where('section_id', 7)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('content', function($element) {
            return "<div>{$element->content_1} <br> {$element->content_2}</div><div>{$element->content_3}</div>";
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content'])
        ->make(true);
    }
}
