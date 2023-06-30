<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        a {
            text-decoration: none;
            color: #000000;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            background-color: #eeeeee;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        #head_title_text {
            font-size: 27px;
            font-weight: 800;
            margin: 0;
            color: #ffffff;
            text-align: center;
        }

        #head_title {
            font-family: Open Sans, Helvetica, Arial, sans-serif;
            font-size: 36px;
            font-weight: 800;
            line-height: 48px;
        }

        .mail_table {
            border: 0;
            padding: 0;
            letter-spacing: 0;
            width: 100%;
            text-align: center;
        }

        .al-t {
            font-family: Open Sans, Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            padding: 5px 10px;
            text-align: left;
            color: #000000;
        }

        .w-50 {
            width: 50%;
            word-break: break-all;
        }

        .lk-btn {
            font-size: 18px;
            font-family: Open Sans, Helvetica, Arial, sans-serif;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            background-color: #F44336;
            padding: 15px 30px;
            border: 1px solid #F44336;
            display: block;
        }

        .description-row {
            font-family: Open Sans, Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            padding-top: 15px;
        }

        .description-row h2 {
            font-size: 27px;
            font-weight: 800;
            line-height: 36px;
            color: #333333;
            margin: 0;
        }

        .description-row img {
            width: 125px;
            height: 120px;
            display: block;
            border: 0;
        }
    </style>

<body>
<table class="mail_table">
    <tr>
        <td align="center" style="background-color: #eeeeee;">
            <table class="mail_table" style="max-width:600px;">
                <tr>
                    <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
                        <div
                            style="display:inline-block;min-width:100px; vertical-align:top; width:100%;">
                            <table class="mail_table">
                                <tr>
                                    <td align="left" valign="top" id="head_title" class="mobile-center">
                                        <h1 id="head_title_text">Заявка на обратный звонок</h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 0 35px 20px 35px; background-color: #ffffff;"
                        bgcolor="#ffffff">
                        <table class="mail_table">
                            <tr>
                                <td align="center" class="description-row">
                                    <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"/>
                                    <h2>Контактные данные клиента</h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                                    <hr>
                                    <table class="mail_table">
                                        @if(!empty($lead->full_name))
                                            <tr>
                                                <td class="al-t w-50">Ф.И.О.</td>
                                                <td class="al-t w-50">{{$lead->full_name}}</td>
                                            </tr>
                                        @endif
                                        @if(!empty($lead->phone))
                                            <tr>
                                                <td class="al-t w-50">Номер телефона</td>
                                                <td class="al-t w-50">
                                                    <a href="tel:{{$lead->phone}}">{{$lead->phone}}</a>
                                                </td>
                                            </tr>
                                        @endif
                                        @if(!empty($lead->email))
                                            <tr>
                                                <td class="al-t w-50">E-mail</td>
                                                <td class="al-t w-50">{{$lead->email}}</td>
                                            </tr>
                                        @endif
                                        @if(!empty($lead->comment))
                                            <tr>
                                                <td class="al-t w-50">Комментарий</td>
                                                <td class="al-t w-50">{{$lead->comment}}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 35px; background-color: #ff7361;">
                        <table class="mail_table">
                            <tr>
                                <td>
                                    <table class="mail_table">
                                        <tr>
                                            <td style="border-radius: 5px;">
                                                <a href="{{$post_link}}" target="_blank" class="lk-btn">
                                                    Просмотреть объявление
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
