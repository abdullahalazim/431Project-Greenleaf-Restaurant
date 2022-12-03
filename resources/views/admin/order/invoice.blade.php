<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Green leaf Invoice</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
      * {
        box-sizing: border-box;
      }

      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        word-break: break-all;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 16px;
      }
      .h4-14 h4 {
        font-size: 12px;
        margin-top: 0;
        margin-bottom: 5px;
      }
      .img {
        margin-left: "auto";
        margin-top: "auto";
        height: 30px;
      }
      pre,
      p {
        /* width: 99%; */
        /* overflow: auto; */
        /* bpicklist: 1px solid #aaa; */
        padding: 0;
        margin: 0;
      }
      table {
        font-family: arial, sans-serif;
        width: 100%;
        border-collapse: collapse;
        padding: 1px;
      }
      .hm-p p {
        text-align: left;
        padding: 1px;
        padding: 5px 4px;
      }
      td,
      th {
        text-align: left;
        padding: 8px 6px;
      }
      .table-b td,
      .table-b th {
        border: 1px solid #ddd;
      }
      th {
        /* background-color: #ddd; */
      }
      .hm-p td,
      .hm-p th {
        padding: 3px 0px;
      }
      .cropped {
        float: right;
        margin-bottom: 20px;
        height: 100px; /* height of container */
        overflow: hidden;
      }
      .cropped img {
        width: 400px;
        margin: 8px 0px 0px 80px;
      }
      .main-pd-wrapper {
        box-shadow: 0 0 10px #ddd;
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
      }
      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
      }
      .invoice-items {
        font-size: 14px;
        border-top: 1px dashed #ddd;
      }
      .invoice-items td{
        padding: 14px 0;

      }
    </style>
  </head>
  <body>
    <section class="main-pd-wrapper" style="width: 450px; margin: auto; margin-top:4%">
      <div style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">
               <h1 style="color: #00cd00">Green leaf Restaurant </h1>

                <p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 18px;">
                  Invoice
                </p>
                <p style="margin: 15px auto;">
                    Mirpur-2, Dhaka Bangladesh

                </p>
                <p>
                  <b>Name:</b> {{ $order->name }}
                </p>
                <p>
                  <b>Phone:</b> {{ $order->phone }}
                </p>
                <p>
                  <b>Table No.:</b> {{ $order->table_no }}
                </p>
                <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
              </div>
              <table style="width: 100%; table-layout: fixed">
                <thead>
                  <tr>
                    <th style="width: 50px; padding-left: 0;">Sl.</th>
                    <th style="width: 220px;">Item Name</th>
                    <th>QTY</th>
                    <th style="">Price</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $total_amount = 0;
                    @endphp
                    @foreach (App\Models\Cart::where('order_id', $order->id)->get(); as $item)
                        <tr class="invoice-items">
                            <td>{{ $loop->index + 1 }}</td>
                            <td >{{$item->product ? $item->product->name: ''}}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{$item->product->price* $item->quantity}}Tk</td>
                            <?php
                                $total_amount +=$item->product->price*$item->quantity;
                            ?>
                      </tr>
                    @endforeach

                </tbody>
              </table>

              <table style="width: 100%;
              background: #fcbd024f;
              border-radius: 4px;">
                <thead>
                  <tr>
                    <th>Total</th>
                    <th style="text-align: center;">Item</th>
                    <th>&nbsp;</th>
                    <th style="text-align: right;">{{$total_amount}}Tk</th>

                  </tr>
                </thead>

              </table>
              <br>
              <button style="background: rgb(0, 128, 128); color:white; padding:10px" onclick="window.print()">Print Invoice</button>

    </section>
  </body>
</html>
