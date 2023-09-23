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
<style>@page {size: 800px 1100px; margin:0!important; padding:10px!important}</style>

    <div class="" style="width: 792px;">
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
</body>
</html>
