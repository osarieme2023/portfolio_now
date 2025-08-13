console.log("Portfolio JS loaded");


let currentImageIndex = 0;
let imageList = [];
let lightboxVisible = false;


window.addEventListener('load', function() {
    setupLightbox();
    setupContactForm();
});


function setupLightbox() {
 
    let projectImages = document.querySelectorAll('.project-box img, .top-image, .hero-image, .section-image, .final-showcase-image');
    

    for (let i = 0; i < projectImages.length; i++) {
        let img = projectImages[i];
        
       
        img.style.cursor = 'pointer';
        
       
        imageList.push({
            src: img.src,
            alt: img.alt,
            title: getImageTitle(img)
        });
        

        img.addEventListener('click', function(event) {
            event.preventDefault();
            openLightbox(i);
        });
    }
}


function getImageTitle(img) {
    let projectBox = img.closest('.project-box');
    if (projectBox) {
        let titleElement = projectBox.querySelector('h3');
        if (titleElement) {
            return titleElement.textContent;
        }
    }
    return img.alt || 'Portfolio Image';
}


function openLightbox(index) {
    currentImageIndex = index;
    lightboxVisible = true;
    
    // Add this null check before line 54
    let lightbox = document.querySelector('.lightbox-overlay');
    if (!lightbox) {
        console.log("Lightbox overlay not found");
        return;
    }
    
    lightbox.classList.add('active');  
    updateLightboxContent();
    document.body.style.overflow = 'hidden';
}


function closeLightbox() {
    lightboxVisible = false;
    
   
    let lightbox = document.querySelector('.lightbox-overlay');
    lightbox.classList.remove('active');
    
   
    document.body.style.overflow = '';
}


function nextImage() {
    if (currentImageIndex < imageList.length - 1) {
        currentImageIndex++;
    } else {
        currentImageIndex = 0; 
    }
    updateLightboxContent();
}


function prevImage() {
    if (currentImageIndex > 0) {
        currentImageIndex--;
    } else {
        currentImageIndex = imageList.length - 1; 
    }
    updateLightboxContent();
}


function updateLightboxContent() {
    let currentImage = imageList[currentImageIndex];
    
  
    let lightboxImg = document.querySelector('.lightbox-image');
    lightboxImg.src = currentImage.src;
    lightboxImg.alt = currentImage.alt;
    
  
    let lightboxTitle = document.querySelector('.lightbox-title');
    lightboxTitle.textContent = currentImage.title;
    

    let currentSpan = document.querySelector('.lightbox-counter .current');
    let totalSpan = document.querySelector('.lightbox-counter .total');
    currentSpan.textContent = currentImageIndex + 1;
    totalSpan.textContent = imageList.length;
}


function setupContactForm() {
    let contactForm = document.querySelector('#contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();
            handleContactForm();
        });
    }
}


function handleContactForm() {
    let nameInput = document.querySelector('input[name="name"]');
    let emailInput = document.querySelector('input[name="email"]');
    let messageInput = document.querySelector('textarea[name="message"]');
    let feedback = document.querySelector('.feedback');
    
    if (!nameInput.value || !emailInput.value || !messageInput.value) {
        feedback.innerHTML = '<p style="color: red;">Please fill in all fields.</p>';
        return;
    }
    
    let formData = new FormData();
    formData.append('name', nameInput.value);
    formData.append('email', emailInput.value);
    formData.append('message', messageInput.value);
    
    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            feedback.innerHTML = '<p style="color: green;">' + data.message + '</p>';
            nameInput.value = '';
            emailInput.value = '';
            messageInput.value = '';
        } else {
            feedback.innerHTML = '<p style="color: red;">' + data.message + '</p>';
        }
    })
    .catch(error => {
        feedback.innerHTML = '<p style="color: red;">Error sending message. Please try again.</p>';
        console.error('Error:', error);
    });
}


document.addEventListener('click', function(event) {
  
    if (event.target.classList.contains('lightbox-close')) {
        closeLightbox();
    }
    
   
    if (event.target.classList.contains('lightbox-prev')) {
        prevImage();
    }
    

    if (event.target.classList.contains('lightbox-next')) {
        nextImage();
    }
    
   
    if (event.target.classList.contains('lightbox-overlay')) {
        closeLightbox();
    }
});


document.addEventListener('keydown', function(event) {
    if (!lightboxVisible) return;
    
    if (event.key === 'Escape') {
        closeLightbox();
    }
    if (event.key === 'ArrowLeft') {
        prevImage();
    }
    if (event.key === 'ArrowRight') {
        nextImage();
    }
});


document.addEventListener('click', function(event) {
    if (event.target.matches('a[href^="#"]')) {
        event.preventDefault();
        let targetId = event.target.getAttribute('href');
        let targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
});


