<?php

function courseDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    $options = ['' => 'Select Course'];

    return Form::select($name, $options, $selected, $attributes);
}

function levelDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    $options = ['' => 'Select Level'];

    foreach (\App\Models\Fixtures\LevelFixture::all() as $row) {
        $options[$row->id] = $row->name;
    }

    return Form::select($name, $options, $selected, $attributes);
}

function documentTypeDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    $options = ['' => 'Select Type'];

    foreach (\App\Models\Fixtures\DocumentTypeFixture::all() as $row) {
        $options[$row->id] = $row->name;
    }

    return Form::select($name, $options, $selected, $attributes);
}

function documentStatusDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    foreach (\App\Models\Fixtures\DocumentStatusFixture::all() as $row) {
        $options[$row->id] = $row->name;
    }

    return Form::select($name, $options, $selected, $attributes);
}

function videoTypeDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    $options = ['' => 'Select Type'];

    foreach (\App\Models\Fixtures\VideoTypeFixture::all() as $row) {
        $options[$row->id] = $row->name;
    }

    return Form::select($name, $options, $selected, $attributes);
}

function videoStatusDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    foreach (\App\Models\Fixtures\VideoStatusFixture::all() as $row) {
        $options[$row->id] = $row->name;
    }

    return Form::select($name, $options, $selected, $attributes);
}

function departmentDropdown($name, $selected, $attributes): \Illuminate\Support\HtmlString
{
    $options = ['' => 'Select Department'];

    $rows = Cache::remember('departments', 3600,
        fn () => \App\Models\Department::query()->get()
    );

    foreach ($rows as $row) {
        $options[$row->id] = $row->department_name;
    }

    return Form::select($name, $options, $selected, $attributes);
}
