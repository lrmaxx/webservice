
function emailPassage() {
    var name           = $('#name') 
    var email          = $('#email');
    var phone          = $('#contact');
    var service_code   =$('#service-code');


            $.ajax({
                    url: 'mail/customMail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: { name: name.val(), email: email.val(),phone:phone.val(),service_code:service_code.val()},
                    success: function (response) {
                        $('.sent-notification').text('Message1 Sent Successfully.');
                },
            });
            $.ajax({
                    url: 'mail/customerMail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: { name: name.val(), email: email.val(),phone:phone.val(),service_code:service_code.val()},
                    success: function (response) {
                        $('.sent-notification').text('Message1 Sent Successfully.');
                    },
            });

}
