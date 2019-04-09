<h1>WELCOMW TO OUR WEBSITE</h1>
hello <?=$data['name']?>
<hr>
<a href="contact">Contact</a>
<hr>

<button onclick="return getData();">Get data</button>

<script>

function getData() {

let xhr = new XMLHttpRequest();
xhr.open('GET', 'http://localhost/mvcfull/client/json/client/janvier', true);

xhr.onload = function() {
  if (this.status == 200) {
    var documents = this.responseText;
      // documents = JSON.parse(documents);
      // create array to be used
    console.log(documents);
  } 
}
// send the request
xhr.send();
}


</script>