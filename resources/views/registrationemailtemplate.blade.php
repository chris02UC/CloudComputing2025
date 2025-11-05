<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        /* Basic Resets */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; /* Clean, modern font stack */ }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #ffffff; /* White background */ }
        a { color: #3498db; /* A slightly brighter blue */ text-decoration: none; font-weight: 500;}
        p { margin: 0 0 1em 0; }
        h1 { margin: 0; color: #ffffff; font-weight: 500; font-size: 24px; }
        h2 { margin: 0 0 1em 0; color: #333333; font-weight: 600; font-size: 18px; }
    </style>
</head>
<body style="margin: 0 !important; padding: 20px !important; background-color: #ffffff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.7; color: #555555; font-size: 16px;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center">
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                <td align="center" valign="top" width="600">
                <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #f7f9fc; /* Very light blue/gray background */ border: 1px solid #dee5ed; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 6px rgba(0,0,0,0.04);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="padding: 25px 20px; background-color: #3498db; /* Brighter blue header */ border-bottom: 1px solid #dee5ed;">
                            <h1>📧 New Message Received!</h1>
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="margin-bottom: 25px;">Hi {{ $name }}!</p>
                            <p style="margin-bottom: 25px;">Just wanted to let you know that your message via our contact form has been successfully received! ✨ We're glad you reached out. Here's a quick recap of the details you sent:</p>

                            <h2 style="border-bottom: 2px solid #e0e0e0; padding-bottom: 5px; margin-bottom: 20px;">Confirmation Details:</h2>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 10px 0; color: #777777; width: 35%;">👤 Name:</td>
                                    <td style="padding: 10px 0 10px 10px; color: #333333; font-weight: 500;">{{ $name }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; border-top: 1px solid #eeeeee; color: #777777;">✉️ Email:</td>
                                    <td style="padding: 10px 0 10px 10px; border-top: 1px solid #eeeeee; color: #333333;"><a href="mailto:{{ $email }}" style="color: #3498db;">{{ $email }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; border-top: 1px solid #eeeeee; color: #777777;">📌 Subject:</td>
                                    <td style="padding: 10px 0 10px 10px; border-top: 1px solid #eeeeee; color: #333333; font-weight: 500;">{{ $subject }}</td>
                                </tr>
                                @if(isset($appointment_date) && $appointment_date !== 'Not specified')
                                <tr>
                                    <td style="padding: 10px 0; border-top: 1px solid #eeeeee; color: #777777;">🗓️ Preferred Date:</td>
                                    <td style="padding: 10px 0 10px 10px; border-top: 1px solid #eeeeee; color: #333333; font-weight: 500;">{{ $appointment_date }}</td>
                                </tr>
                                @endif
                            </table>

                            <p style="margin: 0 0 10px 0; color: #777777; font-weight: 500;">📝 Message Content:</p>
                            <div style="background-color: #ffffff; padding: 20px; border-radius: 6px; border: 1px solid #dee5ed; color: #444444; line-height: 1.7;">
                                {{ $emailContent }}
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding: 25px 30px; background-color: #edf2f7; /* Slightly darker footer */ border-top: 1px solid #dee5ed; font-size: 13px; color: #888888;">
                            This automated message was sent from <a href="{{ config('app.url') }}" style="color: #3498db;">{{ config('app.name') }}</a>. Please do not reply directly to this email.
                        </td>
                    </tr>

                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>

</body>
</html>