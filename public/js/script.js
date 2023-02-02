$(document).ready(function () {
    $('#json_header').hide();
    $('#fetch_header').hide();
    $('#json-delete').hide();
    $(document).on('click', '#new_emp', function () {
        //Ajax Call
        $(this).text('Saving...');
        var form_data = $('.new_emp_form').serialize();
        $.ajax({
            url: '/new-emp',
            type: 'post',
            dataType: 'JSON',
            data: form_data,
            success: function (res) {
                if (res.code == 'success') {
                    $('#new_emp').text('Inserted');
                    let html_txt = '<ul class="list-group list-group-flush">';
                    html_txt += '<li class="list-group-item">Emp Id:  ' + res.data._id + '</li>';
                    html_txt += '<li class="list-group-item">Token:  ' + res.data.api_token + '</li>';
                    html_txt += '<li class="list-group-item">First Name:  ' + res.data.first_name + '</li>';
                    html_txt += '<li class="list-group-item">Last Name:  ' + res.data.last_name + '</li>';
                    html_txt += '<li class="list-group-item">Username:  ' + res.data.user_name + '</li>';
                    html_txt += '<li class="list-group-item">State:  ' + res.data.state + '</li>';
                    html_txt += '<li class="list-group-item">City:  ' + res.data.city + '</li>';
                    html_txt += '<li class="list-group-item">Pincode:  ' + res.data.pincode + '</li>';
                    html_txt += '<li class="list-group-item">Profile Access url:  ' + window.location.origin + '/api/emp?api_token=' + res.data.api_token + '&emp_id=' + res.data._id + '</li>';
                    html_txt += '</ul>';
                    $('.modal-body').html(html_txt);
                } else {
                    $('#new_emp').text('Submit form');
                    alert(res.msg)
                }
            }
        });

    });

    let json_data = [];
    $(document).on('click', '#xml_to_json', function () {
        //Ajax Call
        $(this).text('Converting...');
        $.ajax({
            url: '/xmltojson',
            type: 'get',
            dataType: 'JSON',
            success: function (res) {
                if (res.code == 'success') {
                    json_data = res.data;
                    $('#json_header').show();
                    $('#xml_to_json').text('Converted');
                    $('#json').html(res.data);
                    $('#json-store').removeAttr('disabled');
                }
            }
        });

    });

    $(document).on('click', '#json-store', function () {
        //Ajax Call
        if (json_data.length > 0) {
            $(this).text('Please Wait...');
            $.ajax({
                url: '/json-store',
                type: 'post',
                data: JSON.parse(json_data),
                success: function (res) {
                    if (res.code == 'success') {
                        $('#json-store').text('Inserting into Database Completed');
                        $('#fetch_header').show();
                        $('#json-delete').show();
                        $('#veh_name').text(res.data.VehAvailCore.Vehicle.VehMakeModel.Name);
                        $('#veh_status').text(res.data.VehAvailCore.Status);
                        $('#veh_img').attr('src', res.data.VehAvailCore.Vehicle.PictureURL);
                        $('#veh_cat').text(res.data.VehAvailCore.Vehicle.VehType.VehicleCategory);
                        $('#veh_ref').text(res.data.VehAvailCore.Reference['ID']);
                        $('#veh_ref_type').text(res.data.VehAvailCore.Reference['Type']);
                        $('#veh_tc').text(res.data.VehAvailCore.TotalCharge.RateTotalAmount + ' USD');
                        $('#veh_trans').text(res.data.VehAvailCore.Vehicle.TransmissionType);
                        $('#veh_asset').text(res.data.VehAvailCore.Vehicle.VehIdentity.VehicleAssetNumber);
                        $('#veh_data').css('display','flex');
                    }
                }
            });
        } else {
            $('#json-store').removeAttr('disabled');
        }

    });
    $(document).on('click', '#json-delete', function () {
        if (confirm('Are you sure to delete Vehicle Data')) {
            $(this).text('Please Wait...');
            $.ajax({
                url: '/json-delete',
                type: 'get',
                success: function (res) {
                    if (res.code == 'success') {
                        window.location.reload();
                    }
                }
            });
        }
    });

});