function sendEmail() {
    // var name = $('#name');
    // var email = $('#email');
    // var phone = $('#phone');
    // var status = $('#business-status');
    // var age = $('#bussines-age');
    // var emp = $('#no-employee');
    // var area = $('#business-area');

    // var type_bussiness = $("#type-of-business");
    // var invoice_pack  = $("input[name=package]:checked").attr("id");
    // console.log(invoice_pack);
    // var service_code = $('#servicecode');
    // var body = $('#body');
    var form = $("#regForm");
    $.ajax({
        url: 'mail/sendEmail.php',
     method: 'POST',
     dataType: 'json',
     data: form.serialize(),
    success: function (response) {
        $('.sent-notification').text('Message1 Sent Successfully.');
    },
});

    // $.ajax({
    //     url: 'mail/sendEmail.php',
    //     method: 'POST',
    //     dataType: 'json',
    //     data: { name: name.val(),
    //             email: email.val(),
    //             phone: phone.val(),
    //             service_code: service_code.val(), 
    //             status: status.val(),
    //             age: age.val(), 
    //             area: area.val(), 
    //             emp: emp.val(), 
    //             body: body.val(),
    //             type_bussiness : type_bussiness.val(),

    //             invoice_pack : invoice_pack.val(),
    //          },
    //     success: function (response) {
    //         $('.sent-notification').text('Message1 Sent Successfully.');
    //     },
    // });

    // $.ajax({
    //     url: '/payform/mail/clientmail.php',
    //     method: 'POST',
    //     dataType: 'json',
    //     data: { name: name.val(), email: email.val(), body: body.val() },
    //     success: function (response) {
    //         $('#myForm')[0].reset();
    //         $('.sent-notification').text('Message 2 Sent Successfully.');
    //     },
    // });
}