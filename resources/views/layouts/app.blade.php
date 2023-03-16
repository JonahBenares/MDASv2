<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MDASv2') }}</title>

        <link rel="stylesheet" href="../../css/jquery.dataTables.min.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="bg-white mt-24 mx-4 shadow-md rounded-lg">
            @include('layouts.navigation')
            <main class="">
                {{ $slot }}
            </main>
        </div>
    </body>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table-01').DataTable();
        } );
        $(document).on("click", ".editType", function () {
            var id = $(this).attr("data-id");
            var legend = $(this).attr("data-color");
            var type_name = $(this).attr("data-type");
            $("#id").val(id);
            $("#legend").val(legend);
            $("#type_name").val(type_name);
        });
        $(document).on("click", ".editSub", function () {
            var id = $(this).attr("data-id");
            var subtype = $(this).attr("data-subtypename");
            var type = $(this).attr("data-type");
            $("#subid").val(id);
            $("#subtype_name").val(subtype);
            $("#type_id").val(type);
        });
        $(document).ready(function() {
            $('#type-dropdown').on('change', function () {
                var type_id = this.value;
                $("#subtype-dropdown").html('');
                var base_url = '{{URL::to("/")}}';
                $.ajax({
                    type: "POST",
                    url: base_url+"/powerplant/fetchsub",
                    data: {
                        type_id: type_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    cache: false,
                    success: function (result) {
                        $('#subtype-dropdown').html('<option value="">-- Select Subtype --</option>');
                        $.each(result.subtype, function (key, value) {
                            $("#subtype-dropdown").append('<option value="' + value.id + '">' + value.subtype_name + '</option>');
                        });
                    }
                });
            });

            $('#grid-dropdown').on('change', function () {
                var grid_id = this.value;
                $("#region-dropdown").html('');
                $("#region_id").val('');
                var base_url = '{{URL::to("/")}}';
                $.ajax({
                    type: "POST",
                    url: base_url+"/powerplant/fetchregion",
                    data: {
                        grid_id: grid_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    cache: false,
                    success: function (result) {
                        $('#region-dropdown').html('<option value="">-- Select Region --</option>');
                        $.each(result.region, function (key, value) {
                            $("#region-dropdown").append('<option value="' + value.id + '">' + value.region_name + '</option>');
                        });
                    }
                });
            });
            $('#region-dropdown').on('change', function () {
                var region_id = this.value;
                var base_url = '{{URL::to("/")}}';
                $.ajax({
                    type: "POST",
                    url: base_url+"/powerplant/fetchregionid",
                    data: {
                        region_id: region_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    cache: false,
                    success: function (response) {
                        document.getElementById("region_id").value  = response.region_code;
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</html>
