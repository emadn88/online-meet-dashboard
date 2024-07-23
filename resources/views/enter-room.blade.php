<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>OnlineAcademy</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset('logo.png')}}" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{session('error')}}
        </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Access Your Room</h3>
                    </div>
                    <div class="card-body">
                        @if($room_object->status)
                            <form action="{{route('enter-room-post', ['room' => $room])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="password" class="form-control text-center" id="password" name="password" required placeholder="Enter Room Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Enter</button>
                            </form>
                        @else
                            <div class="alert alert-danger text-center">
                                This room is currently disabled.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
