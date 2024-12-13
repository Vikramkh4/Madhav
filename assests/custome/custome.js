"use strict"
var currentUrl = window.location.href;
console.log( currentUrl.slice("admin"));


     function togglePartialPayment() {
            const paymentType = document.getElementById('payment-type').value;
            const partialPaymentContainer = document.getElementById('partial-payment-container');
            const partialPaymentContainer1 = document.getElementById('partial-payment-container1');
            if (paymentType === 'partial') {
                partialPaymentContainer.style.display = 'block';
                partialPaymentContainer1.style.display = 'block';
            } else {
                partialPaymentContainer.style.display = 'none';
                partialPaymentContainer1.style.display = 'none';
            }
        }
var number = 1;
        function addPartialPaymentRow() {
            const container = document.getElementById('partial-payment-container');
       
            const newRow = document.createElement('div');
            const newRow2 = document.createElement('div');
            newRow.className = 'partial-payment-row';
            newRow2.className = 'input-button-container';
            
            newRow2.style.display = 'flex';
            newRow2.style.alignItems = 'center';
            
            newRow2.innerHTML = `
              
                <input type="number" style="margin-right: 10px;" name="payment[]" placeholder="Enter amount" min="0" class="mr-2 " />
                <button type="button" onclick="removePartialPaymentRow(this)">Remove</button>
            `;
             newRow.appendChild(newRow2);
          container.appendChild(newRow);

        }
function addPartialPaymentRow1() {
    const container1 = document.getElementById('partial-payment-container1');
    const newRow = document.createElement('div');
    const newRow2 = document.createElement('div');
    
    newRow.className = 'partial-payment-row';
    newRow2.className = 'input-button-container';
    newRow2.style.display = 'flex';
    newRow2.style.alignItems = 'center';
    
    newRow2.innerHTML = `
        <input type="number" style="margin-right: 10px;" name="payment[]" placeholder="Enter amount" min="0" class="mr-2" />
        <button type="button" onclick="removePartialPaymentRow(this)">Remove</button>
    `;
    
    newRow.appendChild(newRow2);
    container1.appendChild(newRow);
}


        function removePartialPaymentRow(button) {
            --number;
            const row = button.parentNode;
            row.parentNode.removeChild(row);
        }

        function selectCheckbox(input) {
            const row = input.parentNode;
            const checkbox = row.querySelector('input[type="checkbox"]');
            checkbox.checked = true;
        }

        // function deselectCheckbox(input) {
        //     const row = input.parentNode;
        //     const checkbox = row.querySelector('input[type="checkbox"]');
        //     if (input.value !== "") {
        //         checkbox.checked = false;
        //     }
        // }
