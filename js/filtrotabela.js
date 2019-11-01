function filtrarTable() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputPesquisa");
    filter = input.value.toUpperCase();
    table = document.getElementById("pesquisaTable");
    tr = table.getElementsByTagName("tr");
  
    for (i = 1; i < tr.length; i++) {
      let linha = tr[i];
      
        txtValue = linha.textContent || linha.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
    }
  }