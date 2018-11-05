@extends('layout.master.master')

@section('title','List of Issue Items')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    @if($_SESSION['user_master']->role_master_id == 3)
        <a href="{{url('issue/create')}}" class="btn btn-sm bg-danger btnSet btn-primary add- pull-right">
            <span class="fa fa-plus"></span>&nbsp;Issue Item</a>
    @endif
    <h3 class="heading">List of IssueItem</h3>
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
                    <th>Issue#</th>
                    <th>Issue Date</th>
                    <th>Issue Department</th>
                    <th>Issue By</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @if(count($issues)>0)
                    @foreach($issues as $issue)
                        <tr>
                            <td class="hidden">{{$issue->id}}</td>
                            <td id="{{$issue->id}}">
                                {{--<a href="{{url('Menu'.'/'.$issue->id.'/edit')}}" id="{{$issue->id}}"--}}
                                {{--class="btn btn-sm btn-default -user_"--}}
                                {{--title="Edit User">--}}
                                {{--<span class="fa fa-pencil"></span></a>--}}

                                {{--<button type="button" id="{{ $issue->id }}"--}}
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
                                    <ul id="{{$issue->id}}" class="dropdown-menu">
                                        <li><a href="#" id="{{$issue->id}}" class="view-list"><i class="fa fa-eye
                                        text-info">&nbsp;</i>View IssueList</a>
                                        </li>

                                    </ul>
                                </div>
                            <td>{{$issue->issue_no}}</td>
                            <td>{{date_format(date_create($issue->issue_date),'d-M-Y h:i A') }}</td>
                            <td>{{$issue->dept->name}}</td>
                            <td>{{$issue->user->name}}</td>
                            <td>{{$issue->description}}</td>

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
            $('.modal-title').html('Issue Item List');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/issue/" + id;
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
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('issue') }}/' + id +
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
                url: "{{ url('issue/create') }}",
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
        $(".edit-user_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Menu Issue');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/issue/" + id + "/edit";
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
    </script>
@stop
