function loadTest(table) {
    $("#tableContent").load("handlers/get-data.php", {table_name:table});
}