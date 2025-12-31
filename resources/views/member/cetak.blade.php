<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>

    <style>
        .box {
            position: relative;
            width: 85.6mm;
            height: 54mm;
            border-radius: 8px;
            overflow: hidden;
            background-image: url("{{ public_path('img/member.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }

        .box img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .card {
            width: 85.60mm;
        }

        .logo {
            position: absolute;
            top: 3pt;
            right: 0pt;
            font-size: 16pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }

        .logo p {
            text-align: right;
            margin-right: 16pt;
        }

        .logo img {
            position: absolute;
            margin-top: -5pt;
            width: 40px;
            height: 40px;
            right: 16pt;
        }

        .nama {
            position: absolute;
            top: 100pt;
            right: 16pt;
            font-size: 12pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }

        .telepon {
            position: absolute;
            top: 120pt;
            right: 16pt;
            color: #fff;
        }

        .barcode {
            position: absolute;
            top: 7.5rem;
            left: .860rem;
            background: #fff;
            padding: 2px;
            border-radius: 4px;
            border: 1px solid #fff;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <section style="border: 1px solid #fff">
        <table width="100%">
            @foreach ($datamember as $key => $data)
                <tr>
                    @foreach ($data as $item)
                        <td class="text-center">
                            <div class="box">
                                <div class="logo">
                                    <p>{{ config('app.name') }}</p>
                                    <img src="{{ public_path('img/icon_pnc.png') }}" alt="logo">
                                </div>

                                <div class="nama">{{ $item->nama }}</div>
                                <div class="telepon">{{ $item->telepon }}</div>

                                <div class="barcode">
                                    <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($item->kode_member, 'QRCODE') }}"
                                        alt="qrcode">
                                </div>
                            </div>
                        </td>

                        @if (count($datamember) == 1)
                            <td class="text-center" style="width: 50%;"></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </section>
</body>

</html>
