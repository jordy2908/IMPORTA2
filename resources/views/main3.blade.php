<div class="grafico-data">
    
</div>

<script>
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
            })

</script>