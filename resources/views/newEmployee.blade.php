<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Employee</title>
    @include('requireBootstrapFiles')
</head>

<body class="banner-area">
    <section style="margin:30px;text-align:-webkit-center;">
    <h2> Register New Employee </h2>
        <form class="needs-validation new_emp_form" >
            <div class="col-md-4 mb-3">
                <label for="validationTooltip01">First name</label>
                <input type="text"  name="first_name" class="form-control" id="validationTooltip01" placeholder="First name" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">Last name</label>
                <input type="text" name="last_name" class="form-control" id="validationTooltip02" placeholder="Last name" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltipUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                    </div>
                    <input type="text" name="user_name" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">City</label>
                <input type="text" name="city" class="form-control"  required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">State</label>
                <input type="text" name="state" class="form-control"  required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">PinCode</label>
                <input type="number" name="pincode" class="form-control" required>
            </div>
            <button class="btn btn-primary" id="new_emp" data-toggle="modal" data-target="#emp_modal" type="button">Submit form</button>
        </form>
        @include('showEmpModal')
    </section>
</body>

</html>