<?php
namespace Modules\Admin\Components;
class Recursive
{
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function Recursive($parent_id,$id = 0,$text = '')
    {
        foreach ($this->data as $value)
        {
            if ($value['parent_id'] != $id) continue;
            $select = !empty($parent_id) && $parent_id  == $value['id'] ? "selected" : "";
            $this->htmlSelect .= "<option $select value='".$value['id']."'>" . $text . $value['name'] . "</option>";
            $this->Recursive($parent_id,$value['id'],$text . '-');
        }
        return $this->htmlSelect;
    }
}
