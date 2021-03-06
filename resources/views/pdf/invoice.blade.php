<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>fundoe - factuur #{{$order->id}}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            /*line-height: inherit;*/
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        #footer {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            right: 0;
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="3">
                <table >
                    <tr>
                        <td class="title">
                            fundoe.nl
                            {{--<img src="" style="width:270px;">--}}
                        </td>
                        <td></td>

                        <td style="background: #eee;border-bottom: 1px solid #ddd; text-align: right">
                            <b>Factuur #{{$order->id}}</b> <br><br>
                            Aankoop datum: {{$order->created_at }}
                            {{--Verval datum: <br>{{Carbon\Carbon::parse($order->created_at->format('M d Y'))--}}
                                {{--->addDays(14)--}}
                                {{--->formatLocalized('%d %B %Y')}} <br>--}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td>
                            <b>Fundoe</b> <br>
                            Evestraat 28,<br>
                            5503XN Veldhoven,<br>
                            Nederland<br><br>
                            Site: www.fundoe.nl <br>
{{--                            Tel: +31 (0) 6 22527092<br>--}}
                            E-mail: contact@fundoe.nl<br>
{{--                            BTW: NL030760112B01<br>--}}
                            KvK: 74494694<br>
                        </td>
                        <td> </td>

                        <td  style="text-align: right">
                            {{$order->address}}
                            {{$order->address_number}},<br>
                            {{$order->postal_code}} {{$order->city}} <br>

                            <br>
                            {{$order->name}}<br>
                            {{$order->email}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Betaal Method
            </td>
            <td></td>

            <td>
                {{--Check #--}}
            </td>
        </tr>

        <tr class="details">
            <td>
                {{$order->payment_method}}
            </td>
            <td></td>
            <td>

            </td>
        </tr>

    </table>

    <table cellpadding="1" cellspacing="">

        <tr class="heading">
            <td style="width: 250px;">
                Activiteit
            </td>

            <td>
                Kaartjes
            </td>
            <td style="text-align: right">
                Stuk prijs
            </td>

            <td style="text-align: right">
{{--                Btw--}}
            </td>

            <td style="text-align: right">
                Totaal
            </td>


            {{--<td style="text-align: right">--}}
                {{--Btw--}}
            {{--</td>--}}
        </tr>

         <tr class="item">
            <td  style="padding: 10px 5px;">
                {!! !empty($order->event->activity['title']) ? $order->event->activity->title : ''!!} <br>
                {!! !empty($order->event['start_datetime']) ? $order->event->start_datetime->formatLocalized('%A, %d %B %Y') : ''!!} <br>
                van {!! !empty($order->event['start_datetime']) ? $order->event->start_datetime->formatLocalized('%H:%M') : ''!!}
                t/m {!! !empty($order->event['end_datetime']) ?  $order->event->end_datetime->formatLocalized('%H:%M') : ''!!} uur
            </td>
            <td style="padding: 10px 5px;">{!! $order->ticket_amount !!} x</td>
            <td style="text-align: right; padding: 10px 5px;">&euro;{!! number_format($order->total_paid / $order->ticket_amount, 2) !!}</td>
             <td style="text-align: right; padding: 10px 5px;">
{{--                 21%--}}
             </td>

             <td style="text-align: right; padding: 10px 5px;">&euro;{!!  number_format($order->total_paid, 2) !!}</td>
            {{--<td style="text-align: right; padding: 10px 5px; width: 60px;">&euro;{!!  number_format($order->total_paid - ($order->total_paid - ($order->total_paid / 121) * 21), 2) !!}</td>--}}
        </tr>

        <tr class="">
            <td> </td>
            <td> </td>
            <td> </td>
            <td colspan="2" style="text-align: right">
                <br>
                <br>
{{--                <b>BTW: <span >€{{number_format($order->total_paid - ($order->total_paid - ($order->total_paid / 121) * 21), 2)}}</span></b>--}}
            </td>
        </tr>

        <tr class=" ">
            <td> </td>
            <td> </td>
            <td> </td>
            <td colspan="2" style="text-align: right">
                <b>Totaal: <span >€{{$order->total_paid}}</span></b>
            </td>
        </tr>
    </table>

    {{--<div id='footer'>company information</div>--}}

</div>
</body>
</html>