<?php

namespace Admin\Http\Requests\Post;

//use Admin\Models\Category;
use Admin\Models\Post;
//use Admin\Models\Author;
//use Admin\Models\PostCategory;
//use Admin\Models\PostTag;
//use Admin\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Admin\Configs\Config;
use Admin\Http\Requests\BaseRequest as Request;
use Admin\Rules\Uuid;

class BaseRequest extends Request
{
    public function rules(): array
    {
        return [
            'Title'        => [
                'required',
                'max:256',
                Rule::unique(Post::$Name, Post::$_Title),
            ],
            //            'AuthorId'     => [
            //                'required',
            //                new Uuid(),
            //                Rule::exists(Author::$Name, Author::$_Id),
            //            ],
            'Status'       => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
            'Publish'      => [
                'nullable',
                Rule::in(array_keys(Config::BIT)),
            ],
            'SortOrder'    => 'nullable|integer|min:0|max:999',
            'Content'      => 'required',
            'Tags'         => 'nullable|array',
            //            'Tags.*'       => [
            //                'required',
            //                new Uuid(),
            //                Rule::exists(Tag::$Name, Tag::$_Id)
            //            ],
            //            'Categories'   => 'nullable|array',
            //            'Categories.*' => [
            //                'required',
            //                new Uuid(),
            //                Rule::exists(Category::$Name, Category::$_Id)
            //            ],
            'ShortContent' => 'nullable|max:512',
            'Seo'          => 'nullable',
            'Remark'       => 'nullable|max:512',
        ];
    }

    //    public function attributes(): array
    //    {
    //        return Post::getLabels();
    //    }

    public function data(): array
    {
        return [
            Post::$Title        => $this->get('Title'),
            Post::$Slug         => Str::slug($this->get('Title')),
            Post::$Publish      => $this->get('Publish'),
            Post::$Content      => $this->get('Content'),
            Post::$ShortContent => $this->get('ShortContent'),
            Post::$SortOrder    => $this->get('SortOrder'),
            Post::$Remark       => $this->get('Remark'),
            Post::$ImagePath    => $this->get('ImagePath'),
            Post::$Seo          => $this->get('Seo'),
            Post::$AuthorId     => $this->get('AuthorId'),
            Post::$CreatedDate  => get_now(),
            Post::$ChangedDate  => get_now(),
            //            Post::$ChangedBy    => get_account_id(),
            //            Post::$CreatedBy    => get_account_id(),
        ];
    }

    //    public function tags($postId): array
    //    {
    //        $data = [];
    //
    //        foreach (request('Tags', []) as $tag) {
    //            $data[] = [
    //                PostTag::$Id     => Str::uuid(),
    //                PostTag::$PostId => $postId,
    //                PostTag::$TagId  => $tag,
    //            ];
    //        }
    //
    //        return $data;
    //    }
    //
    //    public function categories($postId): array
    //    {
    //        $data = [];
    //
    //        foreach (request('Categories', []) as $cat) {
    //            $data[] = [
    //                PostCategory::$Id         => Str::uuid(),
    //                PostCategory::$PostId     => $postId,
    //                PostCategory::$CategoryId => $cat,
    //            ];
    //        }
    //
    //        return $data;
    //    }
}
