<?php

namespace Backend\Providers;

use Backend\Repositories\About\AboutRepository;
use Backend\Repositories\About\AboutRepositoryInterface;
use Backend\Repositories\Classroom\ClassroomRepository;
use Backend\Repositories\Classroom\ClassroomRepositoryInterface;
use Backend\Repositories\Contact\ContactRepository;
use Backend\Repositories\Contact\ContactRepositoryInterface;
use Backend\Repositories\Course\CourseRepository;
use Backend\Repositories\Course\CourseRepositoryInterface;
use Backend\Repositories\Grade\GradeRepository;
use Backend\Repositories\Grade\GradeRepositoryInterface;
use Backend\Repositories\News\NewsRepository;
use Backend\Repositories\News\NewsRepositoryInterface;
use Backend\Repositories\Payment\PaymentRepository;
use Backend\Repositories\Payment\PaymentRepositoryInterface;
use Backend\Repositories\Permission\PermissionRepository;
use Backend\Repositories\Permission\PermissionRepositoryInterface;
use Backend\Repositories\Price\PriceRepository;
use Backend\Repositories\Price\PriceRepositoryInterface;
use Backend\Repositories\Recruitment\RecruitmentRepository;
use Backend\Repositories\Recruitment\RecruitmentRepositoryInterface;
use Backend\Repositories\Role\RoleRepository;
use Backend\Repositories\Role\RoleRepositoryInterface;
use Backend\Repositories\Room\RoomRepository;
use Backend\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Support\ServiceProvider as Service;


class RepositoryServiceProvider extends Service
{
    public function register()
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);

        $this->app->bind(RecruitmentRepositoryInterface::class, RecruitmentRepository::class);

        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);

        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);

        $this->app->bind(ClassroomRepositoryInterface::class, ClassroomRepository::class);

        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);

        $this->app->bind(PriceRepositoryInterface::class, PriceRepository::class);

        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);

        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);

        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
    }
}
