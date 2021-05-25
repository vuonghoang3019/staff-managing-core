<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Gate;

class DefineRole
{
    public function setGateAndPolicy()
    {
        $this->defineCategory();
    }

    public function defineCategory()
    {
        Gate::define('category-list', 'Modules\Admin\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'Modules\Admin\Policies\CategoryPolicy@create');
        Gate::define('category-update', 'Modules\Admin\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'Modules\Admin\Policies\CategoryPolicy@delete');
    }

}
