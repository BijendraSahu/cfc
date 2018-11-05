@extends('layout.master.master')

@section('title','Bill List')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}

    <h3 class="heading bg-success">List of Bills</h3>
    <hr/>
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row fa-border">
        <div class="container-fluid">
            <table id="dataTable" class="display compact" cellspacing="0" width="100%">
                <thead>
                <tr class="bg-info">
                    <th class="text-center">Option</th>
                    <th class="text-center">Bill Status</th>
                    <th class="text-center">Bill Date</th>
                    <th class="text-center">Bill No</th>
                    <th class="text-center">Bill Amt</th>
                    <th class="text-center">Stevard</th>
                    <th class="text-center">Table No</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">Chargeable</th>
                </tr>
                </thead>
                <tbody>
                @if(count($bills)>0)
                    @foreach($bills as $bill)
                        <tr>
                            <td class="hidden">{{$bill->id}}</td>
                            <td id="{{$bill->id}}">
                                <div class="btn-group action">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Options
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul id="{{$bill->id}}" class="dropdown-menu">
                                        <li><a href="{{url('bill').'/'.$bill->id.'/print'}}" target="_blank"
                                               class="">
                                                <span class="fa fa-print"></span> Print Bill</a>
                                        </li>
                                        @if($bill->is_settle == 1)
                                            <li>
                                                <p class="bg-success">Settled</p>
                                            </li>
                                        @else
                                            <li><a href="{{url('settle_bill').'/'.$bill->id}}" target="_blank"
                                                   class="">
                                                    <span class="fa fa-wrench"></span> Settle Bill</a>
                                            </li>
                                        @endif
                                        {{--<li><a href="{{url('bill').'/'.$bill->id.'/print'}}" target="_blank"--}}
                                        {{--class="">--}}
                                        {{--<span class="fa fa-print"></span> Settle Bill</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                            </td>
                            <td> @if($bill->is_settle == 1)

                                    <p class="bg-success">Settled</p>


                                @else
                                    <a href="{{url('settle_bill').'/'.$bill->id}}" target="_blank"
                                       class="">
                                        <span class="bg-danger"></span>Unsettle Bill</a>


                                @endif
                                {{--<a href="{{url('bill').'/'.$bill->id.'/print'}}" target="_blank"--}}
                                {{--class="">--}}
                                {{--<span class="fa fa-print"></span> Settle Bill</a>--}}
                            </td>
                            <td>{{ date_format(date_create($bill->bill_date), "d-M-Y h:i A")}}</td>
                            <td>{{ $bill->bill_no }}</td>
                            <td>{{ $bill->total_amt }}</td>
                            <td>{{ $bill->stevard }}</td>
                            <td>{{ $bill->table_no }}</td>
                            <td>{{ $bill->payment_mode == null ? "-":$bill->payment_mode}}</td>
                            <td>{{ $bill->is_free == 0 ? "Payable":"Free"}}</td>
                            {{--<td>@if($bill->is_booked == 1) <p class="bg-danger">Booked</p>--}}
                            {{--@else--}}
                            {{--<p class="bg-success">Available</p>--}}
                            {{--@endif--}}
                            {{--</td>--}}
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
            $('#myModal .modal-title').html('Confirm Deletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this bill<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('bill') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
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
