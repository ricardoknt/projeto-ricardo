function calcularMedia(){
 let nome = document.getElementById("nome").value;
 let nota1 = Number(document.getElementById("nota1").value);
 let nota2 = Number(document.getElementById("nota2").value);
 let nota3 = Number(document.getElementById("nota3").value);

 let media = (nota1 + nota2 + nota3) / 3;
 let situacao;
 let classe;

if (media >= 6){
    situacao = "Parabéns, você foi aprovado!!"
    document.getElementById("resposta").innerHTML = `<b>Aluno(a):</b> ${nome} <br> <b>Média:</b> ${media.toFixed(2)} <br> <b>Situação:</b> ${situacao}` ;
classe = "aprovado";
}
else if(media > 3 && media < 6){
    situacao = "recuperação"
    document.getElementById("resposta").innerHTML = `<b>Aluno(a):</b> ${nome} <br> <b>Média:</b> ${media.toFixed(2)} <br> <b>Situação:</b> ${situacao}`;
classe = "recuperacao"
} 
else {
    situacao = "reprovado!"
    document.getElementById("resposta").innerHTML = `<b>Aluno(a):</b> ${nome} <br> <b>Média:</b> ${media.toFixed(2)} <br> <b>Situação:</b> ${situacao}`;
}
let div = document.getElementById("resposta");
div.className = classe;
div.innerHTML = resultado;
}

