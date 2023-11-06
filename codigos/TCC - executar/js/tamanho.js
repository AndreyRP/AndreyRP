function getMaiorTamanho(element) {
    var maiorTamanho = 0;
    $(element).each(function(){
        var height = $(this).css('min-height');
        height = parseFloat(height.replace('px',''));
        if(maiorTamanho<height)
        {
            maiorTamanho = height;
        }
    });
    return maiorTamanho
}