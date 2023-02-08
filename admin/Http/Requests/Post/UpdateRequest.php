<?php

namespace Admin\Http\Requests\Post;

use Admin\General\Post as PostConfig;
use Admin\Models\Post;
use Admin\Repos\PostRepo;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(PostRepo::class),
            'Method' => 'BaseFind',
            'Merge'  => PostConfig::NAME
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'Title' => [
                'required',
                'max:256',
                Rule::unique(Post::$Name, Post::$_Title)->ignore($this->id, Post::$_Id)
            ],
        ];

        return array_merge(parent::rules(), $rules);
    }

    public function data(): array
    {
        $data = parent::data();

        unset($data[Post::$CreatedBy]);
        unset($data[Post::$CreatedDate]);

        return $data;
    }
}
