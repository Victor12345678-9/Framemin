<html>

<head>
    <title>Mi Primera Página</title>
    <meta charset=”utf-8” />
    <style>
        table {
            border: #b2b2b2 1px solid;
        }
        td,
        th {
            border: black 1px solid;
        }
    </style>
</head>

<body>

    <pre id="salida"></pre>

</body>

</html>

<script>
var miInit = { method: 'GET',
               mode: 'cors',
               cache: 'default' };
               async function request(){
let dataRequest = {
   method: 'GET', 
   headers: {gender: "female", nat:"US"}
}
let response = await fetch("/rutanueva/1", dataRequest);
  console.log(response)
let result = await response.json();
  console.log(result)
}

request()
</script>