<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Bulkio') }}</title>
</head>
<body style="margin:0;padding:0;background:#f6f7fb;color:#17202a;font-family:Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="padding:24px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:12px;border:1px solid #e5e7eb;overflow:hidden;">
                    <tr>
                        <td style="padding:24px;background:#111827;color:#ffffff;font-size:22px;font-weight:700;">
                            {{ config('app.name', 'Bulkio') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px 24px 8px 24px;font-size:16px;line-height:1.7;color:#1f2937;">
                            {!! nl2br(e($bodyText)) !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 24px 24px 24px;font-size:12px;line-height:1.6;color:#6b7280;">
                            Recibiste este correo porque te suscribiste al newsletter de {{ config('app.name', 'Bulkio') }}.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>