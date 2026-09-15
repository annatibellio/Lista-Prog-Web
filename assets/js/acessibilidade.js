// Barra de acessibilidade: tamanho da fonte + alto contraste.
// Preferências ficam salvas no navegador (localStorage) e valem pro site inteiro.
(function () {
  "use strict";

  var CHAVE_FONTE = "lista-exercicios:escala-fonte";
  var CHAVE_CONTRASTE = "lista-exercicios:alto-contraste";
  var ESCALAS = [1, 1.15, 1.3];

  function aplicarEscala(indice) {
    document.documentElement.style.setProperty("--escala-fonte", ESCALAS[indice]);
    localStorage.setItem(CHAVE_FONTE, String(indice));
  }

  function aplicarContraste(ativo) {
    document.documentElement.classList.toggle("alto-contraste", ativo);
    localStorage.setItem(CHAVE_CONTRASTE, ativo ? "1" : "0");
    var botao = document.getElementById("a11y-contraste");
    if (botao) botao.setAttribute("aria-pressed", ativo ? "true" : "false");
  }

  document.addEventListener("DOMContentLoaded", function () {
    var indiceSalvo = parseInt(localStorage.getItem(CHAVE_FONTE), 10);
    if (isNaN(indiceSalvo) || indiceSalvo < 0 || indiceSalvo >= ESCALAS.length) {
      indiceSalvo = 0;
    }
    aplicarEscala(indiceSalvo);
    aplicarContraste(localStorage.getItem(CHAVE_CONTRASTE) === "1");

    var toggle = document.getElementById("a11y-toggle");
    var painel = document.getElementById("a11y-painel");
    if (toggle && painel) {
      toggle.addEventListener("click", function () {
        var aberto = painel.classList.toggle("aberto");
        toggle.setAttribute("aria-expanded", aberto ? "true" : "false");
      });
      document.addEventListener("click", function (evento) {
        if (!painel.contains(evento.target) && evento.target !== toggle) {
          painel.classList.remove("aberto");
          toggle.setAttribute("aria-expanded", "false");
        }
      });
    }

    var diminuir = document.getElementById("a11y-diminuir");
    var aumentar = document.getElementById("a11y-aumentar");
    var indiceAtual = indiceSalvo;
    if (diminuir) {
      diminuir.addEventListener("click", function () {
        indiceAtual = Math.max(0, indiceAtual - 1);
        aplicarEscala(indiceAtual);
      });
    }
    if (aumentar) {
      aumentar.addEventListener("click", function () {
        indiceAtual = Math.min(ESCALAS.length - 1, indiceAtual + 1);
        aplicarEscala(indiceAtual);
      });
    }

    var contraste = document.getElementById("a11y-contraste");
    if (contraste) {
      contraste.addEventListener("click", function () {
        var ativo = document.documentElement.classList.contains("alto-contraste");
        aplicarContraste(!ativo);
      });
    }
  });
})();
