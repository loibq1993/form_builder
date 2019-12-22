@extends('index')
@section('content')
    <form action="{{route('store')}}" id="form-builder-pages" method="post" class="col-md-12">
        @csrf
        <div class="form_data row">
            <div class="col-md-6">
               <div class="form-group">
                   <label class="col-sm-3 control-label" for="title">
                       <strong>
                           Title
                       </strong>
                   </label>
                   <div class="col-sm-9">
                       <input id="title" class="form-control form-control-lg" type="text" name="title" placeholder="Title" value="{{old('title')}}"/>
                       @error('title')
                           <div class="alert alert-danger">{{$message}}</div>
                       @enderror
                   </div>
               </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="status">
                        <strong>
                            status
                        </strong>
                    </label>
                    <div class="col-sm-9">
                        <select id="status" class="form-control" name="status" value="{{old('status')}}">
                            <option value="0">Hide</option>
                            <option value="1">Show</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="start_date">
                        <strong>
                            Start date
                        </strong>
                    </label>
                    <div class="col-sm-9">
                        <input id="start_date" class="form-control form-control-lg" type="text" name="start_date" placeholder="2019-11-20" value="{{old('start_date')}}"/>
                        @error('start_date')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="end_date">
                        <strong>
                            End date
                        </strong>
                    </label>
                    <div class="col-sm-9">
                        <input id="end_date" class="form-control form-control-lg" type="text" name="end_date" placeholder="2019-12-20" value="{{old('end_date')}}"/>
                        @error('end_date')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label" for="description">
                    <strong>
                        Description
                    </strong>
                </label>
                <textarea id="description" name="description" placeholder="Description" class="form-control form-control-lg">{{old('description')}}</textarea>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="form_builder" value="{{old('form_builder')}}" id="form_builder">
            </div>
        </div>
        <div class="row form-builder">
            <ul id="tabs" class="nav nav-tabs">
                <li class="nav-item"><a href="#page-1" class="nav-link active" data-toggle="tab" >Page 1</a></li>
                <li id="add-page-tab" class="nav-item"><a href="#new-page" >+ Page</a></li>
            </ul>
            <div id="page-1" class="fb-editor"></div>
            <div id="new-page"></div>
        </div>
    </form>
    <form class="toggle-input toggle-type-0" action="" id="formPreview" target="_blank" method="post">
        @csrf
        <input name="preview" type="hidden" value="" id="preview">
    </form>
@endsection
