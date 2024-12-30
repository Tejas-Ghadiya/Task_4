@extends('Dilivary.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

</head>
<body>
    <body>
        <div class="terms-container">
            <h1>Terms and Conditions</h1>
            <p class="intro">
                Please read these terms and conditions carefully before providing delivery services with our company. By agreeing to these terms, you confirm your compliance with our rules and policies.
            </p>

            <h2>1. Responsibilities of the Delivery Person</h2>
            <ul>
                <li>Ensure timely pickup and delivery of parcels.</li>
                <li>Maintain professional behavior with customers at all times.</li>
                <li>Protect and handle parcels with care to prevent damage.</li>
            </ul>

            <h2>2. Eligibility Criteria</h2>
            <ul>
                <li>Must be at least 18 years old.</li>
                <li>Possess a valid driver's license and any necessary permits.</li>
                <li>Own a smartphone with GPS capabilities for navigation.</li>
            </ul>

            <h2>3. Prohibited Activities</h2>
            <ul>
                <li>Misuse of customer information or company resources.</li>
                <li>Engaging in any fraudulent or illegal activities.</li>
                <li>Delaying deliveries without valid reasons.</li>
            </ul>

            <h2>4. Payment and Compensation</h2>
            <ul>
                <li>Payments will be processed on a weekly basis.</li>
                <li>Compensation for each delivery will be agreed upon in advance.</li>
                <li>Bonus incentives may be provided for exceptional performance.</li>
            </ul>

            <h2>5. Termination Policy</h2>
            <ul>
                <li>The company reserves the right to terminate the agreement if the delivery person violates the terms.</li>
                <li>Delivery personnel may resign with prior notice of at least 7 days.</li>
            </ul>

            <p class="closing">
                By continuing as a delivery person, you agree to adhere to these terms and conditions. For any questions or concerns, please contact our support team.
            </p>

              @if (empty(session('terms_and_condition')))
                <form action="{{url('dilivary/terms_and_condition')}}" method="POST">
                  @csrf
                  @if (empty(session('id')))
                     <center><span class="error">You must be logged in to view this page.</span></center>
                  @else
                      <input type="hidden" name="did" value="{{session('id')}}">
                      <input type="hidden" name="terms_and_condition" value="1">
                      <button class="accept-button">I Accept</button>
                  @endif
            </form>
              @else
              <center><span class="sucess">Thank you for your cooperation. Please make sure to log in and accept the terms and conditions to proceed.</span></center>
              @endif


        </div>
    </body>
</body>
</html>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Dilivary/home.css') }}">
