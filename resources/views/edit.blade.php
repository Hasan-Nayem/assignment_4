<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Management Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/bf4a6c619a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/index.css') }}">
</head>

<body>
    <div class="layout">
        <div class="container basic-margin basic-width">
            <h2 class="text-center text-white my-3">Contact Management Application</h2>
            <div class="bg-white p-3" style="border-radius: 0.5rem">
                <h2 class="text-center bg-white">Edit Contact</h2>
                <form action="{{ route('contact.update', $contact->id) }}" method="POST" class="form-control bg-white">
                    @csrf
                    @method('PUT')
                    <div class="form-group bg-white mb-2">
                        <label for="name" class="bg-white">Name</label>
                        <input type="text" name="name" id="name" class="form-control bg-white"
                            value="{{ $contact->name }}">
                    </div>
                    <div class="form-group bg-white mb-2">
                        <label for="email" class="bg-white">Email</label>
                        <input type="text" name="email" id="email" class="form-control bg-white"
                            value="{{ $contact->email }}">
                    </div>
                    <div class="form-group bg-white mb-2">
                        <label for="phone" class="bg-white">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control bg-white"
                            value="{{ $contact->phone }}">
                    </div>
                    <div class="form-group bg-white mb-2">
                        <label for="address" class="bg-white">Address</label>
                        <textarea name="address" id="address" class="form-control text-justify" cols="30" rows="3">{{ $contact->address }}</textarea>
                    </div>
                    <div class="form-group bg-white mt-3 mb-2">
                        <input type="submit" class="form-control btn btn-success">
                    </div>
                </form>
                <div class="form-group bg-white mt-3 mb-2">
                    <a href="{{ route('contact.index') }}" class="btn btn-danger form-control">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
