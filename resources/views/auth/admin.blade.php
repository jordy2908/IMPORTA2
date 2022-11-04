<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/admin/admin.css" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    <!-- Styles  -->
        <style> 
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <title>ADMIN SITE</title>
</head>
<body>
    <div class="container">
        <header>
            <!-- LOGOTIPO -->
            <div class="container-header">
                <div class="logo">
                    <a href="{{ route('admin.index') }}">
                        <img src="img/Logo_ImportaApp.png" alt="">
                    </a>
                </div>
                <div class="buttons-login">
                    @if (auth()->check())
                        <button onclick="location.href=`{{ route('login.destroy') }}`" style="margin-left: 47%;"> Salir </button>
                    @else
                        <button onclick="location.href=`{{ route('login.index') }}`"> Entra! </button>
                        <button onclick="location.href=`{{ route('register.index') }}`"> Registrate! </a> </button>
                    @endif
                </div>
            </div>
        </header>


        <section class="body-admin" id="tab-content" >
            <div class="tabcontent" id="body1" >
                @include('auth.body')
            </div>

            <div id="body2" class="tabcontent" >
                @include('auth.dash')
            </div>

        </section>

        <div class="cont-b">
            <div class="buttons-body tab">
                <button class="tablinks" onclick="openDiv(event, 'body1')">TABLA</button>
                
                <button class="tablinks" onclick="openDiv(event, 'body2')">DASHBOARD</button>
            </div>
        </div>
        <form action="/admin/all" method="post" id="form1">
            <input type="hidden" name="id" value="1">
            <input type="hidden" name="">
        </form>

    </div>

    <script>

        //PRODUCTOS
        var productos = [];
        var valores = [];

        //USUARIOS
        var nombres = []
        var busqieda = 0
        var sin_B = 0
        var ninguna = 0
        var visa = 0
        var paypal = 0

        function openDiv(evt, cityName) {
        
        /* --- INTERACCION DE BOTONES ADMIN ---- */

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        if (cityName == 'body1'){
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
         else {
            document.getElementById('body2').style.display = "flex";
            evt.currentTarget.className += " active";
        }

        /* ---- RECOLECCION DE DATOS DASHBOARD PRODUCTOS ---- */

        async function postData(url = '', data = {}) {
        // Default options are marked with *
            const response = await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(data) // body data type must match "Content-Type" header
            });
            return response.json(); // parses JSON response into native JavaScript objects
            }

            postData('/admin/all', { _token: $('meta[name="csrf-token"]').attr("content") })
            .then((data) => {
                for (var x = 0; x < data.length; x++) {
                    //console.log(data[x].proveedor, data[x].seguro_u);
                    productos.push(data[x].proveedor);
                    valores.push(parseFloat(data[x].seguro_u.replace(',', '.'))) // JSON data parsed by `data.json()` call
                }

                
                
                //console.log(valores)
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    axis: 'y',
                    labels: productos,
                    datasets: [{
                        label: 'DASHBOARD',
                        data: valores,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },

                    plugins: {
                        legend: {
                            maxHeight: 200,
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)',

                },
            }
                    }

                }
            });

        })
            

        /* ---- DASHBOARD USUARIOS ---- */

        async function postData(url = '', data = {}) {
        // Default options are marked with *
            const response = await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(data) // body data type must match "Content-Type" header
            });
            return response.json(); // parses JSON response into native JavaScript objects
            }

            postData('/admin/users', { _token: $('meta[name="csrf-token"]').attr("content") })
            .then((data) => {
                for (var x = 0; x < data.length; x++) {
                    if (data[x].busqueda){
                        busqieda += 1;
                        console.log(data[x].busqueda);
                        nombres.push(data[x].name);
                    } else if (data[x].busqueda === false){
                        sin_B += 1;
                    } else {
                        ninguna += 1;
                    } if (data[x].pago == "PAYPAL") {
                        console.log(data[x].pago);
                        paypal += 1;
                    } else if (data[x].pago = "VISA"){
                        visa += 1;
                    } 
                }

                
                
                const ctx = document.getElementById('myChart1').getContext('2d');
                const myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    axis: 'y',
                    labels: ['N. usuarios', 'Proveedores', 'Aranceles', 'ninguno', 'Visa', 'Paypal' ]  ,
                    datasets: [{
                        label: 'USUARIOS',
                        data: [x ,busqieda, sin_B, ninguna, visa, paypal],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },

                    plugins: {
                        legend: {
                            maxHeight: 200,
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)',

                },
            }
                    }

                }
            });
            });

    }


    </script>


</body>
</html>