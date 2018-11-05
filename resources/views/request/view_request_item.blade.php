@extends('layout.master.master')

@section('title','List of Request Items')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    @if($_SESSION['user_master']->role_master_id == 4 || $_SESSION['user_master']->role_master_id == 5)
        <a href="{{url('request_item/create')}}" class="btn btn-sm bg-danger btnSet btn-primary add- pull-right">
            <span class="fa fa-plus"></span>&nbsp;Create Request</a>
    @endif
    <h3 class="heading">List of Request</h3>
    <hr/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    <div class="row fa-border">
        <div class="container-fluid">
            <table id="dataTable" class="display compact" cellspacing="0" width="100%">
                <thead>
                <tr class="bg-info">
                    <th class="hidden">Id</th>
                    <th class="options">Options</th>
                    <th>Request Date</th>
                    <th>Request Dept</th>
                    <th>Request By</th>
                    <th>Accept/Reject By</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>View Reason</th>
                </tr>
                </thead>
                <tbody>
                @if(count($requests)>0)
                    @foreach($requests as $request)
                        <tr>
                            <td class="hidden">{{$request->id}}</td>
                            <td id="{{$request->id}}">
                                {{--<a href="{{url('Menu'.'/'.$request->id.'/edit')}}" id="{{$request->id}}"--}}
                                {{--class="btn btn-sm btn-default -user_"--}}
                                {{--title="Edit User">--}}
                                {{--<span class="fa fa-pencil"></span></a>--}}

                                {{--<button type="button" id="{{ $request->id }}"--}}
                                {{--class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span--}}
                                {{--class="fa fa-trash-o" aria-hidden="true"></span></button>--}}

                                {{--</td>--}}
                                <div class="btn-group action">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Options
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul id="{{$request->id}}" class="dropdown-menu">
                                        <li><a href="#" id="{{$request->id}}" class="view-list"><i class="fa fa-eye
                                        text-info">&nbsp;</i>View RequestList</a>
                                        </li>
                                        @if($request->status_id == 1 && $_SESSION['user_master']->role_master_id == 3)
                                            <li><a href="#" id="{{$request->id}}" class="accept"><i class="fa fa-check
                                        text-info">&nbsp;</i>Approve Request</a>
                                            </li>
                                            <li><a href="#" id="{{$request->id}}" class="reject"><i class="fa fa-crosshairs
                                        text-info">&nbsp;</i>Reject Request</a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            <td>{{date_format(date_create($request->request_date),'d-M-Y h:i A') }}</td>
                            <td>{{$request->dept->name}}</td>
                            <td>{{$request->user->name}}</td>
                            <td>@if($request->accept_by != null)
                                    {{$request->userAccept->name}}
                                @elseif($request->reject_by != null)
                                    {{$request->user->name}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{$request->description}}</td>
                            <td>@if($request->status_id == 1)
                                    <p class="bg-warning">{{$request->status->status}}</p>
                                @elseif($request->status_id == 2)
                                    <p class="bg-success">{{$request->status->status}}</p>
                                @else
                                    <p class="bg-danger">{{$request->status->status}}</p>
                                @endif
                            </td>
                            <td>
                                <a href="#" title="Click to view Reason" class="text-success view-comment"><strong>View
                                    </strong></a>
                                <div id="comment" class="comments hidden">{!!$request->reason!!}</div>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <script>
        $(".view-list").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Menu Request List');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/request_item/" + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        });


        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Inactivation');
            $('#myModal .modal-body').html('<h5>Are you sure want to Inactivate this user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('request_item') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Menu Ingrediect');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('request_item/create') }}",
                success: function (data) {
                    $('.modal-body').html(data);
//            $('#modelBtn').visible(disabled);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });

        });
        $(".accept").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Approve Request');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/request/" + id + "/accept";
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        });
        $(".reject").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Reject Request');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/request/" + id + "/reject";
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        });

        $(document).ready(function () {
            var table = $('#dataTable').DataTable({
                "columnDefs": [
                    {"width": "20px", "targets": 0}
                ]
            });

            $('.datatable-col').on('keyup change', function () {
                table.column($(this).attr('id')).search($(this).val()).draw();
            });
        });

        $(".view-comment").click(this, function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Communication Process');
            $('.modal-body').html($(this).parent().find('.comments').html());

        });
    </script>
@stop
