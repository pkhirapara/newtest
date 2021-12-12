<h1> Customers </h1>

<a href="/customers/create">Add New Customer</a>

@foreach($customers as $customer)
    <p><strong>{{ $customer->firstname }}</strong> ({{$customer->email}})</p>
@endforeach
