<?php

namespace Admin\Http\Requests\Post;

use Admin\General\Post;
use Admin\Repos\PostRepo;

class EditRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(PostRepo::class),
            'Method' => 'BaseFind',
            'Merge'  => Post::NAME
        ]);
    }

    public function rules(): array
    {
        return [

        ];
    }
}
