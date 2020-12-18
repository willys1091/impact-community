<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CategoryProduct;
use App\CategoryContent;
use App\Product;
use App\Blog;
use App\Content;
use App\FAQ;
use App\WatchVideo;
use App\Schedule;
use App\series;

class PageController extends Controller{
    use \App\Traits\general;

    private function watchData(){
        $watch = WatchVideo::orderBy('created_at','desc')->get();
        return $watch;
    }

    private function prepareData(){
        $data['prepareData'] = CategoryContent::get();
        $data['city'] = Content::where('category', 'like', '%' . '8' . '%')->get();
        $church = Content::where('parent', '!=', null);
        $data['church'] = $church->get();
        $data['church2'] = array_column($church->get()->toarray(), 'parent');
        return $data;
    }
    public function home(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $data['watchData'] = $this->watchData();
<<<<<<< HEAD
        $data['quote'] = Blog::where('category', '["5"]')->first();
        $data['top_quote'] = Content::where('category','=', '["10"]')->orderBy('created_at','desc')->first();
        $data['middle_quote'] = Content::where('category','=', '["11"]')->orderBy('created_at','desc')->first();
        $data['bottom_quote'] = Content::where('category','=', '["12"]')->orderBy('created_at','desc')->first();
=======
        $data['top_quote'] = Content::where([['category','=', '["5"]'],['title','=','top quote']])->first();
>>>>>>> a46b4dc7d3e875557d491c868b1334531855e280
        $data['schedule'] = Schedule::first();
        $data['article']=Content::where('category', 'like', '%' . '3' . '%')->orderBy('created_at','desc')->first();
        $data['news']=Content::where('category', 'like', '%' . '4' . '%')->orderBy('created_at','desc')->first();
        $data['social']=Content::where('category', 'like', '%' . '6' . '%')->orderBy('created_at','desc')->limit(3)->get();
        return view('pages.home',$data);
    }

    public function watch(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $data['watch'] = WatchVideo::orderBy('created_at','desc')->get();
        $data['watch_selected'] = null;
        return view('pages.watch',$data);
    }

    public function watch_detail(Request $request, $url){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $data['watch'] = WatchVideo::orderBy('created_at','desc')->get();
        $data['watch_selected'] = WatchVideo::where('url_web',$url)->first();
        return view('pages.watch',$data);
    }

    public function series($url, Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $id_cat = series::where('url',$url)->first();
        $data['watch'] = WatchVideo::where('series',$id_cat->id)->orderBy('created_at','desc')->get();
        $data['watch_selected'] = null;
        $data['title'] = 'Series - ' .$id_cat->name;
        return view('pages.series',$data);
    }

    public function series_detail($url, Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $data['watch_selected'] = WatchVideo::where('url_web',$url)->first();
        $data['watch'] = WatchVideo::where('series',$watch_selected->series)->orderBy('created_at','desc')->get();
        $data['title'] = $watch_selected->title;
        return view('pages.series',$data);
    }

    public function city(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        return view('pages.city',$data);
    }

    public function city_detail($url, Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $data['content'] = Content::where('url',$url)->first();
        return view('pages.city_detail', $data);
    }

    public function church(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        return view('pages.church',$data);
    }

    public function church_detail($url, Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        $data['content'] = Content::where('url',$url)->value('content');
        return view('pages.church_detail',$data);
    }

    public function care(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        return view('pages.care',$data);
    }

    public function firerelief(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        return view('pages.fire_relief',$data);
    }

    public function update(Request $request){
        $data['tmp'] = $request['data'];
        $data['content'] = Content::orderBy('created_at','desc')->where('category', 'like', '%3%')->orWhere('category', 'like', '%4%')->orWhere('category', 'like', '%6%')->get();
        $data = $this->prepareData();
        return view('pages.update',$data);
    }

    public function update_filter($url, Request $request){
        $data['tmp'] = $request['data'];
        $id_cat=CategoryContent::where('url', $url)->first()->id;
        $data['content'] = Content::where('category', 'like', '%' . $id_cat . '%')->orderBy('created_at','desc')->get();
        $data = $this->prepareData();
        return view('pages.update',$data);
    }

    public function content($url, Request $request){
        $data['tmp'] = $request['data'];
        $data['content'] = Content::where('url',$url)->first();
        $data = $this->prepareData();
        return view('pages.blog_page',$data);
    }
    public function recruitment(Request $request){
        $data['tmp'] = $request['data'];
        $blog = Content::where('category','["7"]')->orderBy('created_at','desc')->get();
        $data = $this->prepareData();
        return view('pages.recruitment',$data);
    }

    public function recruitment_detail($url, Request $request){
        $data['tmp'] = $request['data'];
        $data['content'] = Content::where('url',$url)->first();
        $data = $this->prepareData();
        return view('pages.recruitment_detail',$data);
    }

    public function recruitment_apply($url, Request $request){
        return $request;
        $data['tmp'] = $request['data'];
        $data['content'] = Content::where('url',$url)->first();
        $data = $this->prepareData();
        return view('pages.recruitment_detail',$data);
    }

    public function contact_us(Request $request){
        $data['tmp'] = $request['data'];
        $data = $this->prepareData();
        return view('pages.contact_us',$data);
    }

    public function profile(Request $request){
        $data['tmp'] = $request['data'];
        return view('pages.profile',$data);
    }

    public function category_product(Request $request){
        $data['tmp'] = $request['data'];
        $data['category'] = CategoryProduct::orderBy('category_name','asc')->get();
        return view('pages.category_product',$data);
    }

    public function how_to_order(Request $request){
        $data['tmp'] = $request['data'];
        return view('pages.how_to_order',$data);
    }

    public function website_partner(Request $request){
        $data['tmp'] = $request['data'];
        return view('pages.website_partner',$data);
    }

    public function FAQ(Request $request){
        $data['tmp'] = $request['data'];
        $data['FAQ'] = FAQ::all();
        return view('pages.FAQ',$data);
    }

    public function blog(Request $request){
        $data['tmp'] = $request['data'];
        $data['content'] = Content::orderBy('published','desc')->paginate(9);
        return view('pages.blog',$data);
    }

    public function blog_page(Request $request,$url){
        $data['tmp'] = $request['data'];
        $data['category'] = CategoryProduct::orderBy('category_name','asc')->get();
        $data['blog_page'] = Content::where('url',$url)->first();
        return view('pages.blog_page',$data);
    }

    public function product_detail($url, Request $request){
        $data['tmp'] = $request['data'];
        $product_detail = Product::where('url',$url)->first();
        $product_detail['similar']=Product::where('category',$product_detail->category)->where('url','!=',$url)->inRandomOrder()->limit(6)->get();
        $subcategory_include_id=CategoryProduct::where('product_code',$product_detail->category)->first()->sub_category;
        $data['category_selected']=CategoryProduct::where('product_code',$product_detail->category)->first()->category_name;
        $cat=CategoryProduct::where('sub_category', $subcategory_include_id)->pluck('product_code');
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


        $data['tmp'] = $request['data'];
        return view('pages.product_each_category')
        ->with('data',$data)
        ->with('category_name',$category_name)
        ->with('product', $product)
        ->with('category', $category)
        ->with('category_selected', $category_selected)
        ->with('subcategory_selected', $subcategory_selected);
    }

    public function search(Request $request){
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

        $product = Product::when($request->produk, function ($query) use ($request,$sub_categoryID) {
            $query->where('product_name', 'like', "%{$request->produk}%")
                ->orWhere('description', 'like', "%{$request->produk}%")
                ->orWhereIn('category', $sub_categoryID);
        })->orderBy('created_at','desc')->paginate(9);

        $product->appends($request->only('produk'));

        $data['tmp'] = $request['data'];

        return view('pages.search_page')
        ->with('data',$data)

        ->with('product', $product);

    }

    public function tags(Request $request, $tags){

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

        $product = Product::when($tags, function ($query) use ($request,$sub_categoryID, $tags) {
            $query->where('product_name', 'like', "%{$tags}%")
                ->orWhere('description', 'like', "%{$tags}%")
                ->orWhere('meta_keyword', 'like', "%{$tags}%")
                ->orWhereIn('category', $sub_categoryID);
        })->orderBy('created_at','desc')->paginate(9);

        $product->appends($request->only('produk'));

        $data['tmp'] = $request['data'];

        return view('pages.tags')
        ->with('data',$data)
        ->with('tags',$tags)
        ->with('product', $product);
    }
}
