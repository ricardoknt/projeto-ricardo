function calcularMedia() {
  const nome = document.getElementById("nome").value;
  const nota1 = Number(document.getElementById("nota1").value);
  const nota2 = Number(document.getElementById("nota2").value);
  const nota3 = Number(document.getElementById("nota3").value);

  const media = (nota1 + nota2 + nota3) / 3;
  let situacao;
  let classe;

  if (media >= 6) {
    situacao = "Parabéns, você foi aprovado!!";
    classe = "aprovado";
  } else if (media > 3 && media < 6) {
    situacao = "recuperação";
    classe = "recuperacao";
  } else {
    situacao = "reprovado!";
    classe = "reprovado";
  }

  const div = document.getElementById("resposta");
  div.className = classe;
  div.innerHTML = `<b>Aluno(a):</b> ${nome} <br> <b>Média:</b> ${media.toFixed(2)} <br> <b>Situação:</b> ${situacao}`;
}
