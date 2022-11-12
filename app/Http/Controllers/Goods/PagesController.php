<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use App\Imports\GoodsImport;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Stock;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class PagesController extends Controller
{
    //
     public function _construct(){
        $this->middleware('auth');
    }
    public function stock_report(){
    	 return view ('goods.stock-report');
    }
     public function stock_report_view(Request $request){
        $this->validate($request,[
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $data = Stock::whereDate('created_at','>=',$start_date)->WhereDate('created_at','<=',$end_date)->orderBy('created_at','asc')->get();
        return view('goods.view-report')->with('data',$data);
    }
    public function single_report_view(Request $request){
        $this->validate($request,[
            'start_date'=>'required',
        ]);
        $start_date = $request->input('start_date');
        $data = Stock::whereDate('created_at','=',$start_date)->orderBy('created_at','asc')->get();
        return view('goods.view-report')->with('data',$data);
    }
    public function find_goods(Request $request){
    	$this->validate($request,[
            'search'=>'required',
        ]);
        $keyword = $request->input('search');
        $data = Goods::where('name','like','%'.$keyword.'%')->orderBy('name','asc')->get();
        return view('goods.goods-swap')->with('data',$data);
    }
    public function view_goods(){
        $data=Goods::orderBy('name','asc')->paginate(10);
        return view('goods.view-goods')->with('data',$data);
    }
    public function search_goods(){
        return view ('goods.search-goods');
    }
    public function result_goods(Request $request){
        if($request->ajax())
        {
            $output="";
            $data=Goods::where('name','LIKE','%'.$request->search."%")->orderBy('name','asc')->get();
            if($data)
            {
                foreach ($data as $key => $product) {
                    $output.='<tr>'.
                        '<td>'.$product->name.'</td>'.
                        '<td>'.$product->description.'</td>'.
                        '<td>'.$product->unit.'</td>'.
                        '<td>'.$product->price.'</td>'.
                        '<td><a href="/goods/'.$product->id.'" class="btn btn-primary">Edit Goods</a> </td>'.
                        '<td><a href="/stock?id='.$product->id.'" class="btn btn-primary">Add Stock</a> </td>'.
                        '</tr>';
                }
                return Response($output);
            }
        }

    }
    public function upload_goods(){
         return view('goods.upload-goods');
    }
    public function import_goods(Request $request){
         $this->validate($request,[
             'file'=>'required|mimes:xlsx,xls',
         ]);
        Excel::import(new GoodsImport(),request()->file('file'));
        return back()->with('success','Goods Uploaded Successfully');
    }
    public function search_products(Request $request){
        $data=Goods::where('name','LIKE','%'.$request->search."%")->orderBy('name','asc')->paginate(10);
        return view('goods.index')->with('data',$data);
    }

}
