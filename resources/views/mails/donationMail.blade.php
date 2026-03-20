<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Donation Notification</title>
    <style>
        /* General Reset */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
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
            background-color: #f4f7f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333333;
        }

        /* Layout Styles */
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f4f7f9;
            padding-bottom: 40px;
        }

        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Header */
        .header {
            background-color: #BB8EE0;
            padding: 40px 20px;
            text-align: center;
            color: #ffffff;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .header p {
            margin: 10px 0 0;
            font-size: 16px;
            opacity: 0.9;
        }

        /* Content */
        .content {
            padding: 30px 40px;
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 10px;
        }

        /* Data Table */
        .data-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .data-table td {
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
        }

        .label {
            font-weight: 600;
            color: #475569;
            width: 120px;
            font-size: 15px;
        }

        .value {
            color: #1e293b;
            font-size: 15px;
        }

        .amount-highlight {
            color: #059669;
            font-weight: 700;
            font-size: 18px;
        }

        /* Message Box */
        .message-box {
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 20px;
            border-left: 4px solid #cbd5e1;
            margin-top: 10px;
            font-style: italic;
            line-height: 1.6;
            color: #334155;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #94a3b8;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .content {
                padding: 20px;
            }

            .label {
                width: 100px;
                font-size: 14px;
            }

            .value {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <table role="presentation" class="main">
            <!-- Header -->
            <tr>
                <td class="header">
                    <h1>New Donation Received</h1>
                    <p>You have received a new contribution through the website.</p>
                </td>
            </tr>

            <!-- Body Content -->
            <tr>
                <td class="content">
                    <div class="section-title">Donor Details</div>
                    <table role="presentation" class="data-table">
                        <tr>
                            <td class="label">Name</td>
                            <td class="value">{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <td class="label">Email</td>
                            <td class="value"><a href="mailto:{{ $data->email }}"
                                    style="color: #2563eb; text-decoration: none;">{{ $data->email }}</a></td>
                        </tr>
                        <tr>
                            <td class="label">Phone</td>
                            <td class="value">{{ $data->phone }}</td>
                        </tr>
                        <tr>
                            <td class="label">Amount</td>
                            <td class="value amount-highlight">${{ number_format($data->amount, 2) }}</td>
                        </tr>
                    </table>

                    <div class="section-title">Message from Donor</div>
                    <div class="message-box">
                        {{ $data->message ? $data->message : 'No message provided.' }}
                    </div>
                </td>
            </tr>

            <!-- Action Area (Optional) -->
            <tr>
                <td style="padding: 0 40px 40px; text-align: center;">
                    <a href="#"
                        style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 12px 25px; border-radius: 5px; text-decoration: none; font-weight: 600; font-size: 14px;">View
                        in Dashboard</a>
                </td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>This is an automated notification from your website's donation system.</p>
            <p>&copy; {{ date('Y') }} <a href="https://myseniorsupportsolutions.com/">Senior Support Solutions</a>.
                All rights reserved.</p>
        </div>
    </div>
</body>

</html>
