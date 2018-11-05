123<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bil Generate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    {{--<link rel="shortcut icon" type="images/png" href="images/dashbaord_fevicon.png"/>--}}
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}"/>
    <style type="text/css">
        .body_color {
            background-color: #e9e9e9;
        }

        .kot_table {
            background: #fff;
            min-height: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            margin-bottom: 20px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            -ms-border-radius: 2px;
            border-radius: 2px;
            margin-top: 20px;
        }

        .center_headtxt {
            display: inline-block;
            width: 100%;
            font-size: 20px;
        }

        .small_head {
            display: inline-block;
            width: 100%;
        }

        .right_txt {
            text-align: right;
        }
    </style>
    <script>
        function myFunction() {
            window.print();
        }
    </script>
</head>
<body class="body_color" onload="myFunction()">
<div class="container">
    <table class="kot_table table">
        <tbody>
        <tr>
            <td colspan="2" style="text-align: center;">
                <span class="center_headtxt"> KOT </span>
            </td>
        </tr>
        <tr colspan="2">
            <td>Order No : {{$odr->order_no}}</td>
            <td class="right_txt">Table : {{$tbl->Tbl_No}}</td>
        </tr>
        <tr colspan="2">
            <td>KOT No : {{$odr->KOTNO}}</td>
            <td class="right_txt">Steward : {{$odr->InsertedBy}}</td>
        </tr>
        <tr>
            <td colspan="2">Date :{{ date_format(date_create($odr->OrderDate), "d-M-Y h:i A")}}</td>
        </tr>
        <tr>
            <td><br><br><br></td>
        </tr>
        <tr>
            <td>Particulars</td>
            <td class="right_txt">Qty</td>
        </tr>
        @if(count($orderdes)>0)
            @foreach($orderdes as $orderde)
                <tr>
                    <td>{{$orderde->m_name}}</td>
                    <td class="right_txt">{{$orderde->qty}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
</body>
</html>