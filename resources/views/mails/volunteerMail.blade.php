<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Volunteer Request</title>
    <style>
        /* Base styles for email clients */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            color: #333333;
            -webkit-font-smoothing: antialiased;
        }

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

        /* Header styling */
        .header {
            background-color: #BB8EE0;
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Body content */
        .content {
            padding: 30px;
        }

        .intro-text {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 25px;
            color: #555555;
        }

        /* Table for data pairs */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            text-align: left;
            padding: 12px 15px;
            background-color: #f8fafc;
            border-bottom: 1px solid #edf2f7;
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
            width: 35%;
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #edf2f7;
            font-size: 15px;
            color: #1e293b;
            font-weight: 500;
        }

        /* Message area */
        .message-box {
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #2563eb;
            margin-top: 20px;
        }

        .message-label {
            display: block;
            font-size: 12px;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .message-content {
            font-size: 15px;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <table class="main" role="presentation">
            <!-- Header -->
            <tr>
                <td class="header">
                    <h1>Volunteer Request</h1>
                </td>
            </tr>

            <!-- Content -->
            <tr>
                <td class="content">
                    <p class="intro-text">
                        Hello, <br>
                        A new volunteer request has been submitted through your website. Below are the details provided
                        by the applicant:
                    </p>

                    <table class="data-table">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $data->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $data->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td><a href="mailto:{{ $data->email }}"
                                    style="color: #2563eb; text-decoration: none;">{{ $data->email }}</a></td>
                        </tr>
                    </table>

                    <div class="message-box">
                        <span class="message-label">Additional Message</span>
                        <div class="message-content">
                            {{ $data->message }}
                        </div>
                    </div>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td class="footer">
                    &copy; {{ date('Y') }} <a href="https://myseniorsupportsolutions.com/">Senior Support
                        Solutions</a>. All rights reserved.<br>
                    This is an automated notification. Please do not reply directly to this email.
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
