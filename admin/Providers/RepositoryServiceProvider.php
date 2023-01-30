<?php

namespace Admin\Providers;

use Admin\Repositories\About\AboutRepository;
use Admin\Repositories\About\AboutRepositoryInterface;
use Admin\Repositories\Classroom\ClassroomRepository;
use Admin\Repositories\Classroom\ClassroomRepositoryInterface;
use Admin\Repositories\Contact\ContactRepository;
use Admin\Repositories\Contact\ContactRepositoryInterface;
use Admin\Repositories\Course\CourseRepository;
use Admin\Repositories\Course\CourseRepositoryInterface;
use Admin\Repositories\Grade\GradeRepository;
use Admin\Repositories\Grade\GradeRepositoryInterface;
use Admin\Repositories\News\NewsRepository;
use Admin\Repositories\News\NewsRepositoryInterface;
use Admin\Repositories\Payment\PaymentRepository;
use Admin\Repositories\Payment\PaymentRepositoryInterface;
use Admin\Repositories\Permission\PermissionRepository;
use Admin\Repositories\Permission\PermissionRepositoryInterface;
use Admin\Repositories\Price\PriceRepository;
use Admin\Repositories\Price\PriceRepositoryInterface;
use Admin\Repositories\Recruitment\RecruitmentRepository;
use Admin\Repositories\Recruitment\RecruitmentRepositoryInterface;
use Admin\Repositories\Role\RoleRepository;
use Admin\Repositories\Role\RoleRepositoryInterface;
use Admin\Repositories\Room\RoomRepository;
use Admin\Repositories\Room\RoomRepositoryInterface;
use Admin\Repositories\Schedule\ScheduleRepository;
use Admin\Repositories\Schedule\ScheduleRepositoryInterface;
use Admin\Repositories\Slider\SliderRepository;
use Admin\Repositories\Slider\SliderRepositoryInterface;
use Admin\Repositories\Student\StudentRepository;
use Admin\Repositories\Student\StudentRepositoryInterface;
use Admin\Repositories\Teacher\TeacherRepository;
use Admin\Repositories\Teacher\TeacherRepositoryInterface;
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

        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);

        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);

        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);

        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
    }
}
