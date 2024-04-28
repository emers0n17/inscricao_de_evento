document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('registrationForm');
  
  form.onsubmit = function(e) {
    e.preventDefault(); // Impede o envio padrão do formulário

    // Cria um FormData com os dados do formulário
    var formData = new FormData(form);

    // Cria uma requisição AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../api/participantes.php', true);

    // Define o que acontece quando a resposta do servidor é recebida
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Sucesso! Atualiza a tabela aqui
        var response = JSON.parse(xhr.responseText);
        if(response.status === 'success') {
          // Adiciona a nova linha na tabela
          var table = document.getElementById('participantsTable').getElementsByTagName('tbody')[0];
          var newRow = table.insertRow();
          var cell1 = newRow.insertCell(0);
          var cell2 = newRow.insertCell(1);
          var cell3 = newRow.insertCell(2);
          cell1.textContent = formData.get('name');
          cell2.textContent = formData.get('email');
          cell3.textContent = formData.get('phone');

          alert('Inscrição realizada com sucesso!');
        } else {
          // Trata erros aqui
          alert('Ocorreu um erro ao realizar a inscrição.');
        }
      } else {
        // Trata erros aqui
        alert('Ocorreu um erro ao realizar a inscrição.');
      }
    };

    // Envia os dados do formulário
    xhr.send(formData);
  };
});