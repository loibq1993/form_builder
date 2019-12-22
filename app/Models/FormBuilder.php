<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormBuilder extends Model
{
    protected $table = 'formbuilder_table';

    protected $fillable = ['title', 'start_date', 'end_date', 'status', 'description', 'site_id', 'form_builder'];
}
