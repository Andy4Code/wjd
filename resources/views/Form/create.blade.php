<form action="{{ route('form.store') }}" method="POST">
    @csrf

    <input type="text" name="text" placeholder="text" value={{ old('text') }}>
    @error('text')
        <span style="color:darkred"> {{ $message }} </span>
    @enderror
    <br>
    <input type="email" name="email" placeholder="email@example.com" value={{ old('email') }}>
    @error('email')
        <span style="color:darkred"> {{ $message }} </span>
    @enderror
    <br>
    <input type="phone" name="phone" placeholder="+966123456789" value={{ old('phone') }}>
    @error('phone')
        <span style="color:darkred"> {{ $message }} </span>
    @enderror
    <br>

    <input type="url" name="url" placeholder="https://url" value={{ old('url') }}>
    @error('url')
        <span style="color:darkred"> {{ $message }} </span>
    @enderror
    <br>
    <input type="submit">
</form>
