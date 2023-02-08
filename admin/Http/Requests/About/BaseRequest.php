<?php

namespace Admin\Http\Requests\About;

use Admin\Configs\Config;
use Admin\Http\Requests\BaseRequest as Request;
use Admin\Models\About;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BaseRequest extends Request
{

    public function rules(): array
    {
        return [
            'Title'        => [
                'required',
                'max:100',
                'min:5',
                Rule::unique(About::$Name, About::$Title)
            ],
            'ImagePath'    => [
                'max:10000',
                'mimes:jpeg,png,jpg'
            ],
            'SortOrder'    => 'nullable|integer|min:0|max:999',
            'Content'      => [
                'required',
            ],
            'ShortContent' => 'nullable|max:512',
            'Status'       => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
            'Publish'      => [
                'nullable',
                Rule::in(array_keys(Config::BIT)),
            ],
        ];
    }

    public function data(): array
    {
        return [
            About::$Title        => $this->get('Title'),
            About::$Slug         => Str::slug($this->get('Title')),
            About::$Remark       => $this->get('Remark'),
            About::$SortOrder    => $this->get('SortOrder'),
            About::$ShortContent => $this->get('ShortContent'),
            About::$CreatedDate  => get_now(),
            About::$ChangedDate  => get_now(),
//            About::$ChangedBy    => Auth::user()->Id,
//            About::$CreatedBy    => Auth::user()->Id,
        ];
    }
}
