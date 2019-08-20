$(window).on('click', function(event) {
    var element = event.target;
    if ($(element).hasClass('go')) {
    	var num = $('#vvod').val();
    	$.ajax({
                    url: 'php/process.php',
                    type: "POST",
                    data:  {number : num},
                    success: function (response) {
                      result = $.parseJSON(response);
                      n = result.chislo;
                      $('#result').val(n);
                    },
                    error: function (response) {
                           $.alert({
                            title: 'Error!',
                            type: 'red',
                            boxWidth: '600px',
                            content: 'error of ajax query',
                        });
                      }
                    });
    }
});