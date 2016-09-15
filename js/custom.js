$(document).ready(function () {



    /*country change function */

    $('#UserDetails_country').change(function () {
        var country = $(this).val();
        if (country != '') {
            $.ajax({
                type: "POST",
                url: baseurl + "ajax/selectState",
                data: {country: country}
            }).done(function (data) {
                $('#UserDetails_state').html(data);
            });
        } else {
            $('#UserDetails_state').html("<option value=''>--Selec--</option>");
        }
    });

    /*state change function */

    $('#UserDetails_state').change(function () {
        var state = $(this).val();
        if (state != '') {
            $.ajax({
                type: "POST",
                url: baseurl + "ajax/selectCity",
                data: {state: state}
            }).done(function (data) {
                $('#UserDetails_city').html(data);
            });
        } else {
            $('#UserDetails_city').html("<option value=''>--Select--</option>");
        }
    });

    /* Religion change function*/
    $('#UserDetails_religion').change(function () {
        var religion = $(this).val();
        if (religion != '') {
            $.ajax({
                type: "POST",
                url: baseurl + "ajax/selectCaste",
                data: {religion: religion}
            }).done(function (data) {
                $('#UserDetails_caste').html(data);
            });
        } else {
            $('#UserDetails_caste').html("<option value=''>Select Community</option>");
        }
    });


    /* Caste change function*/
    $('#UserDetails_caste').change(function () {
        var caste = $(this).val();
        if (caste != '') {
            $.ajax({
                type: "POST",
                url: baseurl + "ajax/selectSubCaste",
                data: {caste: caste}
            }).done(function (data) {
                if (data != '') {
                    $('#sub_community').show();
                    $('#UserDetails_sub_caste').html(data);
                } else {
                    $('#sub_community').hide();
                }
            });
        } else {
            $('#sub_community').hide();
        }
    });
    /******View Contacts****/
    $('.view_contact').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: baseurl + 'Partner/Contact',
//            url: baseurl + 'Partner/Contact?userid=SH53',
            type: "post",
            data: {partner: id},
            success: function (data) {
                
                $('#remaining').html("").html(data);
            }, error: function () {

            }
        });
    });









});

function test(){
     var formdata = $("#register-one-form").serializeArray();
     formdata.push({'token':'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE0NzM0MTk1ODYsImp0aSI6InZiQVM5ZXdCOVwvRjZRSVZJc2FONitGcndpT3d3Q1dGK05QN3pTV2E3VkdNPSIsImlzcyI6ImxvY2FsaG9zdCIsIm5iZiI6MTQ3MzQxOTU5NiwiZXhwIjoxNDczNDIzMTk2LCJkYXRhIjp7InVzZXJJZCI6Ijc5IiwidXNlck5hbWUiOiJzdWphbm5hdGhAZ21haWwuY29tIn19.rcysBhzFI49YOBs51tEtw6WunHYAnw4kSrVK3NdPPrEQ2ObBpdcyZmqPUNrFR77YBD1_5ryfJE7ygEArNoBctw'});
     $.ajax({
         url: baseurl + 'Api/RegisterFirstStep',
         type: "POST",
         data:formdata,
         success:function(data){
             alert("HAI");
             
         }
         
         
     });
     
}