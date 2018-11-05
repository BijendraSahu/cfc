@extends('layout.master.master')

@section('title','List of Emp Type')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="{{url('Employee/create')}}" class="btn btn-sm bg-danger btnSet btn-primary add- pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Employee</a>
    <h3 class="heading">List of Employee</h3>
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
                    <th>Joining Date</th>
                    <th>Emp Name</th>
                    <th>Contact No</th>
                    <th>Alt No</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Employee)>0)
                    @foreach($Employee as $Employee)
                        <tr>
                            <td class="hidden">{{$Employee->EmpId}}</td>
                            <td id="{{$Employee->EmpId}}">
                                <a href="#" id="{{$Employee->EmpId}}" class="btn btn-sm btn-default edit-unit_"
                                   title="Edit unit">
                                    <span class="fa fa-pencil"></span></a>
                                {{--@if($_SESSION['user_master']->id != $user_master->id)--}}

                                <button type="button" id="{{ $Employee->EmpId }}"
                                        class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                                {{--@endif--}}
                            </td>
                            <td>{{$Employee->JoiningDate}}</td>
                            <td>{{$Employee->Emp_Name}}</td>
                            <td>{{$Employee->ContactNo}}</td>
                            <td>{{$Employee->Alt_No}}</td>
                            <td>{{$Employee->DOB}}</td>
                            <td>{{$Employee->Gender}}</td>
                            <td>{{$Employee->Addr}}</td>

                        </tr>
                    @endforeach
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
            $('#myModal .modal-title').html('Confirm Detletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to Delete this Employee<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('Employee') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnActive').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Activation');
            $('#myModal .modal-body').html('<h5>Are you sure want to activate this user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('user_master') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Employee');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('Employee/create') }}",
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
        $(".edit-unit_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Employee Details');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/Employee/" + id + "/edit";
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