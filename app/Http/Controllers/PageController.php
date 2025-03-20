<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillDetail;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Type_Product;

class PageController
{
    public function getIndex()
    {
        $slide = Slide::all();
        $newproducts = Product::where('new', 1)
            ->paginate(4);

        // $topProducts1 = Product::where('id_type', 1)
        //            ->limit(4)
        //            ->get();
        // $topProducts2 = Product::where('id_type', 7)
        //            ->limit(4)
        //            ->get();

        $promotion_products = Product::where('promotion_price', '<>', 0)
            ->paginate(8);

        return view('page.homepage', compact('slide', 'newproducts', 'promotion_products'));
    }

    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)
            ->get();

        $type_product = Type_Product::all();

        $sp_khac = Product::where('id_type', '<>', $type)
            ->paginate(3);

        return view('page.typeproduct', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }

    public function getDetail($id)
    {
        $sanpham = Product::findOrFail($id);

        $splienquan = Product::where('id_type', $sanpham->id_type)
            ->where('id', '!=', $sanpham->id)
            ->limit(5)
            ->get();

        $newProducts = Product::orderBy('created_at', 'desc')->limit(5)->get();

        $bestSellers = Product::orderBy('sold_count', 'desc')->limit(5)->get();

        $comments = Comment::where('id_product', $id)->get();

        return view('page.detailProduct', compact('sanpham', 'splienquan', 'newProducts', 'bestSellers', 'comments'));
    }

    public function postSearch(Request $request) {
        $search = $request->search;
    
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(6);
    
        return view('page.search', compact('products'));
    }
    

    public function showContact()
    {
        return view('page.contact');
    }
    public function showAbout()
    {
        return view('page.about');
    }
    public function getIndexAdmin()
    {
        $products = Product::all();
        return view('pageadmin.admin')->with([
            'products' => $products,
            'sumSold' => count(BillDetail::all())
        ]);
    }
    public function getAdminAdd()
    {
        return view('pageadmin.formAdd');
    }
    public function postAdminAdd(Request $request)
    {
        $product = new Product();
        $file_name = null;

        // Kiểm tra và xử lý file ảnh
        if ($request->hasFile('inputImage')) {
            $file = $request->file('inputImage');
            $file_name = $file->getClientOriginalName();
            $file->move('source/image/product', $file_name);
        }

        // Gán dữ liệu vào đối tượng Product
        $product->name = $request->inputName;
        $product->image = $file_name;
        $product->description = $request->inputDescription;
        $product->unit_price = $request->inputPrice;
        $product->promotion_price = $request->inputPromotionPrice;
        $product->unit = $request->inputUnit;
        $product->new = $request->inputNew;
        $product->id_type = $request->inputType;

        $product->save();

        return $this->getIndexAdmin();
    }

    public function getAdminEdit($id)
    {
        $product = Product::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }

    public function postEdit(Request $request)
    {
        $id = $request->editId;
        $product = Product::find($id);

        if ($request->hasFile('editImage')) {
            $file = $request->file('editImage');
            $fileName = $file->getClientOriginalName('editImage');
            $file->move('source/image/product/', $fileName);
            $product->image = $fileName;
        }

        $product->name = $request->editName;
        $product->description = $request->editDescription;
        $product->unit_price = $request->editPrice;
        $product->promotion_price = $request->editPromotionPrice;
        $product->unit = $request->editUnit;
        $product->new = $request->editNew;
        $product->id_type = $request->editType;

        $product->save();

        return $this->getIndexAdmin();
    }

    public function postAdminDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }
}
