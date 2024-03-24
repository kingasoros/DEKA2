const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
    //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});
function toggleDarkMode() {
    const body = document.querySelector('body');
    const darkModeToggle = document.querySelector('.dark-mode-toggle i');

    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        darkModeToggle.classList.remove('fa-toggle-on');
        darkModeToggle.classList.add('fa-toggle-off');
    } else {
        darkModeToggle.classList.remove('fa-toggle-off');
        darkModeToggle.classList.add('fa-toggle-on');
    }
}

let visible = false;

                    document.getElementById("dropdownMenuButton3").addEventListener("click", function() {
                        if (!visible) {
                            document.getElementById("hiddenDiv").style.display = "block";
                            visible = true;
                        } else {
                            document.getElementById("hiddenDiv").style.display = "none";
                            visible = false;
                        }
                    });

                    document.getElementById('dropdown').addEventListener('change', function() {
                        var selectedOption = this.value;
                        if (selectedOption === 'others') {
                            document.getElementById('othersInput').style.display = 'block';
                        } else {
                            document.getElementById('othersInput').style.display = 'none';
                        }
                    });

function editUserData() {
    document.getElementById("first_name").readOnly = false;
    document.getElementById("last_name").readOnly = false;
    document.getElementById("gender").disabled = false;
    document.getElementById("date_of_birth").readOnly = false;
    document.getElementById("email_address").readOnly = false;
    document.getElementById("phone_number").readOnly = false;
    document.getElementById("address").readOnly = false;
    document.getElementById("city").readOnly = false;
    document.getElementById("zip").readOnly = false;
    document.getElementById("county").readOnly = false;
    document.getElementById("nationality").readOnly = false;
    document.getElementById("picture").disabled = false;

    document.getElementById("editBtn").style.display = "none";
    document.getElementById("saveBtn").style.display = "inline-block";
}

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('saveRoom').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        var form = document.getElementById('roomForm');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse the response JSON
                    var response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        // Log the roomID to the console
                        console.log("RoomID:", response.roomID);

                        // Reset the form after successful insertion
                        form.reset();

                        // Close the current modal and open the next one
                        $('#exampleModal').modal('hide');
                        $('#nextModal').modal('show');
                    } else {
                        // Insertion failed, log the error
                        console.error('Error:', response.error);
                        alert('Error: ' + response.error); // Notify user of insertion failure
                    }
                } else {
                    // Error occurred in the request
                    console.error('Error:', xhr.statusText);
                    alert('Error: ' + xhr.statusText); // Notify user of request failure
                }
            }
        };

        xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(new URLSearchParams(formData));
    });
});