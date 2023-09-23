<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

     {{-- <table style="text-align:center">
        <tr>
            <td colspan="5" id="header"><img src="./uploads/header.png" alt="" srcset=""></td>
        </tr>
        <tr>
            <td rowspan="3"><img src="./uploads/left-side-bar.png" alt="" srcset=""></td>
            <td colspan="3"><span style="font-size: 50px;">Abdur Rehman</span></td>
            <td rowspan="3"><img src="./uploads/right-side-bar.png" alt="" srcset=""></td>
        </tr>
        <tr>
            <td colspan="3"><img src="./uploads/middle.png" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>date</td>
            <td><img src="./uploads/logo.png" alt="" srcset=""></td>
            <td>sign</td>
        </tr>
        <tr>
            <td colspan="5"><img src="./uploads/bottom-bar.png" alt="" srcset=""></td>
        </tr>

    </table> --}}
<style>
@page {size: 800px 1100px; margin:0!important; padding:10px!important}

.page_break { page-break-before: always; }
</style>

    <div class="" style="width: 792px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <img src="./uploads/header.png" style="margin-left: 3px;" alt="" srcset="">

        <table style="width: 100%;margin-top:-32px;">
            <tr>
            <td ><img src="./uploads/left-side-bar.png" alt="" srcset=""></td>
            <td style="vertical-align: top;text-align:center"><span style="font-size: 50px; display:block;padding-top:15px; text-transform:capitalize;">{{Auth::user()->name}}</span>
                <img src="./uploads/middle.png" alt="" width="100%" srcset="">
                <table style="margin: auto">
                    <tr>
                        <td style="vertical-align: bottom;   padding-bottom: 25px;">
                            <p style="font-size: 20px;text-align:center">{{\Carbon\Carbon::now()->format('d / M , Y')}}</p>
                            <img src="./uploads/underline.png" alt="" srcset="">
                            {{-- <p style="border-bottom: 3px solid #c49a6c"></p> --}}
                        </td>
                        <td>
                            <img src="./uploads/logo.png" alt="" srcset="">

                        </td>
                        <td style="vertical-align: bottom;text-align:center;  padding-bottom: 25px;">
                            <img src="./uploads/signature.png" alt="" srcset="">
                            <img src="./uploads/underline.png" alt="" srcset="">
                        </td>
                    </tr>
                </table>
            </td>
            <td style="text-align: right;"><img src="./uploads/right-side-bar.png" alt="" srcset=""></td>
        </tr>
        </table>
        <img src="./uploads/bottom.png" style="margin-top: -32px;    margin-left: 3px;" alt="" srcset="">
    </div>

<div class="page_break"></div>

    <table style="width:336px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; margin:auto; border:1px solid gray;">
        <tr>
            <td rowspan="2"><img src="./uploads/small-left-side.png" alt="" srcset=""></td>
            <td style="font-weight: bold;text-align:right;vertical-align:top">
                <img src="./uploads/dots.png" alt="" srcset="">
                <p style="margin: 0px;font-size:25px;">{{Auth::user()->name}}</p>
                <p style="margin-top: 0px;font-weight:normal;">Associate</p>
            </td>
        </tr>
         <tr>
            <td style="vertical-align: bottom;"><img src="./uploads/phone.png" alt="" srcset=""> <span> {{Auth::user()->mobile}}</span> <br>
            <img src="./uploads/email.png" alt="" srcset=""> <span> {{Auth::user()->email}}</span>
            </td>
        </tr>
    </table>

<br><br><br>

    <table style="width: 192px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;margin:auto; border:1px solid gray">
        <tr>
            <td><img src="./uploads/small-top.png" alt="" srcset=""></td>
        </tr>
        <tr><td style="text-align: center;font-weight:bolder;">{{Auth::user()->name}}
            <p style="text-align: right; font-weight:normal;margin-top:0px;">Associate</p>
        </td></tr>
        <tr>
            <td><img src="./uploads/phone.png" alt="" srcset=""> <span> {{Auth::user()->mobile}}</span></td>
        </tr>
        <tr>
            <td><img src="./uploads/email.png" alt="" srcset=""> <span> {{Auth::user()->email}}</span></td>
        </tr>
    </table>


</body>
</html>
