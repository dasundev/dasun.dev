@extends('layouts.payhere')

@section('content')
    <body class="flex items-center justify-center h-screen bg-white text-black dark:bg-black dark:text-gray-200 font-sans">
    <div class="container mx-auto p-4 max-w-2xl">
        <noscript>Your browser does not support JavaScript!</noscript>
        <div>
            <h1 class="text-xl md:text-2xl font-medium dark:text-white">Redirecting...</h1>
            <p class="text-sm lg:text-lg dark:text-gray-100">You will be redirected to the payment gateway in a few seconds.</p>
            <div class="progress-bar mt-4" role="progressbar" aria-valuetext="Redirecting...">
                <div class="progress-bar-value"></div>
            </div>
            <div class="mt-2">
                <em class="text-sm lg:text-md text-gray-500">Please do not refresh the page or click the "Back" or "Close" button of your browser.</em>
            </div>
        </div>
        <form id="checkout-form" action="{{ $data['other']['action'] }}" method="post">
            @foreach ($data['other'] as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            @foreach ($data['customer'] as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            @isset($data['recurring'])
                <input type="hidden" name="recurrence" value="{{ $data['recurring']['recurrence'] }}">
                <input type="hidden" name="duration" value="{{ $data['recurring']['duration'] }}">
            @endisset
            @isset($data['platform'])
                <input type="hidden" name="platform" value="{{ $data['platform'] }}">
            @endisset
            @isset($data['startup_fee'])
                <input type="hidden" name="startup_fee" value="{{ $data['startup_fee'] }}">
            @endisset
            @isset($data['custom_1'])
                <input type="hidden" name="custom_1" value="{{ $data['custom_1'] }}">
            @endisset
            @isset($data['custom_2'])
                <input type="hidden" name="custom_2" value="{{ $data['custom_2'] }}">
            @endisset
            @foreach ($data['items'] as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>
    </div>
    <script>
        setTimeout(function () {
            //document.getElementById('checkout-form').submit();
        }, 1000);
    </script>
    </body>
@endsection
