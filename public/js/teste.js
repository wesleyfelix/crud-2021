$('.telefone').mask('(00) 0 0000-0000');
$('.dinheiro').mask('#.##0,00', {reverse: true});
$('.estado').mask('AA');
$('.cnpj').mask('00.000.000/0000-00');




var temporiza;
$('.documento').on("input", function(){
    clearTimeout(temporiza);
    temporiza = setTimeout(function(){

        var tamanho = $('.cnpj').val().length;

        if(tamanho < 11){
            $('.cnpj').mask("999.999.999-99");
        } else {
            $('.cnpj').mask("99.999.999/9999-99");
        }
    }, 2);
});
// $('.documento').keydown(function(){
//     try {
//         $('.documento').unmask();
//     } catch (e) {}
//
//     var tamanho = $('.documento').val().length;
//
//     if(tamanho < 11){
//         $('.documento').mask("999.999.999-99");
//     } else {
//         $('.documento').mask("99.999.999/9999-99");
//     }
//
//     // ajustando foco
//     var elem = this;
//     setTimeout(function(){
//         // mudo a posição do seletor
//         elem.selectionStart = elem.selectionEnd = 10000;
//     }, 0);
//     // reaplico o valor para mudar o foco
//     var currentValue = $(this).val();
//     $(this).val('');
//     $(this).val(currentValue);
// });
//
//
