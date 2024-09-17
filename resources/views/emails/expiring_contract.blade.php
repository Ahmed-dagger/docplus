<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Expiring Soon</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0;">
    <div style="background-color: #ffffff; max-width: 600px; margin: 20px auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #007bff; color: #ffffff; padding: 10px; text-align: center; border-radius: 8px 8px 0 0;">
            <h1 style="margin: 0;">Doctor Contract Expiring Soon</h1>
        </div>
        <div style="padding: 20px;">
            <h1 style="font-size: 24px; margin-bottom: 20px;">Hello,</h1>
            <p style="margin: 10px 0; line-height: 1.6;">The contract for the following doctor is expiring soon. Please review the details below and take the necessary actions:</p>
            
            <table style="width: 100%; margin: 20px 0; border-collapse: collapse;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; background-color: #f8f9fa; text-align: left;">Doctor Name</th>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $doctor->name }}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; background-color: #f8f9fa; text-align: left;">Email</th>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $doctor->email }}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; background-color: #f8f9fa; text-align: left;">Phone</th>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $doctor->phone }}</td>
                </tr>
            </table>

            <h3 style="margin-bottom: 10px;">Contract Details:</h3>
            <table style="width: 100%; margin: 20px 0; border-collapse: collapse;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; background-color: #f8f9fa; text-align: left;">Contract Start Date</th>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $contract->contract_start_date }}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; background-color: #f8f9fa; text-align: left;">Contract End Date</th>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $contract->contract_end_date }}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; background-color: #f8f9fa; text-align: left;">Notes</th>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $contract->contract_note }}</td>
                </tr>
            </table>

            <p style="margin: 20px 0;">Please review the contract and take the necessary action.</p>
            <a href="#" style="background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">Review Contract</a>
        </div>

        <div style="text-align: center; margin-top: 30px; font-size: 14px; color: #888;">
            <p>&copy; {{ date('Y') }} DoctoriaPlus. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
