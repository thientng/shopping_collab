<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Models\Attribute;

class AttributeController extends Controller
{
    use DeleteModelTrait;

    private $attribute;

    public function __construct(Attribute $attribute) { 
        $this->attribute = $attribute;
    }


    public function index() {
        $attributesColor = $this->attribute->where('name', "color")->latest()->paginate(5);
        $attributesSize = $this->attribute->where('name', "size")->latest()->paginate(5);

        return view("admin.attribute.index",[
            'attributesColor' => $attributesColor,
            'attributesSize' => $attributesSize
        ]);
    }

    public function create(Request $request) {
        $nameType = $request->input('nameType');
        return view('admin.attribute.add',[
            'nameType' => $nameType,
        ]);
    }

    public function store(Request $request) {
        $request->validate([ 'value' => 'required|string|max:20|min:1|unique:attributes'],['value.unique' => 'Thuộc tính đã được sử dụng. Vui lòng nhập thuộc tính khác!',]);
        if($request->name == "color" || $request->name == "size"){
            $this->attribute->create([
                'name' => $request->name,
                'value' => $request->value,
            ]);
        } else {
            return redirect()->route('attributes.index')->with('Error','Thêm thuộc tính lỗi, bạn chỉ được thêm giá trị cho color vào size!'); 
        }
        return redirect()->route('attributes.index');
    }

    public function edit($id,Request $request) {
        $nameType = $request->nameType;

        $attribute = $this->attribute->find($id);
        return view('admin.attribute.edit',[
            'id' => $id,
            'attribute' => $attribute,
            'nameType' => $nameType 
        ]);
    }

    public function update($id,Request $request) {
        $request->validate([ 'value' => 'required|string|max:20|min:1|unique:attributes'],['value.unique' => 'Thuộc tính đã được sử dụng. Vui lòng nhập thuộc tính khác!',]);
        if($request->name == "color" || $request->name == "size"){
            $this->attribute->find($id)->update([
                'name' => $request->name,
                'value' => $request->value,
            ]);
        } else {
            return redirect()->route('attributes.index')->with('Error','Thêm thuộc tính lỗi, bạn chỉ được thêm giá trị cho color vào size!'); 
        }
        return redirect()->route('attributes.index');
    }
    public function delete($id) {
        $this->attribute->find($id)->delete();

        return redirect()->route('attribute.index');
    }

}
