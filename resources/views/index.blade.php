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
            <form action="{{ route('contact.search') }}" method="POST" class="">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Search Contact"
                        aria-label="Username" aria-describedby="basic-addon1" value="{{ old('title') }}">
                    <input type="submit" class="btn btn-success" value="Search">
                    {{-- <span class="input-group-text" id="basic-addon1"><i
                            class="fa-solid fa-magnifying-glass bg-white"></i></span> --}}
                </div>
            </form>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('contact.sort') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="sort_by" class="text-white">Select to Sort</label>
                                <select name="sort_by" id="" class="form-control">
                                    <option class="text-dark bg-white">Select Options</option>
                                    <option value="name" class="text-dark bg-white">Name</option>
                                    <option value="created_at" class="text-dark bg-white">Date Created</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <input type="submit" value="Sort" class="form-control btn btn-warning">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4 text-center">
                    <a href="{{ route('contact.create') }}" class="btn btn-success mt-4 form-control">Add new
                        Contact</a>
                </div>
            </div>

            <div class="my-5 list-contents">
                @if (Session::has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($contacts->count() == 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        No contacts added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    @foreach ($contacts as $contact)
                        <div class="row p-2 mb-2" style="background-color: white; border-radius: 0.5rem">
                            <div class="col-lg-10 bg-white">
                                <div class=" bg-white">
                                    <h4 class=" bg-white">{{ $contact->name }}</h4>
                                    <div class="row bg-white">
                                        <div class="col-lg-5 bg-white">Phone: {{ $contact->phone }}</div>
                                        <div class="col-lg-5 bg-white">Email: {{ $contact->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 bg-white mt-4 text-center">
                                <a href="{{ route('contact.show', $contact->id) }}" class="bg-white me-1"><i
                                        class="fa-solid fa-eye text-warning
                        bg-white"></i></a>
                                <a href="{{ route('contact.edit', $contact->id) }}" class="bg-white me-1"><i
                                        class="fa-solid fa-pen text-success
                        bg-white"></i></a>
                                <a href="#" class="bg-white" data-bs-toggle="modal"
                                    data-bs-target="#{{ $contact->id }}"><i
                                        class="fa-solid fa-trash text-danger bg-white"></i></a>

                            </div>
                        </div>
                        {{-- modal start --}}
                        <div class="modal fade" id="{{ $contact->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bg-white">
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title bg-white" id="exampleModalLabel">Deleting Contacts</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-white">
                                        Do you want to delete <span
                                            class="bg-white fw-bolder">{{ $contact->name }}</span>
                                        from contact?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST"
                                            class="form-inline bg-white">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal end --}}
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
