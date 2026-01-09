<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>E-Ticket | {{ $registration->event->title }}</title>
    <style>
        /* CSS Khusus PDF - Harus Inline atau Internal */
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            padding: 20px;
        }

        .ticket-box {
            border: 2px solid #333;
            padding: 0;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .content {
            padding: 20px;
        }

        .row {
            display: table;
            width: 100%;
        }

        .col {
            display: table-cell;
            vertical-align: top;
        }

        .col-left {
            width: 65%;
            padding-right: 20px;
        }

        .col-right {
            width: 35%;
            text-align: center;
            border-left: 2px dashed #ccc;
            padding-left: 20px;
        }

        .label {
            font-size: 10px;
            color: #777;
            text-transform: uppercase;
            margin-bottom: 2px;
            display: block;
        }

        .value {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
            display: block;
        }

        .big-value {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #ddd;
        }

        .qr-img {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }

        .token-text {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>

    <div class="ticket-box">
        <div class="header">
            <h1>TIKET MASUK</h1>
        </div>

        <div class="content">
            <div class="row">
                <div class="col col-left">
                    <span class="label">Nama Acara</span>
                    <span class="big-value">{{ $registration->event->title }}</span>
                    <br>

                    <span class="label">Waktu & Tanggal</span>
                    <span class="value">
                        {{ \Carbon\Carbon::parse($registration->event->event_date)->isoFormat('dddd, D MMMM Y') }}
                    </span>

                    <span class="label">Lokasi</span>
                    <span class="value">{{ $registration->event->location }}</span>

                    <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">

                    <span class="label">Nama Peserta</span>
                    <span class="value">{{ $registration->name }}</span>

                    <span class="label">Email</span>
                    <span class="value">{{ $registration->email }}</span>
                </div>

                <div class="col col-right">
                    <span class="label">Scan QR di Pintu Masuk</span>

                    <img class="qr-img" src="data:image/svg+xml;base64, {!! base64_encode(QrCode::format('svg')->size(300)->generate($registration->qr_code_token)) !!} ">
                    <div class="token-text">{{ $registration->qr_code_token }}</div>

                    <div style="margin-top: 20px;">
                        <span class="label">Status</span>
                        @if ($registration->is_attended)
                            <span style="color: green; font-weight: bold;">SUDAH HADIR</span>
                        @else
                            <span style="color: blue; font-weight: bold;">BELUM CHECK-IN</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            Harap simpan tiket ini. Tunjukkan kepada petugas saat registrasi ulang.<br>
            Project Event Organizer © {{ date('Y') }}
        </div>
    </div>

</body>

</html>
