// Máscara do campo "Altura (m)": formata os dígitos digitados como
// "1,57" em vez de deixar a pessoa digitar "157" (que dá um IMC absurdo).
// Ex: digita 1 -> "1" | digita 5 -> "1,5" | digita 7 -> "1,57"
(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    var campo = document.getElementById("altura");
    var erro  = document.getElementById("altura-erro");
    if (!campo) return;

    function formatar(valorDigitado) {
      var digitos = valorDigitado.replace(/\D/g, "").slice(0, 3);
      if (digitos.length <= 1) return digitos;
      return digitos.slice(0, 1) + "," + digitos.slice(1);
    }

    function paraNumero(texto) {
      return parseFloat(texto.replace(",", "."));
    }

    campo.addEventListener("input", function () {
      var cursorNoFim = campo.selectionEnd === campo.value.length;
      campo.value = formatar(campo.value);
      if (cursorNoFim) {
        campo.setSelectionRange(campo.value.length, campo.value.length);
      }
      validar();
    });

    function validar() {
      if (!erro) return true;
      var valor = paraNumero(campo.value);
      var invalido = campo.value.length > 0 && (isNaN(valor) || valor < 0.3 || valor > 2.5);
      erro.classList.toggle("visivel", invalido);
      campo.classList.toggle("campo-invalido", invalido);
      return !invalido;
    }

    campo.closest("form").addEventListener("submit", function (evento) {
      if (!validar()) {
        evento.preventDefault();
        campo.focus();
      }
    });
  });
})();
