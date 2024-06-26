const meterNumber = document.getElementById('id_meter_number');
const billForm = document.getElementById('billform');
const sessionID = document.getElementById('session-id');

// Get meter details test-pre: 1111111111111 test-post:1010101010101
function getMeterDetails() {
    const form = billForm.elements;
    if (form.disco_name.value == "" || form.MeterType.value == "") {
        meterNumber.setCustomValidity('Please select Meter Type and Meter Number');
        return meterNumber.reportValidity();
    }
    if (form.meter_number.value.length < 11) {
        meterNumber.setCustomValidity('Meter Number is supposed to be 11-digits or more');
        return meterNumber.reportValidity();
    }
    // Build the Api URL
    const verifyData = {
        billersCode: form.meter_number.value,
        service: form.disco_name.value,
        meterType: form.MeterType.value,
    };
    const query = new URLSearchParams(verifyData).toString();
    const verifyMeterNumberUrl = `/api/bills/?${query}`;

    fetch(verifyMeterNumberUrl)
        .then(res => {
            if (res.ok) {
                return res.json();
            }
            return Promise.reject(res);
        })
        .then(data => {
            ['#div_id_customer_address', '#div_id_customer_name'].forEach(field=>{
                document.querySelector(field).style.display = "block";
            })
            form.customer_name.value = data.Customer_Name;
            form.customer_address.value = data.Address;
        })
        .catch(err => {
            return Swal.fire('Error', err, 'error' );
        })

}

// Fires when the meter number is valid
['keyup', 'change', 'focusin'].forEach(event => {
    meterNumber.addEventListener(event, function (e) {
        setTimeout(getMeterDetails, 500);
    });
});


// Make a POST request to the payUrl URL.
const makePayment = async (payUrl, form) => {
    const headers = {
        "Authorization": `Token ${sessionID.value}`
    };

    const response = await fetch(payUrl, {
        method: 'POST',
        headers,
        body: new FormData(form)
    });

    if (!response.ok) {
        const serverResponse = await response.json();
        console.log(serverResponse.message);
        throw new Error(`${serverResponse.message}`);
    }

    const data = await response.json();

    return data;
};

// Display a success message with a link to the receipt.
const showSuccessMessage = (data) => {
    $.LoadingOverlay("hide");
    Swal.fire({
        icon: 'success',
        title: 'Transaction Successful',
        footer: `<a href="${data.id}" class="btn btn-success">View receipt</a>`
    });
};

// Display an error message.
const showErrorMessage = (err) => {
    $.LoadingOverlay("hide");
    Swal.fire("Transaction Failed", `${err}`, "error");
};

// Make a payment.
async function pay(){
    const payUrl = '/api/bills/';

    try {
        const data = await makePayment(payUrl, billForm);
        showSuccessMessage(data);
    } catch (err) {
        showErrorMessage(err);
    }
}

//Fires when the form is submitted
billForm.addEventListener('submit', function (e) {
    e.preventDefault();
    if(
        e.target.MeterType.value != "" && 
        e.target.meter_number.value != "" &&
        e.target.disco_name.value != "" &&
        e.target.amount.value != "" &&
        e.target.Customer_Phone.value != ""   
    ){
        Swal.fire({
            title: "Confirm Payment",
            text: `You are about to pay ${e.target.amount.value}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
        }).then((payment) => {
            if (payment.isConfirmed) {
                Swal.fire({
                    title: 'Enter Your Pin',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    confirmButtonText: 'proceed',
                    allowOutsideClick: false
                }).then(canPay => {
                    if(canPay.isConfirmed){
                        $.LoadingOverlay("show");
                        fetch(`/api/checkpin.php?pin=${canPay.value}&user=${sessionID.value}`)
                            .then(response => {
                                if (!response.ok) {
                                    $.LoadingOverlay("hide");
                                    if (response.status == 404) {
                                        return Promise.reject("Invalid PIN Details!")
                                    }
                                    return Promise.reject("Oops something went wrong, we'll fix this soon enough");
                                }
                                pay();                            
                            })
                            .catch(error => {
                                $.LoadingOverlay("hide");
                                Swal.fire(`Error`, `${error}`, 'error');
                            })
                    }
                })
            }
        });
    }else{
        Swal.fire(
            "Missing Fields",
            "All Fields must contain values!",
            "error"
        )
    }

    
})