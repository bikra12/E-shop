@extends('LoginMaster')

@section('content')
<h3>New Contact Form Message</h3>
<p>Name: {{ $details['name'] }}</p>
<p>Email: {{ $details['email'] }}</p>
<p>Subject: {{ $details['subject'] }}</p>
<p>Message: {{ $details['message'] }}</p>

@endsection
