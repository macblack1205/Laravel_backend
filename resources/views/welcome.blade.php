<!-- resources/views/test-form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
</head>
<body>
    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <!-- First Name -->
        <label for="first">First Name:</label>
        <input type="text" id="first" name="first" value="{{ old('first') }}" required>
        @if ($errors->has('first'))
            <div style="color: red;">{{ $errors->first('first') }}</div>
        @endif
        <br>

        <!-- Last Name -->
        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last" value="{{ old('last') }}" required>
        @if ($errors->has('last'))
            <div style="color: red;">{{ $errors->first('last') }}</div>
        @endif
        <br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <div style="color: red;">{{ $errors->first('email') }}</div>
        @endif
        <br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @if ($errors->has('password'))
            <div style="color: red;">{{ $errors->first('password') }}</div>
        @endif
        <br>

        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        @if ($errors->has('password_confirmation'))
            <div style="color: red;">{{ $errors->first('password_confirmation') }}</div>
        @endif
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
