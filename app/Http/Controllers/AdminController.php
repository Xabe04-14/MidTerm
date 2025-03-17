<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductReques;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductReques $request)
    {
        $product = new Product();
        $file_name = null;

        if ($request->hasFile('inputImage')) {
            $file = $request->file('inputImage');
            $file_name = $file->getClientOriginalName();
            $file->move('source/image/product', $file_name);
        }

        $product->name = $request->inputName;
        $product->image = $file_name;
        $product->description = $request->inputDescription;
        $product->unit_price = $request->inputPrice;
        $product->promotion_price = $request->inputPromotionPrice;
        $product->unit = $request->inputUnit;
        $product->new = $request->inputNew;
        $product->id_type = $request->inputType;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Xác thực dữ liệu
        $request->validate([
            'editName' => 'required|string|max:255',
            'editPrice' => 'required|numeric|min:0',
            'editPromotionPrice' => 'nullable|numeric|min:0',
            'editUnit' => 'required|string|max:50',
            'editNew' => 'required|boolean',
            'editType' => 'required|integer|exists:product_types,id',
            'editImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'editName.required' => 'Tên sản phẩm không được để trống',
            'editPrice.required' => 'Giá sản phẩm không được để trống',
            'editPrice.numeric' => 'Giá sản phẩm phải là số',
            'editPromotionPrice.numeric' => 'Giá khuyến mãi phải là số',
            'editUnit.required' => 'Đơn vị không được để trống',
            'editNew.required' => 'Trạng thái sản phẩm không được để trống',
            'editType.exists' => 'Loại sản phẩm không hợp lệ',
            'editImage.image' => 'File tải lên phải là hình ảnh',
            'editImage.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif',
            'editImage.max' => 'Hình ảnh không được vượt quá 2MB',
        ]);

        // Xử lý hình ảnh mới nếu có
        if ($request->hasFile('editImage')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($product->image && File::exists(public_path('source/image/product/' . $product->image))) {
                File::delete(public_path('source/image/product/' . $product->image));
            }

            // Lưu ảnh mới
            $file = $request->file('editImage');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('source/image/product/'), $fileName);
            $product->image = $fileName;
        }

        // Cập nhật dữ liệu sản phẩm
        $product->name = $request->editName;
        $product->description = $request->editDescription;
        $product->unit_price = $request->editPrice;
        $product->promotion_price = $request->editPromotionPrice;
        $product->unit = $request->editUnit;
        $product->new = $request->editNew;
        $product->id_type = $request->editType;

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}