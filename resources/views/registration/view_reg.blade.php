@extends('layout.master.master')

@section('title','List of Registrations')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="{{url('registration/create')}}" class="btn btn-sm bg-danger btnSet btn-primary  pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New</a>
    <h3 class="heading">List of Registrations</h3>
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
                    <th>REG#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Paid Amount</th>
                    {{--<th>Address</th>--}}
                    <th>Type</th>
                    <th>Registration Date</th>
                </tr>
                </thead>
                <tbody>
                @if(count($registrations)>0)
                    @foreach($registrations as $registration)
                        <tr>
                            <td class="hidden">{{$registration->Regid}}</td>
                            {{--<td id="{{$registration->id}}">--}}
                                {{--<a href="{{url('registration/'.$registration->Regid.'/edit')}}" id="{{$registration->Regid}}" class="btn btn-sm btn-default -user_"--}}
                                   {{--title="Edit Registration">--}}
                                    {{--<span class="fa fa-pencil"></span></a>--}}
                                {{--<a href="{{url('barcode').'/'.$registration->Regid}}" target="_blank"--}}
                                   {{--id="{{$registration->Regid}}"--}}
                                   {{--class="btn btn-sm btn-primary"--}}
                                   {{--title="Print Barcode">--}}
                                    {{--<span class="fa fa-print"></span></a>--}}
                              {{----}}
                                {{--<button type="button" id="{{ $registration->Regid }}"--}}
                                        {{--class="btn btn-sm btn-success btnScan" title="Scan"><span--}}
                                            {{--class="fa fa-align-center" aria-hidden="true"></span></button>--}}
                             {{----}}
                            {{--</td>--}}
                            <td>{{$registration->reg_full}}</td>
                            <td>{{$registration->Name}}</td>
                            <td>{{$registration->Contact_No}}</td>
                            <td>{{$registration->total_amount}}</td>
                            {{--<td>{{$registration->Addr}}</td>--}}
                            <td>@if($registration->type == "Stag") <p class="bg-success">Stag</p>
                                @else
                                    <p class="bg-danger">Couple</p>
                                @endif
                            </td>
                            <td> {{ date_format(date_create($registration->InsertDate), "d-M-Y h:i A")}}</td>
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
            $('#myModal .modal-title').html('Confirm Inactivation');
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this registration<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('registration') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnScan').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Scanning');
            $('#myModal .modal-body').html('<h5>Are you sure want to scan this register user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('registration') }}/' + id +
                '/scan"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Create Registration');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('registration/create') }}",
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
            $('.modal-title').html('Edit Registration');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/registration/" + id + "/edit";
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

        $(".reset-pass").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Reset Password');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/registration/" + id + "/resetPassword";
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
//            var i = 0;
//            $('#dataTable thead th').each(function () {
//                var style = 'input-sm';
//                if (i < 2)
//                    style += " hidden";
//                else
//                    style += " datatable-col";
//                var title = $(this).text();
//                $('#table_filter').append('<input id="' + i + '" type="text" class="' + style + '" placeholder="' + title + '" />');
//                i++;
//            });

// DataTable
            var table = $('#dataTable').DataTable({
                "columnDefs": [
                    {"width": "20px", "targets": 0}
                ],
                "order": [[0, "desc"]]
            });

            $('.datatable-col').on('keyup change', function () {
                table.column($(this).attr('id')).search($(this).val()).draw();
            });
        });
    </script>
@stop
