<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    <style>
        .main {
            padding: 10px;
            background-color: rgb(244, 243, 243);
            border-radius: 7px;
        }

        .body {
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
            margin-top: 10px;
            padding: 5px;
            background-color: white;
            border-radius: 3px;

        }

        .footer {
          
            font-family: 'Times New Roman', Times, serif;
            font-style: italic;
            font-size: 20px;
            margin-top: 10px;
            
        }
    </style>
</head>

<body>

    <div class="main">
        <h1 style="text-align:center; font-size:25px">Fitness Hub</h1>
        <div class="body">
          <span style="font-size: 20px">Dear {{$mailData['name']}},</span>
          <p>Thank you for reaching out to us. This email is in response to your query.</p>
          <p style="font-style: italic">{{ $mailData['body'] }}</p>
          <p >Thank you for your patience and understanding. Please do not hesitate to contact us if you have any further
            questions or concerns.</p>

          <p>
            Team fitness Hub
          </p>
        </div>
        <p class="footer">
          Contect :
          <a style="font-size:18px; text-decoration: none;" href="tel:+91 9408895506">+91 9408850506</a>
        </p>
        <p class="footer">
          Visit Our site : 
          <a style="font-size:18px; text-decoration: none;" href="{{url('/')}}"> {{url('/')}}</a>
        </p>
    </div>

</body>

</html>
