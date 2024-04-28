<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscrição para o Evento</title>

<link rel="stylesheet" href="../css/global.css">
<link rel="stylesheet" href="../css/index.css">
</head>
<body>
  <header>
    <h1>Título do Evento</h1>
  </header>
  
  <form id="registrationForm" action="../api/participantes.php" method="post">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="phone">Telefone:</label>
    <input type="tel" id="phone" name="phone" required>
    
    <button type="submit">Registrar</button>
  </form>
  
  <table id="participantsTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
      </tr>
    </thead>
    <tbody>
    <?php include '../api/atualizaTabela.php'; ?>
    </tbody>
  </table>
  
  <footer>
    <p>© 2024 Inscrição para o Evento. Todos os direitos reservados.</p>
  </footer>
</body>
<script src="../js/requisicao.js"></script>
</html>
