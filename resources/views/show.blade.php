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
            <div class="bg-white p-3"style="border-radius: 0.5rem">
                <a href="{{ route('contact.index') }}" class="btn btn-warning"><i
                        class="fa-solid fa-left-long bg-warning
            fs-5
            me-3"></i>Go back</a>
                <div class="mt-3 bg-white">
                    <h4 class="fw-bold bg-white mb-2">Name: <span class="fw-bolder bg-white">{{ $contact->name }}</span>
                    </h4>
                    <p class="mb-2 bg-white"><span class="bg-white fw-bold">Email:</span> {{ $contact->email }}</p>
                    <p class="mb-2 bg-white"><span class="bg-white fw-bold">Phone:</span> {{ $contact->phone }}</p>
                    <p class="mb-2 bg-white text-justify"><span class="bg-white fw-bold">Address:</span>
                        {{ $contact->address }}
                    </p>
                    <p class="mb-2 bg-white text-justify"><span class="bg-white fw-bold">Created at:</span>
                        {{ $contact->created_at }}
                    </p>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
