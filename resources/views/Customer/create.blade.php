<h1>Add New Customer</h1>

<form action="/customers" method="POST">
    @csrf

    <div>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname">
    </div>
    <div>
        <label for="lastname">Lastname </label>
        <input type="text" name="lastname">
    </div>
    <div>
        <label for="email">Email </label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile">
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" name="address">
    </div>
    @csrf

    <button>Add New Customer</button>

</form>

