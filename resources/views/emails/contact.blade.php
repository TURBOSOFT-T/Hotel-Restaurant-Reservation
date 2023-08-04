

<form action="{{ route('contact.submit') }}" method="POST">
    @csrf

    <div>
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="subject">Objet:</label>
        <input type="text" name="subject" id="subject" required>
    </div>

    <div>
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="5" required></textarea>
    </div>

    <button type="submit">Submit</button>
</form>
