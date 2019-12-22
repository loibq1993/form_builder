@extends('index')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-sm-10">
                        <span>Index page</span>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{route('create')}}" class="btn btn-primary">+</a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">Title</th>
                                <th width="10%">Status</th>
                                <th width="20%">Start date</th>
                                <th width="20%">End date</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($data) && count($data))
                            @foreach($data as $key => $item)
                                <td>{{$key}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->start_date}}</td>
                                <td>{{$item->end_date}}</td>
                                <th scope="row" width="300">
                                    <a href="{{ route('edit', $item['id']) }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
{{--                                        <a href="{{ route('detail', $item['id']) }}" class="btn btn-primary">--}}
{{--                                            <i class="fa fa-eye">Detail</i>--}}
{{--                                        </a>--}}
                                    <a class="btn btn-danger" href="{{ route('delete', $item['id']) }}" data-toggle="modal" data-target="#modal-delete-record" data-href="{{ route('delete', $item['id']) }}" >
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </th>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="999" class="text-center">{{ __('presentApplication.backend.index.no_questionnaire') }}</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
