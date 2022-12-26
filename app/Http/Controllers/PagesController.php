<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));
        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3   = $sections->where('name', 'section_3')->first()->contents()->first();
        $products   = Product::orderBy('order', 'ASC')->take(4)->get();
        return view('paginas.index', compact('section1s', 'section2', 'section3', 'products'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $section1s = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($section2->content_2));
        return view('paginas.empresa', compact('section1s', 'section2'));
    }

    public function productos(Request $request)
    {
        $b = $request->get('b');

        if ($request->get('b')){
            $products = Product::where('name', 'like', "%{$b}%")->orderBy('order', 'ASC')->get();
        }else{
            $products = Product::orderBy('order', 'ASC')->get();
        }
            
        return view('paginas.productos', compact('products'));
    }

    public function producto(Request $request, Product $product)
    {
        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }
        $relatedProducts = $product->category->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        return view('paginas.producto', compact('product', 'relatedProducts'));
    }

    public function aplicaciones()
    {
        $page = Page::where('name', 'aplicaciones')->first();
        SEO::setTitle('aplicaciones');
        SEO::setDescription(strip_tags($this->data->description));
        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2s  = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.aplicaciones', compact('section1s', 'section2s'));
    }

    public function videos()
    {
        $page = Page::where('name', 'videos')->first();
        SEO::setTitle('videos');
        SEO::setDescription(strip_tags($this->data->description));
        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.videos', compact('section1s'));
    }

    public function calidad()
    {
        $page = Page::where('name', 'calidad')->first();
        SEO::setTitle('calidad');
        SEO::setDescription(strip_tags($this->data->description));
        /** Secciones de página */
        $sections   = $page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2s  = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        $section3s  = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $section4s  = $sections->where('name', 'section_4')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.calidad', compact('section1', 'section2s', 'section3s', 'section4s'));
    }

    public function cotizacion()
    {
        $page = Page::where('name', 'cotizacion')->first();
        SEO::setTitle("cotizaci&oacute;n");
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

    public function certificado($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_3);  
    }
}
