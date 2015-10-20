// based on http://stackoverflow.com/questions/5818415/enable-disable-submit-button-based-on-radio-buttons/5818714#5818714

$(function () {
    var $numwords = $('input[name=numwords]');
    var limitWords = function (element) {
        if(element.id == "memorable") {
            $numwords.attr("disabled", "disabled");
        }
        else {
            $numwords.removeAttr("disabled")
        }
    };

    $(":radio[name=fancy]").click(function () {
        limitWords(this);
    }).filter(":checked").each(function () {
        limitWords(this);
    });
});