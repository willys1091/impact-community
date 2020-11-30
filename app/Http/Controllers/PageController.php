<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;
use App\CategoryContent;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\FAQ;
use App\WatchVideo;
use App\Schedule;
use App\series;

class PageController extends Controller
{
    private function watchData(){
        $watch = WatchVideo::orderBy('created_at','desc')->get();
        return $watch;
    }

    private function prepareData(){
        $data['prepareData'] = CategoryContent::get();
        $data['city'] = Blog::where('category', 'like', '%' . '8' . '%')->get();
        $data['church'] = Blog::where('parent', '!=', null)->get();
        return $data;
    }

    public function home(Request $request){
        //return 'halo';
        //$category = CategoryProduct::orderBy('category_name','asc')->get();
        //$blog = Blog::limit(2)->get();
        //return view('pages.home',compact('category'),compact('blog'));
        $data = $request['data'];
        $data = $this->prepareData();
        $data['watchData'] = $this->watchData();
        $quote = Blog::where('category', '["5"]')->first();
        $schedule = Schedule::first();
        $data['content']['article']=Blog::where('category', 'like', '%' . '3' . '%')->orderBy('created_at','desc')->first();
        $data['content']['news']=Blog::where('category', 'like', '%' . '4' . '%')->orderBy('created_at','desc')->first();
        $data['content']['social']=Blog::where('category', 'like', '%' . '6' . '%')->orderBy('created_at','desc')->limit(3)->get();
        //return $data['content']['social'];
        
        return view('pages.home')
        ->with('data',$data)
        ->with('quote',$quote)
        ->with('schedule',$schedule);
    }

    public function watch(Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        $watch = WatchVideo::orderBy('created_at','desc')->get();
        $watch_selected = null;
        
        return view('pages.watch')
        ->with('data',$data)
        ->with('watch_selected',$watch_selected)
        ->with('watch',$watch);
    }
    public function series($url, Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        $id_cat = series::where('url',$url)->first();
        $watch = WatchVideo::where('series',$id_cat->id)->orderBy('created_at','desc')->get();
        $watch_selected = null;
        $title = 'Series - ' .$id_cat->name;
        
        return view('pages.series')
        ->with('data',$data)
        ->with('title',$title)
        ->with('watch_selected',$watch_selected)
        ->with('watch',$watch);
    }
    public function series_detail($url, Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        $watch_selected = WatchVideo::where('url_web',$url)->first();
        //$id_cat = series::where('url',$url)->first()->id;
        $watch = WatchVideo::where('series',$watch_selected->series)->orderBy('created_at','desc')->get();
        $title = $watch_selected->title;
        
        return view('pages.series')
        ->with('data',$data)
        ->with('title',$title)
        ->with('watch_selected',$watch_selected)
        ->with('watch',$watch);
    }

    public function watch_detail(Request $request, $url){
        $data = $request['data'];
        $watch = WatchVideo::orderBy('created_at','desc')->get();
        $watch_selected = WatchVideo::where('url_web',$url)->first();
        $data = $this->prepareData();
        
        return view('pages.watch')
        ->with('data',$data)
        ->with('watch_selected',$watch_selected)
        ->with('watch',$watch);
    }
    public function city(Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        
        return view('pages.city')
        ->with('data',$data);
    }
    public function city_detail($url, Request $request){
        $data = $request['data'];
        $content = Blog::where('url',$url)->first();
        $data = $this->prepareData();
        
        return view('pages.city_detail')
        ->with('content',$content)
        ->with('data',$data);
    }
    public function church_detail($url, Request $request){
        $data = $request['data'];
        $content = Blog::where('url',$url)->first();
        $data = $this->prepareData();
        
        return view('pages.church_detail')
        ->with('content',$content)
        ->with('data',$data);
    }

    public function church(Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        
        return view('pages.church')
        ->with('data',$data);
    }
    public function care(Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        
        return view('pages.care')
        ->with('data',$data);
    }
    public function firerelief(Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        
        return view('pages.fire_relief')
        ->with('data',$data);
    }

    public function update(Request $request){
        $data = $request['data'];
        $blog = Blog::orderBy('created_at','desc')->where('category', 'like', '%3%')->orWhere('category', 'like', '%4%')->orWhere('category', 'like', '%6%')->get();
        $data = $this->prepareData();
        
        //return $data['prepareData'];

        return view('pages.update')
        ->with('data',$data)
        ->with('blog',$blog);
    }
    public function update_filter($url, Request $request){
        $data = $request['data'];
        $id_cat=CategoryContent::where('url', $url)->first()->id;
        //$id_cat=CategoryContent::where('loan_officers', 'like', '%' . $officerId . '%')->get();
        $blog = Blog::where('category', 'like', '%' . $id_cat . '%')->orderBy('created_at','desc')->get();
        $data = $this->prepareData();
        
        //return $data['prepareData'];

        return view('pages.update')
        ->with('data',$data)
        ->with('blog',$blog);
    }

    public function content($url, Request $request){
        $data = $request['data'];
        $content = Blog::where('url',$url)->first();
        $data = $this->prepareData();
        
        return view('pages.blog_page')
        ->with('data',$data)
        ->with('content',$content);
    }
    public function recruitment(Request $request){
        $data = $request['data'];
        $blog = Blog::where('category','["7"]')->orderBy('created_at','desc')->get();
        $data = $this->prepareData();
        
        //return $data['prepareData'];

        return view('pages.recruitment')
        ->with('data',$data)
        ->with('blog',$blog);
    }

    public function recruitment_detail($url, Request $request){
        $data = $request['data'];
        $content = Blog::where('url',$url)->first();
        $data = $this->prepareData();
        
        return view('pages.recruitment_detail')
        ->with('data',$data)
        ->with('content',$content);
    }
    public function recruitment_apply($url, Request $request){
        return $request;
        $data = $request['data'];
        $content = Blog::where('url',$url)->first();
        $data = $this->prepareData();
        
        return view('pages.recruitment_detail')
        ->with('data',$data)
        ->with('content',$content);
    }

    public function contact_us(Request $request){
        $data = $request['data'];
        $data = $this->prepareData();
        return view('pages.contact_us',compact('data'));
    }


    //AAAAAAAAAAAAAAAAAAAAAAAAAAAA
    public function profile(Request $request){
        //$category = CategoryProduct::orderBy('category_name','asc')->get();
        $data = $request['data'];
        
        return view('pages.profile')
        ->with('data',$data);
    }

    public function category_product(Request $request){
        $data = $request['data'];
        $category = CategoryProduct::orderBy('category_name','asc')->get();
        return view('pages.category_product',compact('category'),compact('data'));
    }

    public function how_to_order(Request $request){
        $data = $request['data'];
        return view('pages.how_to_order',compact('category'),compact('data'));
    }

    public function website_partner(Request $request){
        $data = $request['data'];
        return view('pages.website_partner',compact('category'),compact('data'));
    }

    public function FAQ(Request $request){
        $data = $request['data'];
        $FAQ = FAQ::all();
        return view('pages.FAQ',compact('category'),compact('data'))->with('FAQ',$FAQ);
    }

    

    public function blog(Request $request){
        $data = $request['data'];
        //$category = CategoryProduct::orderBy('category_name','asc')->get();
        $blog = Blog::orderBy('published','desc')->paginate(9);
        //return "oi";
        return view('pages.blog',compact('category'),compact('blog'))
        ->with('data',$data);
    }

    public function blog_page(Request $request,$url){
        $data = $request['data'];
        $category = CategoryProduct::orderBy('category_name','asc')->get();
        $blog_page = Blog::where('url',$url)->first();
        return view('pages.blog_page',compact('category'),compact('blog_page'))
        ->with('data',$data);
    }

    public function product_detail($url, Request $request){
        $data = $request['data'];
        $product_detail = Product::where('url',$url)->first();
        $product_detail['similar']=Product::where('category',$product_detail->category)->where('url','!=',$url)->inRandomOrder()->limit(6)->get();
        $subcategory_include_id=CategoryProduct::where('product_code',$product_detail->category)->first()->sub_category;
        $data['category_selected']=CategoryProduct::where('product_code',$product_detail->category)->first()->category_name;
        $cat=CategoryProduct::where('sub_category', $subcategory_include_id)->pluck('product_code');
        //return dd($data);
        //return dd($product_detail);
        return view('pages.product_detail',compact('data'),compact('product_detail'));
    }

    public function category_each_product($category_name, $sub_categoryname=null, Request $request){
        $subcategory_selected=null;
        $category = CategoryProduct::orderBy('category_name','asc')->get();
        
        $category_selected = CategoryProduct::where('url',$category_name)->withAll()->first();
        

        $subcategory_include_id = $category_selected->id;
        //$subcategory_include = CategoryProduct::with(['products', 'childs.products'])->where('sub_category',$subcategory_include_id)->get();
        
        if ($category_selected->parent!=null) {
            //Child
            $cat=array($category_selected->product_code);
            //$product=Product::where('category', $category_selected->product_code)->with(['categoryproduct'])->get();
            $category_selected['parent'] = CategoryProduct::where('id',$category_selected['sub_category'])->withAll()->first();
        } else {
            //Parent
            $cat=CategoryProduct::where('sub_category', $subcategory_include_id)->pluck('product_code');
            $cat = json_decode(json_encode($cat), true);
            array_push($cat, $category_selected->product_code);
            $category_selected['parent']=$category_selected;
        }
        $product=Product::whereIn('category', $cat)->with(['categoryproduct'])->orderBy('created_at','desc')->paginate(9);
        
       //return $category_selected['parent']['id'];
        
        /*$categoryIds = CategoryProduct::where('sub_category',
        $parentId = CategoryProduct::where('sub_category', $subcategory_include_id)
        ->value('sub_category'))
        ->pluck('product_code')
        ->push($parentId)
        ->all();*/
        
        

        /*if ($sub_categoryname != null) {
            $subcategory_selected = CategoryProduct::where('url',$sub_categoryname)->first();   
            //$product = $subcategory_selected->products;
            $product = $subcategory_selected->products;
        }*/
        
        //$product=null;
        
        $data = $request['data'];
        //return dd($category_selected);
        //return view('pages.product_each_category', compact('product'),compact('category'),compact('category_selected'));
        return view('pages.product_each_category')
        ->with('data',$data)
        ->with('category_name',$category_name)
        ->with('product', $product)
        ->with('category', $category)
        ->with('category_selected', $category_selected)
        ->with('subcategory_selected', $subcategory_selected);
    }

    public function search(Request $request){
        /*$sub_categoryID = CategoryProduct::when($request->produk, function ($query) use ($request) {
            $query->where('category_name', 'like', "%{$request->produk}%");
        })->pluck('sub_category');*/
        $sub_categoryID=[];
        $category = CategoryProduct::when($request->produk, function ($query) use ($request) {
            $query->where('category_name', 'like', "%{$request->produk}%");
        })->get();
        foreach ($category as $key => $value) {
            $subID = $value->product_code;
            if ($value->sub_category==null) {
                $subID=CategoryProduct::where('sub_category', $value->id)->pluck('product_code');
                foreach ($subID as $key => $value) {
                    array_push($sub_categoryID, $value);
                }
            } else {
                array_push($sub_categoryID, $subID);
            }
        }
        //return dd($sub_categoryID);

        $product = Product::when($request->produk, function ($query) use ($request,$sub_categoryID) {
            $query->where('product_name', 'like', "%{$request->produk}%")
                ->orWhere('description', 'like', "%{$request->produk}%")
                ->orWhereIn('category', $sub_categoryID);
        })->orderBy('created_at','desc')->paginate(9);

        $product->appends($request->only('produk'));
        
        $data = $request['data'];
        //return dd($category_selected);
        //return view('pages.product_each_category', compact('product'),compact('category'),compact('category_selected'));
        return view('pages.search_page')
        ->with('data',$data)
        //->with('category_name',$category_name)
        ->with('product', $product);
        //->with('category', $category)
        //->with('category_selected', $category_selected)
        //->with('subcategory_selected', $subcategory_selected);
    }

    public function tags(Request $request, $tags){
        //return $tags;
        /*$sub_categoryID = CategoryProduct::when($request->produk, function ($query) use ($request) {
            $query->where('category_name', 'like', "%{$request->produk}%");
        })->pluck('sub_category');*/
        $sub_categoryID=[];
        $category = CategoryProduct::when($tags, function ($query) use ($request, $tags) {
            $query->where('category_name', 'like', "%{$tags}%");
        })->get();
        foreach ($category as $key => $value) {
            $subID = $value->product_code;
            if ($value->sub_category==null) {
                $subID=CategoryProduct::where('sub_category', $value->id)->pluck('product_code');
                foreach ($subID as $key => $value) {
                    array_push($sub_categoryID, $value);
                }
            } else {
                array_push($sub_categoryID, $subID);
            }
        }
        //return dd($sub_categoryID);

        $product = Product::when($tags, function ($query) use ($request,$sub_categoryID, $tags) {
            $query->where('product_name', 'like', "%{$tags}%")
                ->orWhere('description', 'like', "%{$tags}%")
                ->orWhere('meta_keyword', 'like', "%{$tags}%")
                ->orWhereIn('category', $sub_categoryID);
        })->orderBy('created_at','desc')->paginate(9);

        $product->appends($request->only('produk'));
        
        $data = $request['data'];
        //return dd($category_selected);
        //return view('pages.product_each_category', compact('product'),compact('category'),compact('category_selected'));
        return view('pages.tags')
        ->with('data',$data)
        ->with('tags',$tags)
        //->with('category_name',$category_name)
        ->with('product', $product);
        //->with('category', $category)
        //->with('category_selected', $category_selected)
        //->with('subcategory_selected', $subcategory_selected);
    }
}
