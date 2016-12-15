$(document).ready(function()
{
    var countX;
    var countY;
    countX=$('table#display').attr("data-row");
    countY=$('table#display').attr("data-col");
    console.log("Field size: " + countX + " " + countY);



    for (var i=0; i<countX; i++){
        for (var j=0; j<countY; j++){
            var pointButtons = $('td#pixel_' + i + '_' + j + ' input.draw-button');
            pointButtons.click(function(){
                var dx=$(this).attr('cordx');
                var dy=$(this).attr('cordy');
                console.log("zhmiak" + dx + " " + dy);

                var pointFull = $(this).parent();
                var hiddenInput = pointFull.children(".draw-value");

                switch ($(this).attr('color-data')) {
                    case 'white':
                        $(this).attr('color-data', 'black');
                        hiddenInput.val(dx+"_"+dy);
                        break;
                    case 'black':
                        $(this).attr('color-data', 'white');
                        hiddenInput.removeAttr("value");
                        break;
                }
            });
        }
    }

    var saveButton = $('input.saveDraw');
    saveButton.click(function(){
        console.log("try to save");
        jQuery("div.control").append(
            "<input type='text' name='drawName'>" +
            "<button type='submit' name='action' value='saveDraw'>Ок</button>"
        );
    });
});
