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


function test(name,action){   
     var formdata = $("#"+name).serializeArray();
     token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJjbGllbnRpZCI6IjI2QUZCMDEwLUY5RjctOTQ0Qi1BQUFDLTJEOURDMDc4MjU2QiJ9.E3HlNiBVFs52dUL-6JIETd6RSUT_KlvjIKxNMPoGYov_71TM4xoZBIsZKRg3gaFhO_yle0Obi4YTC70ocXorPg';
     $.ajax({
         url: baseurl + 'Api/'+action+'?token='+token,
         type: "POST",
         data:formdata,
         success:function(data){
             alert("HAI");
             return false;
         }
         
         
     });
     return false;
}