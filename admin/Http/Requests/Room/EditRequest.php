<?php

namespace Admin\Http\Requests\Room;

use Admin\Repos\RoomRepo;
use Admin\General\Room;

class EditRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(RoomRepo::class),
            'Method' => 'BaseFind',
            'Merge'  => Room::NAME
        ]);
    }


    public function rules(): array
    {
        return [

        ];
    }

}
