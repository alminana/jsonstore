<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Settings;
use App\Models\Purchase;
use Auth;
use Illuminate\Support\Carbon;
 
class StockController extends Controller
{

    public function PurchasePending(){

        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('admin.index',compact('allData'));
    }// End Method 

        public function Stockdashboard(){
        $setting = Settings::latest()->get();
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('admin.index',compact('allData','setting'));

    } // End Method
    public function StockReport(){
        $setting = Settings::latest()->get();
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock_report',compact('allData','setting'));

    } // End Method


    public function StockReportPdf(){
        $setting = Settings::latest()->get();
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.pdf.stock_report_pdf',compact('allData','setting'));

    } // End Method


    public function StockSupplierWise(){
        $setting = Settings::latest()->get();
        $supppliers = Supplier::all();
        $category = Category::all();
        return view('backend.stock.supplier_product_wise_report',compact('supppliers','category','setting'));

    } // End Method


    public function SupplierWisePdf(Request $request){
        $setting = Settings::latest()->get();
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        return view('backend.pdf.supplier_wise_report_pdf',compact('allData','setting'));

    } // End Method


    public function ProductWisePdf(Request $request){
        $setting = Settings::latest()->get();
        $product = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        return view('backend.pdf.product_wise_report_pdf',compact('product','setting'));
    } // End Method



}
 