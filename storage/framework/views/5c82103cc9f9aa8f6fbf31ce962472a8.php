<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'MDASv2')); ?></title>

        <link rel="stylesheet" href="../../css/jquery.dataTables.min.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <style>
        #hexagon-spinner {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            padding-left :50%;
            padding-top :250px;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 999;
            display: flex;
            align-items:center;
            justify-content: center;
        }

        .hexagon-loader {
            background-color: purple;
            height: 40px;
            width: 40px;
            animation-name: spin;
            animation-duration: 0.8s;
            /* Things added */
            animation-iteration-count: infinite;
            display: inline-block;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(359deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(359deg);
            }
        }
    </style>
    <body class="font-sans antialiased bg-gray-100">
        <div class="bg-white mt-24 mx-4 shadow-md rounded-lg">
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main class="">
                <?php echo e($slot); ?>

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
                var base_url = '<?php echo e(URL::to("/")); ?>';
                $.ajax({
                    type: "POST",
                    url: base_url+"/powerplant/fetchsub",
                    data: {
                        type_id: type_id,
                        _token: '<?php echo e(csrf_token()); ?>'
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
                var base_url = '<?php echo e(URL::to("/")); ?>';
                $.ajax({
                    type: "POST",
                    url: base_url+"/powerplant/fetchregion",
                    data: {
                        grid_id: grid_id,
                        _token: '<?php echo e(csrf_token()); ?>'
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
                var base_url = '<?php echo e(URL::to("/")); ?>';
                $.ajax({
                    type: "POST",
                    url: base_url+"/powerplant/fetchregionid",
                    data: {
                        region_id: region_id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    dataType: 'json',
                    cache: false,
                    success: function (response) {
                        document.getElementById("region_id").value  = response.region_code;
                    }
                });
            });
        });

        function btnChange(count){
            $("#operators"+count).show();
            $("#btn_change"+count).hide();
            // $(".btn_change").each(function(index, element){
            //     var btn=document.getElementsByClassName("btn_change")[index];
            //     $(btn).click(function(){
            //         document.getElementsByClassName("btn_change")[index].style.display = "none";
            //         document.getElementsByClassName("addtext")[index].style.display = "block";
            //     });
            // });
        }

        function hideSelectPowerplant(){
            var btn=document.getElementsByClassName("powerplant");
            for(var i=0;i<btn.length;i++){
                var powerplant=document.getElementsByClassName("powerplant")[i].value;
                if(powerplant!=''){
                    document.getElementsByClassName("resource_name")[i].style.display = "none";
                }else{
                    document.getElementsByClassName("resource_name")[i].style.display = "block";
                }
            }
        }

        function hideSelectResource(){
            var btn=document.getElementsByClassName("resource_name");
            for(var i=0;i<btn.length;i++){
                var resource=document.getElementsByClassName("resource_name")[i].value;
                if(resource!=''){
                    document.getElementsByClassName("powerplant")[i].style.display = "none";
                }else{
                    document.getElementsByClassName("powerplant")[i].style.display = "block";
                }
            }
        }

        function addPowerplant() {
            var base_url = '<?php echo e(URL::to("/")); ?>';
            var redirect = base_url+'/uploadschedules/insertpowerplant';
            var operator =document.getElementById("operators").value;
            var counter =document.getElementById("counter").value;
            $.ajax({
                type: "POST",
                url: redirect,
                data: {
                    operator: operator,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                async:true,
                success: function(output){
                    $("#powerplant"+counter).empty();
                    for (var i = 0; i < counter; i++) {
                        var option = document.createElement("OPTION");
                        option.innerHTML = operator;
                        var powerplant = document.getElementById("powerplant"+i);
                        powerplant.options.add(option);
                        option.value = output;
                    }
                    document.getElementById("operators").value='';
                }
            });
        }

        var checkuser=document.getElementById('check_user').value;
        if(parseInt(checkuser)!=0){
            $(window).on('load', function() {
                
                //if(parseInt(checkuser)!=0){
                    let modal = new Modal(document.getElementById('checkUser'),{placement:'center'});
                    $('#loadData').hide();
                    modal.show();
                //}
            });
        }

        function loadSchedule() {
            $('#loadData').show();
            let modal = new Modal(document.getElementById('checkUser'),{placement:'center'});
            modal.hide();
        }

        function cancelSchedule() {
            var base_url = '<?php echo e(URL::to("/")); ?>';
            var redirect = base_url+'/uploadschedules/cancelschedule';
            let confirmAction = confirm("Are you sure you want to cancel this data?");
            if (confirmAction) {
                $.ajax({
                    type: "POST",
                    url: redirect,
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    beforeSend: function(){
                        let modal = new Modal(document.getElementById('checkUser'),{placement:'center'});
                        modal.hide();
                        document.getElementById("hexagon-spinner").style.display = "block";
                        //document.getElementById('alt').innerHTML='<b>Please wait, Cancelling Data...</b>'; 
                    },
                    success: function(output){
                        alert('Unsaved import data successfully deleted!');
                        document.getElementById("hexagon-spinner").style.display = "none";
                        //document.getElementById('alt').innerHTML=''; 
                        location.reload();
                    }
                });
            }
        }

        // function importSchedule() {
        //     $('#savecsv').hide();
        //     document.getElementById("hexagon-spinner").style.display = "block";
        // }
        function importSchedule() {
            var base_url = '<?php echo e(URL::to("/")); ?>';
            var redirect = base_url+'/uploadschedules/store-data';
            var formData = new FormData();
            var file = $('#mpsl').prop('files')[0];
            formData.append('mpsl', file);
            formData.append('run_hour', $('#run_hour').val());
            formData.append('user_id', $('#user_id').val());
            $.ajax({
                type: "POST",
                url: redirect,
                data: formData,
                contentType : false,
                processData : false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    //$('#savecsv').hide();
                    document.getElementById("hexagon-spinner").style.display = "block";
                },
                success: function(output){
                    console.log(output);
                    //$('#loadData').empty().load(window.location.href + '#loadTable');
                    $("#loadData").load(window.location.href+" #loadTable");
                    document.getElementById("hexagon-spinner").style.display = "none";
                    document.getElementById("mpsl").value='';
                    document.getElementById("run_hour").value='';
                    if(output!=''){
                        window.location=base_url+'/uploadschedules/'+output;
                    }
                }
            });
        }

        function saveAllsched() {
            $('#saveall').hide();
            document.getElementById("hexagon-spinner").style.display = "block";
            //document.getElementById('altsaveall').innerHTML='<b>Please wait, Saving Data...</b>'; 
        }

        function importHap() {
            var base_url = '<?php echo e(URL::to("/")); ?>';
            var redirect = base_url+'/uploadhap/store-hap';
            var formData = new FormData();
            var file = $('#hap').prop('files')[0];
            formData.append('hap', file);
            formData.append('user_id', $('#user_id').val());
            $.ajax({
                type: "POST",
                url: redirect,
                data: formData,
                contentType : false,
                processData : false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    document.getElementById("hexagon-spinner").style.display = "block";
                },
                success: function(output){
                    document.getElementById("hexagon-spinner").style.display = "none";
                    document.getElementById("hap").value='';
                    alert('Data Successfully Saved!');
                    window.location=base_url+'/uploadhap/'+output;
                }
            });
        }

        function importRegional() {
            var base_url = '<?php echo e(URL::to("/")); ?>';
            var redirect = base_url+'/uploadregional/store-regional';
            var formData = new FormData();
            var file = $('#reg_sum').prop('files')[0];
            formData.append('reg_sum', file);
            formData.append('user_id', $('#user_id').val());
            $.ajax({
                type: "POST",
                url: redirect,
                data: formData,
                contentType : false,
                processData : false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    document.getElementById("hexagon-spinner").style.display = "block";
                },
                success: function(output){
                    document.getElementById("hexagon-spinner").style.display = "none";
                    document.getElementById("reg_sum").value='';
                    alert('Data Successfully Saved!');
                    window.location=base_url+'/uploadregional/'+output;
                }
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</html>
<?php /**PATH C:\xampp\htdocs\mdasv2\resources\views/layouts/app.blade.php ENDPATH**/ ?>