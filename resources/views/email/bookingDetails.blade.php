Dear {{$mailData['name']}},

<p>Thank you for booking an appointment with: {{$mailData['doctorName']}}</p>
<p>The details of your appointment are below:</p>
Time & Date: {{$mailData['time']}}, {{$mailData['date']}}<br>
with: Dr. {{$mailData['doctorName']}}<br>
Address: {{$mailData['doctorAddress']}}<br>
<br>
Sincerely,<br>

MedBook Team