<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>

    <style type="text/css">

        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            line-height: 1.65; }

        img {
            max-width: 100%;
            margin: 0 auto;
            display: block; }

        body,
        .body-wrap {
            width: 100% !important;
            color: #000b2b;
            height: 100%;
            background: #fcfaf1;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none; }

        a {
            color: #ff4385;
            text-decoration: none; }

        .text-center {
            text-align: center; }

        .text-right {
            text-align: right; }

        .text-left {
            text-align: left; }

        .button {
            display: inline-block;
            color: white;
            background: #ff4385;
            background: -moz-linear-gradient(left, #ff4385 0%, #ff4040 4100%);
            background: -webkit-linear-gradient(left, #ff4385 0%, #ff8033 100%);
            background: linear-gradient(to right, #ff4385 0%, #ff8033 100%);
            border: transparent;
            font-weight: normal;
            border-radius: 50px;
            margin-bottom: 0;
            text-align: center;
            vertical-align: middle;
            touch-action: manipulation;
            cursor: pointer;
            white-space: nowrap;
            padding: 9px 25px;
            line-height: 1.42857143;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            text-transform: uppercase;
            font-size: 14px;
        }



        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 20px;
            line-height: 1.25; }

        h1 {
            font-size: 32px; }

        h2 {
            font-size: 28px; }

        h3 {
            font-size: 24px; }

        h4 {
            font-size: 20px; }

        h5 {
            font-size: 16px; }

        p, ul, ol {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 20px; }

        .container {
            display: block !important;
            clear: both !important;
            margin: 0 auto !important;
            max-width: 580px !important; }
        .container table {
            width: 100% !important;
            border-collapse: collapse; }
        .container .masthead {
            padding: 80px 0;
            background: #ff4385;
            color: white; }
        .container .masthead h1 {
            margin: 0 auto !important;
            max-width: 90%;
            text-transform: uppercase; }
        .container .content {
            background: white;
            padding: 30px 35px; }
        .container .content.footer {
            background: none; }
        .container .content.footer p {
            margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 14px; }
        .container .content.footer a {
            color: #888;
            text-decoration: none;
            font-weight: bold; }

    </style>
</head>
<body>
<table class="body-wrap">
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                        <h1><?php echo $data['project_name']; ?></h1>

                    </td>
                </tr>
                <tr>
                    <td class="content">

                        <h2>Tere</h2>

                        <p>
                            Uus projektiidee on lisatud kasutaja <?php echo $data['project_author']; ?> poolt.
                        </p>

                        <table>
                            <tr>
                                <td align="center">
                                    <p>
                                        <a href="<?php echo $data['project_url']; ?>" class="button">Vaata</a>
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                       <p><strong>ELU</strong> | <a href="http://elu.tlu.ee">elu.tlu.ee</a></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>