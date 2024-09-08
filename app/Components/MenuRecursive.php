<?php 

namespace App\Components;

use App\Models\Menu;

class MenuRecursive {
    private $html;

    public function __construct() {
        $this->html = '';
    }

    public function  addMenuRecursive($parentId = 0, $subMark = '') {
        $data = Menu::where('parent_id', $parentId)->get();

        foreach($data as $dataItem) {
            // if($parentId == $dataItem['parent_id']) {
                $this->html .= '<option value="'.$dataItem['id'].'" >'.$subMark.$dataItem['name'].'</option>';
                
                $this->addMenuRecursive($dataItem['id'],$subMark.'--');
            // }
        }

        return $this->html;
    }
    
    public function editMenuRecursive($idMenu,$parentId = 0, $subMark = '') {
        $data = Menu::where('parent_id', $parentId)->get(); 

        foreach($data as $dataItem) {
            if(!empty($idMenu) && $idMenu == $dataItem['id']) {
                $this->html .= '<option selected value="'.$dataItem['id'].'" >'.$subMark.$dataItem['name'].'</option>';
                
            } else {
                $this->html .= '<option value="'.$dataItem['id'].'" >'.$subMark.$dataItem['name'].'</option>';
            }
            
            $this->editMenuRecursive($idMenu,$dataItem['id'],$subMark.'--');
        }

        return $this->html;
    }
}

