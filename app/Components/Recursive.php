<?php 

namespace App\Components; // namespace dùng để chỉ định những class nằm trong folder cha(Components) có thể được kế thừa hoặc sử dụng lại trong các class khác


class Recursive {

    private $data;
    private $htmlSelect = '';

    public function __construct($data) {
        $this->data = $data; //gán biến data của class này bằng biến data(ở tham số truyền vào)
    }

    function categoryRecursive($id = 0,$text = '- ',$tag = 'option') { // dùng cho khi thêm mới một category
        foreach($this->data as $value) {
            if($value['parent_id'] == $id ){
                $this->htmlSelect .= '<'.$tag.' value = "'.$value['id'].'" >'.$text.$value['name'].'</'.$tag.'>';

                $this->categoryRecursive($value['id'], $text.$text,$tag);
            }
        }
        
        return $this->htmlSelect;
    }
    function categoryRecursiveTagOption($parentId = '',$id = 0,$text = '- ',$tag = 'option') { // dùng cho khi chỉnh sửa một category
        foreach($this->data as $value) {
            if($value['parent_id'] == $id ){
                if(!empty($parentId) && $parentId == $value['id']) { // tìm cha 
                    $this->htmlSelect .= '<'.$tag.' value = "'.$value['id'].'" selected >'.$text.$value['name'].'</'.$tag.'>';
                } else {
                    $this->htmlSelect .= '<'.$tag.' value = "'.$value['id'].'" >'.$text.$value['name'].'</'.$tag.'>';
                }
                $this->categoryRecursiveTagOption($parentId,$value['id'], $text.$text, $tag);
            }
        }
        
        return $this->htmlSelect;
    }

    /* -- Giải thích code
    $data = Category::all();
    foreach($data as $value) {
        if($value['parent_id'] == 0) {
            echo '<p> '.$value['name'].' <p>';
            foreach($data as $value2) {
                if($value2['parent_id'] == $value['id']) {
                    echo '<p style = "margin-left:20px;"> '.$value2['name'].' <p>';
                    foreach($data as $value3) {
                        if($value3['parent_id'] == $value['id']) {
                            echo '<p style = "margin-left:40px;"> '.$value3['name'].' <p>';
                        }
                    }
                }
            }
        }
    }
    */

    /* -- bản code thuần 
    function categoryRecursive($id = 0,$text = '--') {
        $data = Category::all();
        foreach($data as $value) {
            if($value['parent_id'] == $id ){
                $this->htmlSelect .= '<option value = '.$value['id'].'>'.$text.$value['name'].'</option>';

                $this->categoryRecursive($value['id'], $text.$text);
            }
        }

        return $this->htmlSelect;
    }
    */

}