<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Gate;

class DefineRole
{
    public function setGateAndPolicy()
    {
        $this->defineCategory();
        $this->defineGrade();
        $this->defineCourse();
        $this->defineClassroom();
        $this->defineTeacher();
        $this->defineStudent();
        $this->defineCalendar();
        $this->defineSchedule();
        $this->defineRole();
        $this->definePermission();
    }

    public function defineCategory()
    {
        Gate::define('category-list', 'Modules\Admin\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'Modules\Admin\Policies\CategoryPolicy@create');
        Gate::define('category-update', 'Modules\Admin\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'Modules\Admin\Policies\CategoryPolicy@delete');
    }

    public function defineGrade()
    {
        Gate::define('grade-list', 'Modules\Admin\Policies\GradePolicy@view');
        Gate::define('grade-add', 'Modules\Admin\Policies\GradePolicy@create');
        Gate::define('grade-update', 'Modules\Admin\Policies\GradePolicy@update');
        Gate::define('grade-delete', 'Modules\Admin\Policies\GradePolicy@delete');
    }

    public function defineCourse()
    {
        Gate::define('course-list', 'Modules\Admin\Policies\CoursePolicy@view');
        Gate::define('course-add', 'Modules\Admin\Policies\CoursePolicy@create');
        Gate::define('course-update', 'Modules\Admin\Policies\CoursePolicy@update');
        Gate::define('course-delete', 'Modules\Admin\Policies\CoursePolicy@delete');
    }

    public function defineClassroom()
    {
        Gate::define('classroom-list', 'Modules\Admin\Policies\ClassroomPolicy@view');
        Gate::define('classroom-add', 'Modules\Admin\Policies\ClassroomPolicy@create');
        Gate::define('classroom-update', 'Modules\Admin\Policies\ClassroomPolicy@update');
        Gate::define('classroom-delete', 'Modules\Admin\Policies\ClassroomPolicy@delete');
    }

    public function defineTeacher()
    {
        Gate::define('teacher-list', 'Modules\Admin\Policies\TeacherPolicy@view');
        Gate::define('teacher-add', 'Modules\Admin\Policies\TeacherPolicy@create');
        Gate::define('teacher-update', 'Modules\Admin\Policies\TeacherPolicy@update');
        Gate::define('teacher-delete', 'Modules\Admin\Policies\TeacherPolicy@delete');
    }

    public function defineStudent()
    {
        Gate::define('student-list', 'Modules\Admin\Policies\StudentPolicy@view');
        Gate::define('student-add', 'Modules\Admin\Policies\StudentPolicy@create');
        Gate::define('student-update', 'Modules\Admin\Policies\StudentPolicy@update');
        Gate::define('student-delete', 'Modules\Admin\Policies\StudentPolicy@delete');
    }

    public function defineCalendar()
    {
        Gate::define('calendar-list', 'Modules\Admin\Policies\CalendarPolicy@view');
        Gate::define('calendar-add', 'Modules\Admin\Policies\CalendarPolicy@create');
        Gate::define('calendar-update', 'Modules\Admin\Policies\CalendarPolicy@update');
        Gate::define('calendar-delete', 'Modules\Admin\Policies\CalendarPolicy@delete');
    }

    public function defineSchedule()
    {
        Gate::define('schedule-list', 'Modules\Admin\Policies\SchedulePolicy@view');
        Gate::define('schedule-add', 'Modules\Admin\Policies\SchedulePolicy@create');
        Gate::define('schedule-update', 'Modules\Admin\Policies\SchedulePolicy@update');
        Gate::define('schedule-delete', 'Modules\Admin\Policies\SchedulePolicy@delete');
    }

    public function defineRole()
    {
        Gate::define('role-list', 'Modules\Admin\Policies\RolePolicy@view');
        Gate::define('role-add', 'Modules\Admin\Policies\RolePolicy@create');
        Gate::define('role-update', 'Modules\Admin\Policies\RolePolicy@update');
        Gate::define('role-delete', 'Modules\Admin\Policies\RolePolicy@delete');
    }

    public function definePermission()
    {
        Gate::define('permission-list', 'Modules\Admin\Policies\PermissionPolicy@view');
        Gate::define('permission-add', 'Modules\Admin\Policies\PermissionPolicy@create');
        Gate::define('permission-update', 'Modules\Admin\Policies\PermissionPolicy@update');
        Gate::define('permission-delete', 'Modules\Admin\Policies\PermissionPolicy@delete');
    }


}
