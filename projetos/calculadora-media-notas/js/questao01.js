function notaValida(valor) {
  return Number.isFinite(valor) && valor >= 0 && valor <= 10;
}

function calcularMedia(event) {
  event.preventDefault();

  const nome = document.getElementById("nome").value.trim();
  const nota1 = Number(document.getElementById("nota1").value);
  const nota2 = Number(document.getElementById("nota2").value);
  const nota3 = Number(document.getElementById("nota3").value);
  const div = document.getElementById("resposta");

  if (!nome) {
    div.className = "reprovado";
    div.innerHTML = "<b>Informe o nome do aluno.</b>";
    return;
  }

  if (![nota1, nota2, nota3].every(notaValida)) {
    div.className = "reprovado";
    div.innerHTML = "<b>Informe notas válidas entre 0 e 10.</b>";
    return;
  }

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

  div.className = classe;
  div.innerHTML = `<b>Aluno(a):</b> ${nome} <br> <b>Média:</b> ${media.toFixed(2)} <br> <b>Situação:</b> ${situacao}`;
}

document.getElementById("form-notas").addEventListener("submit", calcularMedia);
