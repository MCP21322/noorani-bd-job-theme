
// sign up model function here 
//সাইন আপ পপাপ মডেল ফাংসন 
document.addEventListener('DOMContentLoaded', function() {
    let modal = document.getElementById("signupModal");
    let btn = document.getElementById("signupBtn");
    let span = document.getElementsByClassName("close-btn")[0];
 
    if(modal && btn && span){
        btn.onclick = function() {
            modal.style.display = "block";
        }
    }

    
    if(modal && btn && span){
        span.onclick = function() {
            modal.style.display = "none";
        }
    }
   if(modal && btn && span){

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                console.log(modal)
            }
        }
   }

});



document.addEventListener('DOMContentLoaded', function(){
  // url signup_error
  // যদি url এ সমস্যা থাকে  
  const urlParams =   new URLSearchParams(window.location.search);
  if(urlParams.has('signup_error')){
    let model = document.getElementById('signupModal');
    if(model){
        model.style.display = "block";
    }
  }
});

//switchToSignup button
// লগ ইন বাটন থেকে সাইন আপ বাটনে যাওয়ার ফাংসন  
document.addEventListener("DOMContentLoaded",function(){
    let switchToSignup = document.querySelector('#switchToSignup');
    let switchToLogin = document.querySelector('#switchToLogin');
    let modal = document.getElementById("signupModal");
    let loginModal = document.getElementById("loginModal");

    
    if(loginModal){
        switchToSignup.onclick = function(){
            loginModal.style.display = "none";
            modal.style.display = 'block';

        }
    }

    if(modal){
        switchToLogin.onclick = function(){
            modal.style.display = "none";
            loginModal.style.display = 'block';

        }
    }
});

//Log in mode function here
// লগ ইন মডেল পপআপ ফাংসন 

document.addEventListener("DOMContentLoaded", function(){
    let loginModal = document.getElementById("loginModal");
    let loginbtn = document.getElementById("loginBtn");
    let login_close = document.querySelector('.login_close-btn');

   // close click on button
    if(loginModal && loginbtn){
        login_close.onclick = function() {
        loginModal.style.display = "none";
    }
    }
    if(loginModal && loginbtn){
        window.onclick = function(event) {
        if (event.target == loginModal) {
            loginModal.style.display = "none";
        }
    }
    }
 // whene click on btn then show popup
 //যখন বাটনে ক্লিক করবে তখন পপাপ সো করবে 
    if(loginModal && loginbtn){
       loginbtn.onclick = function(){
        loginModal.style.display = 'block';
       } 
    }

});

// add log in form placeholder text function
// লগ ইন ফর্ম এর ভিতরে প্লেসহোল্ডার লেখা ফাংসন 
document.addEventListener('DOMContentLoaded',function(){
    let loginField = document.querySelector("#custom-login-form input[name='log']" );
    let loginPassword = document.querySelector("#custom-login-form input[name='pwd']");

    if(loginField && loginPassword){
        loginField.setAttribute('placeholder','ইমেইল আথবা ইউজার নেইম');
        loginField.setAttribute('autocomplete', 'username');
    }
    if(loginPassword && loginField){
        loginPassword.setAttribute('placeholder','পাওয়াড');
        loginPassword.setAttribute('autocomplete', 'password');
    }

});

// noorani about page number  animation function here
// আমাদের সম্পর্কে পেজের নাম্বার আনিমেশ ফাংসন 

document.addEventListener('DOMContentLoaded', function() {
    //job post animation function
    //জব পোস্ট এনিমেশন ফাংসন 
    let post_job = document.querySelector('#job_count');

   if(post_job){
     let targetjob = post_job.getAttribute('data-target');
    let count = 0;

    const jobCounter = setInterval(()=>{
        count ++;
        post_job.innerHTML = count;
        if(count >= targetjob){
            clearInterval(jobCounter);
        }
    },30);
   }

  
});

document.addEventListener('DOMContentLoaded', function() {
    //conmpany partnar animation funtion
    //কোম্পানি পাটনার এনিমেশন ফাংসন 
    let company_patner = document.querySelector('#company_patner');
    let targetPartnar = 100;
    let count = 0;

    if(company_patner){
        const companyCounter = setInterval(()=>{
            count++;
            company_patner.innerText = count;
            if(count >= targetPartnar){
                clearInterval(companyCounter);
            }
        },30);
    }

  
});