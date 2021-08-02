<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script type="text/javascript">
    </script>
<body>
    <div class="container">
        <div class="row">
            <div style="border: 1px black solid;" class="col-md-8">
                <div style="text-align: center;">
                    <h4>Bank Information</h4>
                    <h5>Bank Name</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Sender Bank Information</h6>
                            <h6>Name: {{ $salary->name }}</h6>
                            <h6>Account Number: 00000000000</h6>
                            <h6>Bank Name: Alfalah</h6>


                        </div>
                        <div class="col-md-6">
                            <h6>Reciepient Bank Information</h6>
                            <h6>Name: {{ $salary->name }}</h6>
                            <h6>Account Number: 0000000000</h6>
                            <h6>Bank Name: UBL</h6>
                        </div>
                    </div>
                    <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                    <h6><b>Sender Information</b></h6>
                    <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                    <div class="row">
                        <div class="col-md-4">
                            <h6><b>Sender Name</b></h6>
                            <h6>{{ $salary->name }}</h6>
                        </div>
                        <div class="col-md-4">
                            <h6><b>Occupation</b></h6>
                            <h6>{{ $salary->position }}</h6>
                        </div>
                        <div class="col-md-4">
                            <h6><b>Telephone</b></h6>
                            <h6>000 000000</h6>
                        </div>
                    </div>
                    <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                    <h6><b>Beneficiary Information</b></h6>
                    <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                    <div class="row">
                        <div class="col-md-4">
                            <h6><b>Reciever Name</b></h6>
                            <h6>Rafay Mughal</h6>
                        </div>
                        <div class="col-md-4">
                            <h6><b>Occupation</b></h6>
                            <h6>Web Developer</h6>
                        </div>
                        <div class="col-md-4">
                            <h6><b>Telephone</b></h6>
                            <h6>000 000000</h6>
                        </div>
                    </div>
                    <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                    <div>
                        <h6><b>Message For Beneficiary</b></h6>
                        <textarea style="border:none;"></textarea>
                    </div>
                </div>
            </div>
            <div style="border: 1px black solid;" class="col-md-4">


                <h6><b>Order Number:0000000</b></h6>
                <h6><b>Pin Number:0000000</b></h6>
                <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                <h6><b>Payment Information</b></h6>
                <hr style="width: 100%;height: 1px;color: black;background-color: black;">

                <h6><b>Amount To Be Delivered</b></h6>
                <h6>5000 RS/-</h6>
                <h6><b>Total Amount</b></h6>
                <h6>5000 RS/-</h6>
                <hr style="width: 100%;height: 1px;color: black;background-color: black;">


                <div style="text-align:center;" class="row">
                    <div class="col-md-6">
                        <label>Sender Signature</label>
                        <br><br>
                        <hr style="width: 100%;height: 1px;color: black;background-color: black;">

                    </div>
                    <div class="col-md-6">
                        <label>Reciever Signature</label>
                        <br><br>
                        <hr style="width: 100%;height: 1px;color: black;background-color: black;">
                    </div>

                </div>
             


            </div>


        </div>

    </div>
    <button onclick="window.print()" style=" margin-top:30px; margin-left:1190px;" class="btn btn-primary">Print Slip</button>
</body>

</html>