const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});



document.addEventListener('DOMContentLoaded', function () {
    var exampleTable = document.getElementById('example');
    if (exampleTable) {
        // Assuming you have included the DataTables library
        var dataTable = new DataTable(exampleTable);
    }
});



/* const itemclick = document.querySelector("#sidebar");

itemclick.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
}); */





/* $(document).ready(function () {
    $('#example').DataTable()
}); */


