@extends('layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-10">
        <div class="content p-1">
            <div class="row">
                <div class="col-4">
                    @include('flash-message')
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-center align-items-center">
                <div class="card col-md-4 bg-white shadow-md p-5">
                    <div class="mb-4 text-center">
                        <span><i class="mdi mdi-format-page-break text-danger" style="font-size: 10rem;"></i></span>
                    </div>
                    <div class="text-center">
                        <h1>{{$exception}}</h1>
                        <p>You will be redirected to the Dashboard automatically in <br><span class="text-success" id="countdown" style="font-size: 2rem">5</span> seconds.</p>
                        <a href="{{ route('home') }}" class="btn btn-outline-success">Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')
    <script>
        // Countdown timer
        let seconds = 5;
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            countdownElement.textContent = seconds;
            if (seconds <= 0) {
                window.location.href = "{{ route('home') }}";
            } else {
                seconds--;
                setTimeout(updateCountdown, 1000);
            }
        }

        // Start the countdown
        updateCountdown();
    </script>
@endsection
