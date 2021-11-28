var customerTab = document.getElementById('customer');
var supportTab = document.getElementById('support');
var customerTabBtn = document.getElementById('customer-tab');
var supportTabBtn = document.getElementById('support-tab');

var csrEmailErr = document.getElementById('csrEmailErr');
var csrPassErr = document.getElementById('csrPassErr');
var noCsrAccount = document.getElementById('noCsrAccount');

if(noCsrAccount || csrEmailErr || csrPassErr) {
    supportTab.classList.add('active', 'show');
    customerTab.classList.remove('show', 'active');
    supportTabBtn.classList.add('active');
    customerTabBtn.classList.remove('active')
}
