@extends('layout.master.master')

@section('title','Stock Report')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <h3 class="heading">Stock Report</h3>
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
                    {{--<th class="options">Options</th>--}}
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Issue Qty</th>
                    <th>Balance Qty</th>
                </tr>
                </thead>
                <tbody>
                @if(count($stocks)>0)
                    @foreach($stocks as $stock)
                        <tr>
                            <td class="hidden">{{$stock->id}}</td>
                            {{--<td id="{{$stock->id}}">--}}
                            {{--<div class="btn-group action">--}}
                            {{--@if($stock->is_ready == 0)--}}
                            {{--<button type="button" class="btn btn-sm btn-success dropdown-toggle"--}}
                            {{--data-toggle="dropdown"--}}
                            {{--aria-haspopup="true" aria-expanded="false">Options--}}
                            {{--<span class="caret"></span>--}}
                            {{--<span class="sr-only">Toggle Dropdown</span>--}}
                            {{--</button>--}}
                            {{--<ul id="{{$stock->id}}" class="dropdown-menu">--}}
                            {{--<li><a href="#" id="{{$stock->id}}" class="mark-complete"><i class="fa fa-eye--}}
                            {{--text-info">&nbsp;</i>Mark As Complete</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--@else--}}
                            {{--N/A--}}
                            {{--@endif--}}

                            {{--</div>--}}

                            {{--</td>--}}

                            <td>{{$stock->ItemName}}</td>
                            <td>@if($stock->UnitID != null)
                                    {{$stock->menuUnit->UnitName}}
                                @endif
                            </td>
                            <td>{{$stock->issue_qty}}</td>
                            <td>{{$stock->available_qty}}</td>
                        </tr>
                    @endforeach
                @else
                    NO Record Available;
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <script>
        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Inactivation');
            $('#myModal .modal-body').html('<h5>Are you sure want to Inactivate this Menu Item<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('Menu') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });
        $('.mark-complete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Completion');
            $('#myModal .modal-body').html('<h5>Are you sure want to Mark this as complete<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('order') }}/' + id +
                '/complete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Menu');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('Menu/create') }}",
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
            $('.modal-title').html('Edit Menu');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/Menu/" + id + "/edit";
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
