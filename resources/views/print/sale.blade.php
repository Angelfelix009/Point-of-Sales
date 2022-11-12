<table>
    <tr>
        <td colspan="2" align='center'><strong>Navigand Nigeria Limited<br> INVOICE<br><strong><br>
                    <br></strong></td>

    </tr>
    <tr>
        <td colspan="2">
            <table>
                <tr>
                    <td>Date: @php echo date("Y-m-d",strtotime($data->created_at)) @endphp</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td> No:{{$data->sales_invoice}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td>S/N</td>
                    <td>Name</td>
                    <td>Qty</td>
                    <td>Rate</td>
                    <td>Price</td>
                </tr>
                @php
                    $no=0;
                    $tamount =0;
                @endphp

                @foreach($sales_order as $staff)
                    @php
                        $no+=1;
                    $tamount +=$staff->amount;
                    @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$staff->goods_name}}</td>
                        <td>{{$staff->quantity}} {{$staff->goods->unit}}</td>
                        <td>{{$staff->unit_price}}</td>
                        <td>{{$staff->amount}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan ="4"><strong>Total Amount</strong></td>
                    <td><strong>N{{$tamount}}.00K</strong></td>
                </tr>
                <tr>
                    <td colspan ="4">Discount</td>
                    <td>N{{$data->discount}}.00K</td>
                </tr>

                @if($data->payment_method == 'Debt')
                    <tr>
                        <td colspan ="4">Paid</td>
                        <td>N{{$debt->part_payment}}.00K</td>
                    </tr>
                    <tr>
                        <td colspan ="4">Customer to Balance</td>
                        <td>N{{$debt->balance}}.00K</td>
                    </tr>
                @else
                    <tr>
                        <td colspan ="4"><strong>Amount Paid</strong></td>
                        <td><strong>N{{$data->netPrice}}.00K</strong></td>
                    </tr>
                @endif

                <tr>
                    <td colspan="4">Sold By: {{$data->user}}</td>
                </tr>
                <tr>
                    <td colspan="4">Thank you for your Patronage</td>
                </tr>
                <tr>
                    <td colspan="4">Goods bought are not returnable</td>
                </tr>
                <tr>
                    <td colspan="4">-----------------------------------</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;&nbsp;</td>
                    <td colspan="4">&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><button onclick="window.print()">Print</button></td>
                </tr>
                <tr>
                    <td colspan="4"><a href="/reg-sales?ref= @php  echo ('RS-'.rand(0005,10000).date('D-M-Y, g:i a')); @endphp">Back</a> </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

