<?php

namespace Admin\Http\Requests\Room;

use Admin\Configs\Config;
use Admin\Models\Room;
use Admin\Http\Requests\BaseRequest as Request;
use Illuminate\Validation\Rule;

class BaseRequest extends Request
{
    public function rules(): array
    {
        return [
            'DisplayName' => [
                'required',
                'min:5',
                'max:256'
            ],
            'Code'        => [
                'required',
                'regex:' . Config::CODE_REGEX,
                'max:64',
            ],
            'Status'      => [
                'required',
                Rule::in(array_keys(Config::STATUS)),
            ],
            'Publish'     => [
                'nullable',
                Rule::in(array_keys(Config::BIT)),
            ],
            'SortOrder'   => 'nullable|integer|min:0|max:999',
            'Remark'      => 'nullable|max:512',
        ];
    }

    public function data(): array
    {
        return [
            Room::$DisplayName => $this->get('DisplayName'),
            Room::$Code        => $this->get('Code'),
            Room::$Remark      => $this->get('Remark'),
            Room::$Status      => $this->get('Status'),
            Room::$Publish     => $this->get('Publish'),
            Room::$SortOrder   => $this->get('SortOrder'),
            Room::$CreatedDate => get_now(),
            Room::$ChangedDate => get_now(),
            //            Room::$ChangedBy    => Auth::user()->Id,
            //            Room::$CreatedBy    => Auth::user()->Id,
        ];
    }
}
