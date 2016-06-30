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

          /*
           * for partner preference
           */
          
          
            /*country change function */

            $('#PartnerDetails_country_living_in').change(function () {
                var country = $(this).val();
                if (country != '') {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "ajax/selectState",
                        data: {country: country}
                    }).done(function (data) {
                        $('#PartnerDetails_residency_status').html(data);
                    });
                } else {
                    $('#PartnerDetails_residency_status').html("<option value=''>--Selec--</option>");
                }
            });

         

   /* Religion change function*/
            $('#PartnerDetails_religion').change(function () {
                var religion = $(this).val();
                if (religion != '') {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "ajax/selectCaste",
                        data: {religion: religion}
                    }).done(function (data) {
                        $('#PartnerDetails_caste').html(data);
                    });
                } else {
                    $('#PartnerDetails_caste').html("<option value=''>Select Community</option>");
                }
            });


           
          

         
          
        });