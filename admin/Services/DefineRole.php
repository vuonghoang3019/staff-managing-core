<?php

namespace Admin\Services;

use Illuminate\Support\Facades\Gate;

class DefineRole {
    public function setGateAndPolicy()
    {
        $this->defineCategory();
        $this->defineGrade();
        $this->defineCourse();
        $this->defineClassroom();
        $this->defineTeacher();
        $this->defineStudent();
        $this->defineSchedule();
        $this->defineRole();
        $this->definePermission();
    }

    public function defineCategory()
    {
        Gate::define('category-list', 'Backend\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'Backend\Policies\CategoryPolicy@create');
        Gate::define('category-update', 'Backend\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'Backend\Policies\CategoryPolicy@delete');
    }

    public function defineGrade()
    {
        Gate::define('grade-list', 'Backend\Policies\GradePolicy@view');
        Gate::define('grade-add', 'Backend\Policies\GradePolicy@create');
        Gate::define('grade-update', 'Backend\Policies\GradePolicy@update');
        Gate::define('grade-delete', 'Backend\Policies\GradePolicy@delete');
    }

    public function defineCourse()
    {
        Gate::define('course-list', 'Backend\Policies\CoursePolicy@view');
        Gate::define('course-add', 'Backend\Policies\CoursePolicy@create');
        Gate::define('course-update', 'Backend\Policies\CoursePolicy@update');
        Gate::define('course-delete', 'Backend\Policies\CoursePolicy@delete');
    }

    public function defineClassroom()
    {
        Gate::define('classroom-list', 'Backend\Policies\ClassroomPolicy@view');
        Gate::define('classroom-add', 'Backend\Policies\ClassroomPolicy@create');
        Gate::define('classroom-update', 'Backend\Policies\ClassroomPolicy@update');
        Gate::define('classroom-delete', 'Backend\Policies\ClassroomPolicy@delete');
    }

    public function defineTeacher()
    {
        Gate::define('teacher-list', 'Backend\Policies\TeacherPolicy@view');
        Gate::define('teacher-add', 'Backend\Policies\TeacherPolicy@create');
        Gate::define('teacher-update', 'Backend\Policies\TeacherPolicy@update');
        Gate::define('teacher-delete', 'Backend\Policies\TeacherPolicy@delete');
    }

    public function defineStudent()
    {
        Gate::define('student-list', 'Backend\Policies\StudentPolicy@view');
        Gate::define('student-add', 'Backend\Policies\StudentPolicy@create');
        Gate::define('student-update', 'Backend\Policies\StudentPolicy@update');
        Gate::define('student-delete', 'Backend\Policies\StudentPolicy@delete');
    }

    public function defineSchedule()
    {
        Gate::define('schedule-list', 'Backend\Policies\SchedulePolicy@view');
        Gate::define('schedule-add', 'Backend\Policies\SchedulePolicy@create');
        Gate::define('schedule-update', 'Backend\Policies\SchedulePolicy@update');
        Gate::define('schedule-delete', 'Backend\Policies\SchedulePolicy@delete');
    }

    public function defineRole()
    {
        Gate::define('role-list', 'Backend\Policies\RolePolicy@view');
        Gate::define('role-add', 'Backend\Policies\RolePolicy@create');
        Gate::define('role-update', 'Backend\Policies\RolePolicy@update');
        Gate::define('role-delete', 'Backend\Policies\RolePolicy@delete');
    }

    public function definePermission()
    {
        Gate::define('permission-list', 'Backend\Policies\PermissionPolicy@view');
        Gate::define('permission-add', 'Backend\Policies\PermissionPolicy@create');
        Gate::define('permission-update', 'Backend\Policies\PermissionPolicy@update');
        Gate::define('permission-delete', 'Backend\Policies\PermissionPolicy@delete');
    }


}
