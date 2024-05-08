<!doctype html>
<html lang="en">

<head>
    <title>otp verification</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="contanner d-flex p-auto vh-100 ">
            <div class="container col-md-4 my-auto mx-auto">
                <h1>OTP Verification</h1>
                <p>Please enter the OTP code sent to your email.</p>

                @if (!session()->has('new_password'))
                    <form method="post" action="{{ url()->current() }}">
                    @else
                        @php
                        $url= str_replace('otp', 'user/forgetotp', url()->current());
                        @endphp
                        <form method="post" action="{{$url}}">
                @endif

                @csrf
                <div class="mb-3">
                    <label for="otp" class="form-label">OTP Code:</label>
                    <input type="text" name="otp" id="otp"
                        class="form-control @error('otp') is-invalid @enderror" required>
                    @error('otp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
